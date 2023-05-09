<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Footer;


class FooterController extends Controller
{
    public function FooterSetup()
    {
        $allfooter = Footer::find(1);
        return view('admin.footer.footer_all', compact('allfooter'));
    } // End Method 
}
