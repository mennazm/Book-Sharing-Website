<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

class pagesController extends Controller
{
    public function index(){
        return view('frontend.pages.index');
    }
}

