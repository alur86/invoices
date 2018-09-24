<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;
use App\Company;
use App\Invoice;
use Carbon\Carbon;
use Image;
use PDF;


use App\Http\Requests\EditFormRequest;
use App\Http\Requests\AddFormRequest;
use App\Http\Requests\AddInvoiceRequest;

class AdminController extends Controller
{
     


   public function __construct()

    {
        $this->middleware('auth');
    }



//method what returns of data of users

public function index() {


 $breadcrumbs_title = "users list"; 
    
 $breadcrumbs_url = "/users";

 $breadcrumbs_title_active = Auth::user()->name;


 $users= User::orderBy('created_at')->where('is_admin','=','0')->paginate(10);


 return view('admins.index')->with('users', $users)->with('breadcrumbs_title', $breadcrumbs_title)->with('breadcrumbs_url', $breadcrumbs_url)->with('breadcrumbs_title_active', $breadcrumbs_title_active);

}


//method what shows the edit user view form

public function edit($id) {


 $breadcrumbs_title = "edit user"; 
    
 $breadcrumbs_url = "/users";

 $breadcrumbs_title_active = Auth::user()->name;

 $user = User::findOrFail($id);


 return view('admins.edit')->with('user', $user)->with('breadcrumbs_title', $breadcrumbs_title)->with('breadcrumbs_url', $breadcrumbs_url)->with('breadcrumbs_title_active', $breadcrumbs_title_active);


}


//method what shows the add user view form

public function add() {


 $breadcrumbs_title = "add user"; 
    
 $breadcrumbs_url = "/users";

 $user =Auth::user();

 $breadcrumbs_title_active = Auth::user()->name;

 return view('admins.add')->with('user', $user)->with('breadcrumbs_title', $breadcrumbs_title)->with('breadcrumbs_url', $breadcrumbs_url)->with('breadcrumbs_title_active', $breadcrumbs_title_active);


}

//method what  edited user

public function addUser(AddFormRequest $request)  {

if($request->hasFile('avatar')){

 $breadcrumbs_title = "users list"; 
    
 $breadcrumbs_url = "/users";

 $breadcrumbs_title_active = Auth::user()->name;

 $avatar = $request->file('avatar');

 $filename = time() . '.' . $avatar->getClientOriginalExtension();

 Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' . $filename ) );
         
 
 $user = new User;

 $user->name = $request->get('name');

 $user->email = $request->get('email');

 $user->password = bcrypt($request->get('password'));

 $user->created_at = Carbon::now()->toDateTimeString();

 $user->save();

   }


return \Redirect::route('users')->with('message', 'This user was added');
   


}


//method what deleted user

public function delete($id) {

 $breadcrumbs_title = "users list"; 
    
 $breadcrumbs_url = "/users";

 $breadcrumbs_title_active = Auth::user()->name;

 $user = User::findOrFail($id);

 $user->delete();
 
  return back()->with('flash', 'User deleted was ok!');

}


//method what shows reports of all users 


public function reports() {


 $breadcrumbs_title = "make PDF reports"; 
    
 $breadcrumbs_url = "/PDF reports";

 $breadcrumbs_title_active = Auth::user()->name;

 $invoices= Invoice::orderBy('status')->paginate(10);

 $companies = Company::getAllCompanies();

 return view('admins.pdfreports')->with('invoices', $invoices)->with('companies', $companies)->with('breadcrumbs_title', $breadcrumbs_title)->with('breadcrumbs_url', $breadcrumbs_url)->with('breadcrumbs_title_active', $breadcrumbs_title_active);

}

//method what make export selected user PDF report

public function export_pdf ($id) {

    $invoice = Invoice::findOrFail($id);
    
    $pdf = PDF::loadView('admins.pdf', compact('invoice'));

    $pdf->save(public_path('uploads/pdfs/').time().'_invoicereport.pdf');
  
    return \Redirect::route('pdfreports')->with('message', 'PDF Report was generated ok!');
}


//method what make export all PDF reports

public function export_all_pdf () {

    $invoices = Invoice::all();
    
    $pdf = PDF::loadView('admins.allpdf', compact('invoices'));

    $pdf->save(public_path('uploads/pdfs/').time().'_invoicereport.pdf');
  
    return \Redirect::route('pdfreports')->with('message', 'PDF Reports had generated ok!');
}





//method what shows users invoices

public function users_invoices() {


 $breadcrumbs_title = "users invoices"; 
    
 $breadcrumbs_url = "/users invoices";

 $breadcrumbs_title_active = Auth::user()->name;

 $invoices= Invoice::orderBy('due')->paginate(10);

 $companies = Company::getAllCompanies();

 return view('admins.usersinvoices')->with('invoices', $invoices)->with('companies', $companies)->with('breadcrumbs_title', $breadcrumbs_title)->with('breadcrumbs_url', $breadcrumbs_url)->with('breadcrumbs_title_active', $breadcrumbs_title_active);

}


//method what shows edit view invoice

public function editInvoice($id) {


 $breadcrumbs_title = "edit  invoices"; 
    
 $breadcrumbs_url = "/edit invoice";

 $breadcrumbs_title_active = Auth::user()->name;

 $invoice = Invoice::findOrFail($id);

 $companies = Company::getAllCompanies();

 return view('admins.editinvoice')->with('invoice', $invoice)->with('companies', $companies)->with('breadcrumbs_title', $breadcrumbs_title)->with('breadcrumbs_url', $breadcrumbs_url)->with('breadcrumbs_title_active', $breadcrumbs_title_active);

}





//nethod what edited the invoice

public function updateInvoice(AddInvoiceRequest $request)  {
    

 $invoice_id = $request->get('invoice_id');
 
 $invoice = Invoice::where( 'id', '=', $invoice_id)->first();

 $invoice->company_id = $request->get('company_id');

 $invoice->amount = $request->get('amount');

 $invoice->currency =$request->get('currency');

 $invoice->description =$request->get('description');

 $invoice->status =$request->get('status');

  $invoice->due = Carbon::now()->toDateTimeString();

 $invoice->updated_at = Carbon::now()->toDateTimeString();

 $invoice->save();


return \Redirect::route('reports')->with('message', 'This invoice was updated');
   


}






}
