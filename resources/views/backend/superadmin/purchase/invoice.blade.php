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
                <h2>BRDB Karupalli</h2>
                <p>5 Kawran Bazar Rd, Dhaka 1215, Bangladesh</p>
                <p>+88-02-4101033</p>
            </div>
        </div>
        <center><h1 style="font-weight: bold; font-size: 30px;"><u>Work Order</u><h1></center>
        <h4>Order/Suppliar Details</h4>
        <div class="order-details">
            <table>
              <tbody>
                  <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 2px; font-weight: bold;">OrderID</td>
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
                    <td style="padding: 2px;">{{ $formattedTime }}</td>
                  </tr>
                </tbody>
            </table>
       </div>
       <br>
        <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Unit Cost</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                @php
                    $total = 0;
                @endphp
                @foreach ($print as $invoiceprint)
                <tr>
                    <td style="text-align:left">{{ $invoiceprint->productname->productname }}</td>
                    <td>{{ $invoiceprint->unitcost }}</td>
                    <td>{{ $invoiceprint->quentity }}</td>
                    <td>{{ $invoiceprint->totalprice }}</td>                                                
                </tr>
                @php
                    $total += $invoiceprint->totalprice;
                @endphp
                @endforeach
            </tbody>
        </table>
        
        <div class="total">
            Total: {{ $total }} .Tk
        </div>
    </div>
</body>
</html>