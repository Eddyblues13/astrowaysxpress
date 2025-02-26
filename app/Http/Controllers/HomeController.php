<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function homepage()
    {

        return view('home.homepage');
    }

    public function about()
    {

        return view('home.about');
    }
    public function services()
    {

        return view('home.services');
    }
    public function contact()
    {

        return view('home.contact');
    }

    public function track()
    {

        return view('home.track');
    }

    public function how()
    {

        return view('home.how-to');
    }

    public function destinations()
    {

        return view('home.destination');
    }

    public function viewPackage(Request $request)
    {
        $search = $request->input('search');

        $package = Package::query()
            ->where('tracking_number', 'LIKE', "%{$search}%")
            ->orWhere('tracking_number', 'LIKE', "%{$search}%")
            ->first();

        if ($package) {
            // If a result is found, redirect to another blade file
            return view('home.view', compact('package'));
        } else {
            // If no result is found, return an error message
            return back()->with('error', 'Incorrect Tracking Number');
        }
    }
}
