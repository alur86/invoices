<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;
use App\Invoice;
use App\Company;
use PDF;


class MakeReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

//comand creates the reports and send by email to the users

   $users = User::all();

   foreach ($users as $user ) {

    $user_id = $user->id;

    $user_email = $user->email;
    
    $companies = Company::where('user_id', '=',$user_id);

    foreach ($companies as $company ) {

    $company_id = $company->id;

    $invoice_id=Invoice::getInvoice($company_id);
   
    $invoice = Invoice::findOrFail($invoice_id);
    
    $pdf = PDF::loadView('admins.pdf', compact('invoice'));

    $report_link = $pdf->save(public_path('uploads/pdfs/').time().'_invoicereport.pdf');
    
    $data = array(
       'report' =>'PDF report link'. $report_link
);

Mail::send('emails.report', $data, function ($message) {

$message->from('noreply@minvoicellc.com', 'PDF Report');

$message->to('admin@invoicellc.com')->subject('Monthly Report');

});
       
       }

    }

 }

}
