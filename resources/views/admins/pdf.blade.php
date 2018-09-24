<!DOCTYPE html>

<html>

<head>

	<title>PDF Report</title>


<style type="text/css">
.tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
.tftable th {font-size:12px;background-color:#acc8cc;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;text-align:left;}
.tftable tr {background-color:#d4e3e5;}
.tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;}
.tftable tr:hover {background-color:#ffffff;}
</style>


</head>

<body>


<h2>PDF Report</h2>

<table class="tftable" border="1">

	<tr>

		<th>No</th>

		<th>Name</th>

		<th>Amount</th>

		<th>Currency</th>

		<th>Description</th>

		<th>Status</th>
       
	    <th>Due Date</th>   

	</tr>

	<tr>

		<td>{{ $invoice->id }}</td>
		<td>{{ $invoice->name }}</td>
         <td>{{ $invoice->amount }}</td>
         <td>{{ $invoice->currency }}</td>
         <td>{{ $invoice->description }}</td>
         <td>{{ $invoice->status }}</td>
         <td>{{ $invoice->due }}</td>


	</tr>

</table>


</body>

</html>

