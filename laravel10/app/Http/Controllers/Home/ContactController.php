<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function Contact()
    {
        return view('frontend.contact');
    } // End Method 
}
