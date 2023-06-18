<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        .container {
            width: 100%;
            max-width: 794px;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }

        .header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          border-bottom: 1px solid black;
          padding: 1px;

        }

        .logo {
          flex: 1;
        }

        .logo img {
          max-width: 100%;
          height: auto;
        }

        .address {
          flex: 1;
          text-align: right;
        }

        .address h2 {
          margin: 0;
          font-size: 24px;
        }

        .address p {
          margin: 5px 0;
          font-size: 16px;
        }
        
      }


        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }



        .table th, .table td {
            border: 1px solid #ddd;
            text-align: center;
        }

        .table th {
            background-color: #f5f5f5;
        }

        .total {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
        }

        .total span {
            margin-right: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="assets/images/logo.png" alt="Your Logo">
            </div>
            <div class="address">
                <h2>Karupalli BRDB</h2>
                <p>5 Kawran Bazar Rd, Dhaka 1215, Bangladesh</p>
                <p>+88-02-4101033</p>
            </div>
        </div>
        <center><h2>Received Against Purchase</h2></center>
        <h4>Purchase/Suppliar Details</h4>
        <div class="order-details">
            <div style="background-color: #f7f7f7; padding: 20px;">
			  <table style="width: 100%; border-collapse: collapse;">
			    <tbody>
			      <tr style="border-bottom: 1px solid #ddd;">
			        <td style="padding: 2px; font-weight: bold;">Purchase ID</td>
			        <td style="padding: 2px;">{{ $purchaseid }}</td>
			      </tr>
			      <tr style="border-bottom: 1px solid #ddd;">
			        <td style="padding: 2px; font-weight: bold;">Order ID</td>
			        <td style="padding: 2px;">{{ $order }}</td>
			      </tr>
			      <tr style="border-bottom: 1px solid #ddd;">
			        <td style="padding: 2px; font-weight: bold;">Name</td>
			        <td style="padding: 2px;">{{ $suppname }}</td>
			      </tr>
                  <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 2px; font-weight: bold;">Company</td>
                    <td style="padding: 2px;">{{ $company }}</td>
                  </tr>
			      <tr style="border-bottom: 1px solid #ddd;">
			        <td style="padding: 2px; font-weight: bold;">Address</td>
			        <td style="padding: 2px;">{{ $addrs }}</td>
			      </tr>
			      <tr style="border-bottom: 1px solid #ddd;">
			        <td style="padding: 2px; font-weight: bold;">Mobile</td>
			        <td style="padding: 2px;">{{ $mobile }}</td>
			      </tr>
			      <tr  style="border-bottom: 1px solid #ddd;">
			        <td style="padding: 2px; font-weight: bold;">Order Date</td>
			        <td style="padding: 2px;">{{ $formattimeorderdate }}</td>
			      </tr>
			      <tr>
			        <td style="padding: 2px; font-weight: bold;">Purchase Date</td>
			        <td style="padding: 2px;">{{ $formattedTime }}</td>
			      </tr>
			    </tbody>
			  </table>
			</div>

       </div>
       <br>
        <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Barcode</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>P-Sells</th>
                    <th>TotalSells</th>
                    <th>T-Cost</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                @php
                    $totals = 0;
                @endphp
                @foreach ($print as $invoiceprint)
                @php 
                    $totalsellprice  = $invoiceprint->quentity * $invoiceprint->unitsellsprice
                @endphp
               
                <tr>
                    <td style="text-align:left;">{{ $invoiceprint->productname->productname }}</td>
                    <td>{{ $invoiceprint->barcode }}</td>
                    <td>{{ $invoiceprint->quentity }}</td>
                    <td>{{ $invoiceprint->unitcost }}</td>
                    <td>{{ $invoiceprint->unitsellsprice }}</td>
                    <td>{{ $totalsellprice }}</td>
                    <td> 
                    	{{  $invoiceprint->totalprice }}
                    </td>                                                
                </tr>
                @php
                    $totals += $invoiceprint->totalprice;
                @endphp
                
                @endforeach
            </tbody>
        </table>
        @php
		    $formatter = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);
		    $totalWords = ucwords($formatter->format($totals));
		@endphp
        <div class="total">
            TotalCost: {{ $totals }} .Tk ({{ $totalWords }} Taka only)
        </div>
    </div>
</body>
</html>