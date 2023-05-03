<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Image;

class PortfolioController extends Controller
{
    public function AllPortfolio()
    {
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all', compact('portfolio'));
    } // End Method 
    public function AddPortfolio()
    {
        return view('admin.portfolio.portfolio_add');
    } // End Method 
    public function StorePortfolio(Request $request)
    {
    } // End Method 
}
