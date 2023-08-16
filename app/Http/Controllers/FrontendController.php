<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $pageTitle = 'Home';
return view('frontend.home',compact('pageTitle'));

}
public function about(){
        $pageTitle = 'About Us';
return view('frontend.aboutUS',compact('pageTitle'));

}
public function contact(){
        $pageTitle = 'Contact Us';
return view('frontend.contactUs',compact('pageTitle'));

}
public function gallery(){
        $pageTitle = 'Contact Us';
return view('frontend.gallery',compact('pageTitle'));

}
}
