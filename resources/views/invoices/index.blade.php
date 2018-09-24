@extends('adminlte::layouts.app')

@section('htmlheader_title')
Invoices
@endsection


@section('main-content')
  <div class="container spark-screen">
  <div class="row">
  <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default">
  <div class="panel-heading">Invoices</div>
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
            <th>Due Date</th>     
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
            <td> <span class="glyphicon glyphicon-calendar" id="date"></span>  {{ $invoice->due }} </td> 
  
            </tr>
           @endforeach    
        </tbody>  
      </table> 
     
        </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
     
