<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;
use App\Company;
use App\Invoice;
use Carbon\Carbon;

use App\Http\Requests\SearchRequest;

class InvoicesController extends Controller
{
    

  public function __construct()
    {
        $this->middleware('auth');
    }


//method what returns of data of invoices

public function index() {
 	    

 $breadcrumbs_title = "current user invoices"; 
    
 $breadcrumbs_url = "/invoices";

 $breadcrumbs_title_active = Auth::user()->name;

 $user_id = Auth::user()->id; 

 $company_id = Company::getByUser($user_id);

 $invoices= Invoice::all();

 $companies = Company::getAllCompanies();



 return view('invoices.index')->with('companies', $companies)->with('invoices', $invoices)->with('breadcrumbs_title', $breadcrumbs_title)->with('breadcrumbs_url', $breadcrumbs_url)->with('breadcrumbs_title_active', $breadcrumbs_title_active)->with('company_id', $company_id);
    
    
 }


//method make search of invoices
 
public function search(SearchRequest $request) {

 $breadcrumbs_title = "search results invoices"; 
    
 $breadcrumbs_url = "/search results";

 $breadcrumbs_title_active = Auth::user()->name;


$query = $request->get('q');

$invoice_search = Invoice::where('name', 'LIKE', "%$query%")->orWhere('amount', 'LIKE', "%$query%")->orWhere('description', 'LIKE', "%$query%")->paginate(10);

$total = Invoice::where('name', 'LIKE', "%$query%")->orWhere('amount', 'LIKE', "%$query%")->orWhere('description', 'LIKE', "%$query%")->count();

return view('invoices.search')->with('invoice_search',$invoice_search)->with('total',$total)->with('query',$query)->with('breadcrumbs_title', $breadcrumbs_title)->with('breadcrumbs_url', $breadcrumbs_url)->with('breadcrumbs_title_active', $breadcrumbs_title_active);


}







}
