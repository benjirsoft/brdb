<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico" />
      <link rel="stylesheet" href="{{ asset('assets') }}/css/backend-plugin.min.css">
      <link rel="stylesheet" href="{{ asset('assets') }}/css/backend.css?v=1.0.0">
      <link rel="stylesheet" href="{{ asset('assets') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="{{ asset('assets') }}/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="{{ asset('assets') }}/vendor/remixicon/fonts/remixicon.css"> 
    <style type="text/css">
        .confirm-box {
          width:300px;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 9999;
  background-color: #ffffff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
  font-size: 12px;
  background: rgb(2,0,36);
  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(72,191,45,1) 0%, rgba(56,196,90,1) 49%, rgba(0,212,255,1) 100%);
}

.confirm-box h2 {
  margin-top: 0;
  margin-bottom: 20px;
}

.confirm-box button {
  display: block;
  margin-bottom: 10px;
  padding: 10px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  width: 100%;
}

.confirm-box button.yes {
  background-color: red;
  color: #ffffff;
}

.confirm-box button.no {
  background-color: #21c79a;
  color: #ffffff;
}
                    /* Popup overlay */
/* Popup overlay */
.popup-overlay{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
}

/* Popup container */
.popup-container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    width: 800px;
    height: 600px;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

/* Close button */
.popup-close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    font-weight: bold;
    color: #666;
    cursor: pointer;
}

/* Table styles */
.popup-table {
    width: 100%;
}

.popup-table thead {
    background-color: #f8f9fa;
}

.popup-table th,
.popup-table td {
    padding: 10px;
    text-align: center;
}

.popup-table th {
    font-weight: bold;
    text-transform: uppercase;
}

.popup-table td {
    vertical-align: middle;
}

.popup-table .crud-icons {
    display: flex;
    justify-content: center;
}

.popup-table .badge {
    font-size: 16px;
    padding: 8px 12px;
    cursor: pointer;
}

.popup-table .badge-info {
    background-color: #17a2b8;
}

.popup-table .badge-success {
    background-color: #28a745;
}

.popup-table .badge-danger {
    background-color: #dc3545;
}

.popup-table .badge-secondary {
    background-color: #6c757d;
}
</style>

</head>
<body>
    <div class="popup-overlay">
            <div class="popup-container">
                <h2>Your Cart</h2>
       <table class="popup-table">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display validation error messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif 

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Vat</th>
                    <th>Qty</th>
                    <th>Discount</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Price</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalAmount = 0;
                @endphp
                @foreach ($findcart as $cart)
                    @php
                        $totalAmount += $cart->totalamount;
                    @endphp
                    <tr>
                        <td>{{ $cart->productinfo->productname }}</td>
                        <td>{{ $cart->vat }}</td>
                        <td>{{ $cart->qty }}</td>
                        <td>{{ $cart->discount }}</td>
                        <td>{{ $cart->name }}</td>
                        <td>{{ $cart->mobile }}</td>
                        <td>{{ $cart->price }}</td>
                        <td>{{ $cart->totalamount }}</td>
                        <td class="crud-icons">
                            <div class="d-flex align-items-center list-action">
                                <a class="badge bg-warning mr-2"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title=""
                                   data-original-title="Delete"
                                   href="#"
                                   onclick="return confirmDeletecart({{ $cart->id }})">
                                    <i class="ri-delete-bin-line mr-0"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="right-side-bottom-section">
            <div class="d-flex justify-content-end">
                <p class="mr-3 font-weight-bold">Total Amount:</p>
                <p>{{ $totalAmount }}</p>
            </div>
        </div>
    </div>
</table>

                <span class="popup-close">&times;</span>
            </div>
        </div>
    </div>
    <script type="text/javascript">

    function confirmDeletecart(productid) {
    var confirmBox = document.createElement('div');
    confirmBox.classList.add('confirm-box');

    var message = document.createElement('h2');
    message.textContent = 'Are you sure you want to delete this Product?';
    confirmBox.appendChild(message);

    var yesButton = document.createElement('button');
    yesButton.textContent = 'Yes';
    yesButton.addEventListener('click', function() {
      window.location.href = "{{ url('deletecartitem') }}/" + productid;
    });
    confirmBox.appendChild(yesButton);

    var noButton = document.createElement('button');
    noButton.textContent = 'No';
    noButton.addEventListener('click', function() {
      confirmBox.remove();
    });
    confirmBox.appendChild(noButton);

    document.body.appendChild(confirmBox);

    return false;
}

    </script>    
</body>
</html>

