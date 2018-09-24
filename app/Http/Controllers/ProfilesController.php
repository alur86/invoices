<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use Image;

use App\User;


class ProfilesController extends Controller
{
    

    
  public function __construct()
    {
        $this->middleware('auth');
    }






public function  index()
{
    $user = Auth::user(); 

    $breadcrumbs_title = "registered user personal profile"; 
    
    $breadcrumbs_url = "/profile";

    $breadcrumbs_title_active = Auth::user()->name;


    return view('profile.index')->with('user', $user)->with('breadcrumbs_title', $breadcrumbs_title)->with('breadcrumbs_url', $breadcrumbs_url)->with('breadcrumbs_title_active', $breadcrumbs_title_active);
}



  public function updateProfile(Request $request){
    
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' . $filename ) );
            $breadcrumbs_title = "registered user personal profile"; 
            $breadcrumbs_url = "/profile";
            $breadcrumbs_title_active = Auth::user()->name;
    		$user = Auth::user();
    		$user->avatar = $filename;  
    		$user->name = $request->get('name');
            $user->email = $request->get('email');
    		$user->save();
    	


        return view('profile.index',compact('header_title'))->with('user', $user)->with('breadcrumbs_title', $breadcrumbs_title)->with('breadcrumbs_url', $breadcrumbs_url)->with('breadcrumbs_title_active', $breadcrumbs_title_active);
    	
        }
    }

}




