@extends('adminlte::layouts.app')

@section('htmlheader_title')
Edit Invoice
@endsection

@section('main-content')
  <div class="container spark-screen">
  <div class="row">
  <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default">
  <div class="panel-heading"><h3>Edit Invoice</h3></div>
  <div class="panel-body">
  <form class="form-horizontal"  role="form" method="POST" action="{{ url('/updateinvoice')}}">
  <input id="invoice_id" type="hidden" class="form-control" name="invoice_id" value="{{ $invoice->id }}">
  {{ csrf_field() }}
 </div>
 </div>
 </div>
 </div>



 <div class="col-md-6">
 <label for="name" class="col-md-4 control-label">Company</label>
<select name="company_id">
@foreach($companies as $company)
<option value="Select company" selected>Select company</option>
<option value="{{ $company->id }}">{{ $company->name }}</option>
 @endforeach
</select> 
@if ($errors->has('company_id'))
<span class="help-block">
<strong>{{ $errors->first('company_id') }}</strong>
</span>
 @endif
 </div>





 <div class="col-md-6">
 <label for="name" class="col-md-4 control-label">Name</label>
 <div class="col-md-6">
<input id="name" type="text" name="name" value="{{ $invoice->name }}">
@if ($errors->has('name'))
 <strong>{{ $errors->first('name') }}</strong>
@endif
 </div>


 <label for="amount" class="col-md-4 control-label">Amount</label>
 <div class="col-md-6">
<input id="amount" type="text" name="amount"  readonly value="{{$invoice->amount }}">
@if ($errors->has('amount'))
 <strong>{{ $errors->first('amount') }}</strong>
@endif
 </div>



 <label for="description" class="col-md-4 control-label">Description</label>
 <div class="col-md-6">
<input id="description" type="text" name="currency"  readonly value="{{$invoice->description }}">
@if ($errors->has('description'))
 <strong>{{ $errors->first('description') }}</strong>
@endif
 </div>


 <label for="status" class="col-md-4 control-label">Status</label>
 <div class="col-md-6">
<input id="status" type="text" name="status"  readonly value="{{$invoice->status }}">
@if ($errors->has('status'))
 <strong>{{ $errors->first('status') }}</strong>
@endif
 </div>



 <label for="due" class="col-md-4 control-label">Due Date</label>
 <div class="col-md-6">
<input id="due" type="text" name="due"  readonly value="{{$invoice->due }}">
@if ($errors->has('due'))
 <strong>{{ $errors->first('due') }}</strong>
@endif
 </div>




<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
 <i class="fa fa-btn fa-user"></i> Update
</button>
</div>
</form>
</div>
</div>

  
@endsection


