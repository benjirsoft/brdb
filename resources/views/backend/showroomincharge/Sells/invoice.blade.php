<!DOCTYPE html>
<html>
<head>
	<title>Mini Invoice</title>
	<style>
		@page {
			size: 80mm 6in;
			margin: 0;
		}
		body {
			font-family: Arial, sans-serif;
			font-size: 12px;
			margin: 0;
			padding: 0;
		}
		.section-top {
			padding: 10px;
			text-align: center;
		}
		.section-top h2 {
			margin: 0;
			font-size: 18px;
		}
		.section-top p {
			margin: 0;
			font-size: 14px;
		}
		hr {
			border: 0;
			border-top: 1px solid #ccc;
			margin: 10px 0;
		}
		table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 10px;
		}
		table th, table td {
			padding: 5px;
			border: 1px solid #ccc;
			text-align: left;
			font-size: 12px;
		}
		table th {
			background-color: #eee;
			font-weight: bold;
		}
		.section-bottom {
			padding: 10px;
			font-size: 12px;
			line-height: 1.5;
		}
		.section-bottom p {
			margin: 0;
		}
	</style>
</head>
<body>
	<div class="section-top">
		<h2>KARUPALLI</h2>
		<p>BRDB, 5 Kawranbazar, Dhaka</p>
		<p>Telephone: 02154855524</p>
		<hr>
	
		<hr>
	</div>
	<table>
		<thead>
			<tr>
				<th>Product Name</th>
				<th>Qty</th>
				<th>Discount</th>
				<th>Price</th>
			</tr>
		</thead>
		<tbody>
			@foreach($invoicedata as $product)
			<tr>
				<td>{{ $product['productid'] }}</td>
				<td>{{ $product['qty'] }}</td>
				<td>{{ $product['discount'] }}</td>
				<td>{{ $product['price'] }}</td>
			</tr>
			@endforeach
			<tr>
				<td colspan="3">Total Amount</td>
				<td>{{ $invoicedata['totalamount'] }}</td>
			</tr>
			<tr>
				<td colspan="3">Discount</td>
				<td>{{ $invoicedata['discount'] }}</td>
			</tr>
			<tr>
				<td colspan="3">VAT</td>
				<td>{{ $invoicedata['vat'] }}</td>
			</tr>
			<tr>
				<td colspan="3">Net Total Amount</td>
				<td>{{ $invoicedata['nettotalamount'] }}</td>
			</tr>
		</tbody>
	</table>
	<div class="section-bottom">
		<p>Terms and Conditions:</p>
		<p>Lorem ipsum dolor sit amet,
	</div>
</body>
</html>				