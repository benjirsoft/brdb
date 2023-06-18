<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>BRDB</title>     
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico" />
      <link rel="stylesheet" href="{{ asset('assets') }}/css/backend-plugin.min.css">
      <link rel="stylesheet" href="{{ asset('assets') }}/css/backend.css?v=1.0.0">
      <link rel="stylesheet" href="{{ asset('assets') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="{{ asset('assets') }}/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="{{ asset('assets') }}/vendor/remixicon/fonts/remixicon.css"> 
      <style type="text/css">
            th {
              padding: 0px; /* adjust as needed */
              margin: 0;
            }
            #product-details {
            display: block;
          }

          #product-not-found {
            display: none;
          }

            /* Popup overlay */
/* Popup overlay */
.popup-overlay {
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
  @yield('style')
  <body>
    <div class="wrapper">
      
      <div class="iq-sidebar  sidebar-default ">
          <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
              <a href="#" class="header-logo">
                  <img src="{{ asset('assets') }}/images/logo.png" class="img-fluid rounded-normal light-logo" alt="logo">
              </a>
              <div class="iq-menu-bt-sidebar ml-0">
                  <i class="las la-bars wrapper-menu"></i>
              </div>
          </div>
          <div class="data-scrollbar" data-scroll="1">
              <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                      <li class="active">
                          <a href="{{ route('superadmins') }}" class="svg-icon">                        
                              <svg  class="svg-icon" id="p-dash1" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line>
                              </svg>
                              <span class="ml-4">Dashboards</span>
                          </a>
                      </li>
                      <li class=" ">
                          <a href="#product" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash2" width="20" height="20"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                              </svg>
                              <span class="ml-4">Stock</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          
                      </li>
                      <li class=" ">
                          <a href="#sale" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash4" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                              </svg>
                              <span class="ml-4">Sale</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="sale" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="">
                                          <a href="{{ route('listsells')}}">
                                              <i class="las la-minus"></i><span>List Sale</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="{{ route('sellsform') }}">
                                              <i class="las la-minus"></i><span>Add Sale</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="{{ route('sellsform') }}">
                                              <i class="las la-minus"></i><span>Product Exchange</span>
                                          </a>
                                  </li>
                          </ul>
                      </li>
                      <li class=" ">
                          <a href="#report" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash4" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                              </svg>
                              <span class="ml-4">Report</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="report" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="">
                                          <a href="{{ route('reportform')}}">
                                              <i class="las la-minus"></i><span>Day Week Month</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="{{ route('datesells')}}">
                                              <i class="las la-minus"></i><span>Date Wise</span>
                                          </a>
                                  </li>

                          </ul>
                      </li>
                  </ul>
              </nav>
              <div class="p-3"></div>
          </div>
          </div>     
    <div class="iq-top-navbar">
          <div class="iq-navbar-custom">
              <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                      <i class="ri-menu-line wrapper-menu"></i>
                      <a href="index.html" class="header-logo">
                          <img src="assets/images/logo.png" class="img-fluid rounded-normal" alt="logo">
                          <h5 class="logo-title ml-3">BRDB</h5>
                      </a>
                  </div>
                  <div class="iq-search-bar device-search">
                      <form action="#" class="searchbox">
                          <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                          <input type="text" class="text search-input" placeholder="Search here...">
                      </form>
                  </div>
                  <div class="d-flex align-items-center">
                      <button class="navbar-toggler" type="button" data-toggle="collapse"
                          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                          aria-label="Toggle navigation">
                          <i class="ri-menu-3-line"></i>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto navbar-list align-items-center">
                              <li class="nav-item nav-icon dropdown caption-content">
                                  <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton4"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <img src="assets/images/user/1.png" class="img-fluid rounded" alt="user">
                                  </a>
                                  <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <div class="card shadow-none m-0">
                                          <div class="card-body p-0 text-center">
                                              <div class="media-body profile-detail text-center">
                                                  <img src="assets/images/page-img/profile-bg.jpg" alt="profile-bg"
                                                      class="rounded-top img-fluid mb-4">
                                                  <img src="assets/images/user/1.png" alt="profile-img"
                                                      class="rounded profile-img img-fluid avatar-70">
                                              </div>
                                              <div class="p-3">
                                                  <h5 class="mb-1">{{ auth::user()->email }}</h5>
                                                  <div class="d-flex align-items-center justify-content-center mt-3">
                                                      <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a> <a class="dropdown-item" href="#"></a><a  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" href="/logout">Logout</a>
                                                          <form id="logout-form" action="/logout" method="POST">
                                                            @csrf
                                                        </form>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </div>
              </nav>
          </div>
    </div>
    
<!--Main Content Here --->
<div class="content-page">
    <div class="container-fluid">
	    @yield('content')
	</div>    
</div>	    
<!--End Of Main Content -->

    </div>
       <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('assets') }}/js/backend-bundle.min.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('assets') }}/js/table-treeview.js"></script>

    
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets') }}/js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('assets') }}/js/chart-custom.js"></script>
    <script src="https://unpkg.com/@launchdarkly/js-client-sdk@6.4.0/dist/ldclient.min.js"></script>

    
   <script>

     function calculateReturn() {
        var totalAmount = {{ $totalamount ?? 0 }};
        var customerAmount = parseFloat(document.getElementById('customeramount').value);
        var customerReturn = totalAmount - customerAmount;
        document.getElementById('customerreturn').value = customerReturn.toFixed(2);
    }


    window.addEventListener('load', function() {
    const barcodeInput = document.getElementById('barcode');
    barcodeInput.focus();
  });

    $(document).ready(function() {
    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();

    // Close popup when close button is clicked
    $('.popup-close').click(function() {
        $('.popup-overlay').remove();
    });

    // Close popup when Escape key is pressed
    $(document).keyup(function(e) {
        if (e.key === "Escape") {
            $('.popup-overlay').remove();
        }
    });
});

    $(document).ready(function() {
    $('#show-cart').click(function(e) {
        e.preventDefault();
        var url = "{{ route('preview') }}"; // Replace with the URL to your cart page
        var popup = window.open(url, 'cart-popup', 'width=800,height=600');
        popup.focus();
    });
});
    function reloadPage() {
  window.location.reload();
}

// get references to the HTML input elements
const totalAmountInput = document.getElementById('totalamount');
const vatInput = document.getElementById('vat');
const discountInput = document.getElementById('discount');

// define a function to calculate the discounted amounts
function calculateDiscountedAmounts() {
  // get the current values of the total amount and VAT
  const totalAmount = parseFloat(totalAmountInput.value);
  const vat = parseFloat(vatInput.value);

  // get the discount percentage as a decimal
  const discountPercent = parseFloat(discountInput.value) / 100;

  // calculate the discounted total amount and VAT
  const discountedTotalAmount = totalAmount * (1 - discountPercent);
  const discountedVat = vat * (1 - discountPercent);

  // update the input fields with the new values
  totalAmountInput.value = Math.round(discountedTotalAmount);
  vatInput.value = Math.round(discountedVat);
}

// add an event listener to the discount input field
discountInput.addEventListener('change', calculateDiscountedAmounts);


// Get the input elements
const myTotalAmountInput = document.getElementById('totalamount');
const myPayInput = document.getElementById('pay');
const myReturnInput = document.getElementById('return');

// Add an event listener to the pay input element
myPayInput.addEventListener('input', () => {
  // Get the values from the input elements and convert them to numbers
  const totalAmount = parseFloat(myTotalAmountInput.value);
  const pay = parseFloat(myPayInput.value);

  // Calculate the return amount
  const returnAmount = pay - totalAmount;

  // Display the return amount in the return input element
  myReturnInput.value = returnAmount.toFixed();
});



</script>
  </body>
</html>