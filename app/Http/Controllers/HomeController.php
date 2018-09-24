<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;


use Auth;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {

$header_title ="Invoices";

 $breadcrumbs_title = "current user invoices"; 
    
 $breadcrumbs_url = "/invoices";

 $breadcrumbs_title_active = Auth::user()->name;

        return view('adminlte::home',compact('header_title'))->with('breadcrumbs_title', $breadcrumbs_title)->with('breadcrumbs_url', $breadcrumbs_url)->with('breadcrumbs_title_active', $breadcrumbs_title_active);
    ;
    }
}