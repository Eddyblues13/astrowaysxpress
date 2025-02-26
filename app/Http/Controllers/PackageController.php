<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('admin.packages', compact('packages'));
    }

    public function create()
    {
        $packages = Package::all();
        return view('admin.create-package', compact('packages'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sender_name' => 'required',
            'sender_phone' => 'required',
            'sender_email' => 'required|email',
            'sender_address' => 'required',
            'receiver_name' => 'required',
            'receiver_phone' => 'required',
            'receiver_email' => 'required|email',
            'receiver_address' => 'required',
            'parcel_description' => 'required',
            'dispatch_location' => 'required',
            'parcel_status' => 'required',
            'dispatch_date' => 'required|date',
            'delivery_date' => 'nullable|date',
            'current_location' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        //$tracking_number = 'TRK' . strtoupper(uniqid());


        $tracking_number = 'XP' . strtoupper(Str::random(2)) . rand(10, 99);


        $packageData = $request->all();
        $packageData['tracking_number'] = $tracking_number;

        $package = Package::create($packageData);

        return response()->json(['status' => 'success', 'message' => 'Package created successfully']);
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.edit', compact('package'));
    }

    public function view($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.admin_view_package', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_phone' => 'required|string|max:20',
            'sender_email' => 'required|email|max:255',
            'sender_address' => 'required|string|max:255',
            'receiver_name' => 'required|string|max:255',
            'receiver_phone' => 'required|string|max:20',
            'receiver_email' => 'required|email|max:255',
            'receiver_address' => 'required|string|max:255',
            'parcel_description' => 'required|string|max:500',
            'dispatch_location' => 'required|string|max:255',
            'parcel_status' => 'required|string|max:100',
            'dispatch_date' => 'required|date',
            'delivery_date' => 'nullable|date',
            'current_location' => 'nullable|string|max:255',
        ]);

        $package = Package::findOrFail($id);
        $package->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Package updated successfully!'
        ]);
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        // Redirect back with a success message stored in the session
        return redirect()->back()->with('success', 'Package deleted successfully');
    }
}
