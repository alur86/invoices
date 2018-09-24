@extends('adminlte::layouts.app')

@section('htmlheader_title')
Invoices
@endsection


@section('main-content')
  <div class="container spark-screen">
  <div class="row">
  <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default">
  <div class="panel-heading">Search Results:</div>
  <div class="panel-body">
  <div class="panel-body">   
  <div class="product"> 
@if (count($invoice_search) > 0) 
 <h3>Результаты поиска: <i>{{$query}} </i></h3>
 <h3>Обнаружено: {{$total}} совпадений</h3>            
@foreach ($invoice_search as $invoice)
<table class="table table-striped">  
        <thead>  
          <tr>  
            <th>Name</th>  
            <th>Description</th>   
            <th>Currency</th> 
            <th>Amount</th> 
            <th>Status</th> 
            <th>Due Date</th>     
          </tr>  
        </thead>  
        <tbody>  
         <tr> 
            <td> {{ $invoice->name }}  </td>  
            <td> {{ $invoice->description }} </td>  
            <td> {{ $invoice->currency }} </td>  
            <td> {{ $invoice->amount }} </td>  
            <td> {{ $invoice->status}} </td>      
            <td> <span class="glyphicon glyphicon-calendar" id="date"></span>  {{ $invoice->due }} </td> 
            </tr>   
        </tbody>  
      </table> 
@endforeach 
</div>
{!! $invoice_search->links() !!}
</div> 
@else
 <h3>Результаты поиска: <i>{{$query}} </i></h3>
 <h3>Обнаружено: {{$total}} совпадений</h3> 
@endif
</div>
</div>
</div>
</div>

 </div>
@endsection
     
