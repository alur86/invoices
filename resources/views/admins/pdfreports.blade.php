@extends('adminlte::layouts.app')

@section('htmlheader_title')
PDF Invoices 
@endsection



@section('main-content')
  <div class="container spark-screen">
  <div class="row">
  <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default">
  <div class="panel-heading">User's Invoices</div>
  <div class="panel-body">
  <div class="panel-body">               
       <table class="table table-striped">  
        <thead>  
          <tr>  
           <th>Company</th> 
            <th>Name</th>  
            <th>Description</th>   
            <th>Currency</th> 
            <th>Amount</th> 
            <th>Status</th> 
            <th>Date Due</th>     
          </tr>  
        </thead>  
        <tbody> 
       @foreach( $invoices as $invoice)     
         <tr> 
         <td> 
      <select name="company_id">
         <option selected disabled>Please select one option</option>
         @foreach($companies as $company)
         <option value="{{ $company->id }}" selected>{{ $company->name }}</option>
          @endforeach
          </select>
          </td>   
            <td> {{ $invoice->name }}  </td>  
            <td> {{ $invoice->description }} </td>  
            <td> {{ $invoice->currency }} </td>  
            <td> {{ $invoice->amount }} </td>  
            <td> {{ $invoice->status}} </td>      
            <td> <span class="glyphicon glyphicon-calendar" id="date"></span>  {{ $invoice->due->format('M d Y') }} </td> 
               
          <td><a href="{{ URL::to('/export_pdf/'.$invoice->id) }}" class="glyphicon glyphicon-pencil" title="Generate PDF Report">Generate PDF Report</a></td>

          <td>
              <td><a href="{{ URL::to('/invoice-edit/'.$invoice->id) }}" class="glyphicon glyphicon-pencil" title="Edit Invoice">Edit Invoice</a></td> 
            </tr>
           @endforeach    
        </tbody>
            <td><a href="{{ URL::to('/export_all_pdf/') }}" class="glyphicon glyphicon-pencil" title="Generate All Invoices to PDF Report">Generate All Invoices to PDF Report</a></td>
  
      </table> 
     
        </div>
 {!! $invoices->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
     
