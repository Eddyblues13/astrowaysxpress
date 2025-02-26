<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Mail\sendUserEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    public function index(Request $request)
    {

        if (Auth::check()) {

            $query = Package::query();

            if ($request->has('search')) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('sender_name', 'like', "%{$search}%")
                        ->orWhere('receiver_name', 'like', "%{$search}%")
                        ->orWhere('sender_email', 'like', "%{$search}%")
                        ->orWhere('receiver_email', 'like', "%{$search}%")
                        ->orWhere('tracking_number', 'like', "%{$search}%");
                });
            }

            $order = $request->order ?? 'desc';
            $numofrecord = $request->numofrecord ?? 10;

            $packages = $query->orderBy('created_at', $order)->paginate($numofrecord);




            //$data['total_shipment']= Package::where('transaction_type','Credit')->count();
            $data['total_shipment_in_transit'] = Package::where('parcel_status', 'In Transit')->count();
            $data['total_shipment_on_hold'] = Package::where('parcel_status', 'On Hold')->count();
            $data['total_shipment_delivered'] = Package::where('parcel_status', 'Delivered')->count();
            $data['total_shipment_failed'] = Package::where('parcel_status', 'Failed')->count();

            return view('admin.home', $data, compact('packages'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function sendEmailPage()
    {
        // Display form for opening a new account
        return view('admin.send_mail_form');
    }

    public function sendUserEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $email = $request->email;
        $subject = $request->subject;
        $messageBody = $request->message;

        Mail::to($email)->send(new sendUserEmail($subject, $messageBody));

        return back()->with('message', 'Email sent successfully!');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully!');
    }
}
