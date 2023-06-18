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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> 
      <style type="text/css">
        label{
          font-size: 18px;
        }
        .col-md-6{
          line-height: 5px;
        }
        table::-webkit-scrollbar {
            height: 15px;
          }
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
                              <span class="ml-4">Products</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="product" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                              <li class="">
                                  <a href="{{ route('productlists') }}">
                                      <i class="las la-minus"></i><span>List Product</span>
                                  </a>
                              </li>
                              <li class="">
                                  <a href="{{ route('addproductform')}}">
                                      <i class="las la-minus"></i><span>Add Product</span>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class=" ">
                          <a href="#category" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash3" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                  <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                              </svg>
                              <span class="ml-4">Categories</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="category" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="">
                                          <a href="{{ route('listcategory')}}">
                                              <i class="las la-minus"></i><span>List Category</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="{{ route('addcategoryform') }}">
                                              <i class="las la-minus"></i><span>Add Category</span>
                                          </a>
                                  </li>
                          </ul>
                      </li>
                      <li class=" ">
                          <a href="#corporatesell" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash3" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                  <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                              </svg>
                              <span class="ml-4">Corporate Sells</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="corporatesell" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="">
                                          <a href="{{ route('listcategory')}}">
                                              <i class="las la-minus"></i><span>List Sells</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="{{ route('addcategoryform') }}">
                                              <i class="las la-minus"></i><span>Add Sell</span>
                                          </a>
                                  </li>
                          </ul>
                      </li>
                      <li class=" ">
                          <a href="#purchase" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash5" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                  <line x1="1" y1="10" x2="23" y2="10"></line>
                              </svg>
                              <span class="ml-4">Purchases</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="purchase" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="">
                                          <a href="{{ route('purchaselist')}}">
                                              <i class="las la-minus"></i><span>List Purchases</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="{{ route('workorder')}}">
                                              <i class="las la-minus"></i><span>Add Work Order</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="{{ route('listworkorder')}}">
                                              <i class="las la-minus"></i><span>List Work Order</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="{{ route('purchaseform')}}">
                                              <i class="las la-minus"></i><span>Add purchase</span>
                                          </a>
                                  </li>
                          </ul>
                      </li>
                      <li class=" ">
                          <a href="#people" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash8" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                              </svg>
                              <span class="ml-4">Suppliar</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="people" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">

                                  <li class="">
                                          <a href="{{ route('suppliarlist')}}">
                                              <i class="las la-minus"></i><span>Suppliers List</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="{{ route('adsuppliars') }}">
                                              <i class="las la-minus"></i><span>Add Suppliers</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="{{ route('purchaseratesupplair')}}">
                                              <i class="las la-minus"></i><span>Supplier Base Purchase</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="{{ route('ratesuppliar') }}">
                                              <i class="las la-minus"></i><span>Supplier Base Rate</span>
                                          </a>
                                  </li>
                          </ul>
                      </li>
                      <li class=" ">
                          <a href="#report" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash8" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                              </svg>
                              <span class="ml-4">Report</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="report" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">

                                  <li class="">
                                          <a href="{{ route('suppliarlist')}}">
                                              <i class="las la-minus"></i><span>Sells List</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="{{ route('profitmargin') }}">
                                              <i class="las la-minus"></i><span>Profit Base Report</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="{{ route('purchaseratesupplair')}}">
                                              <i class="las la-minus"></i><span>Suppliarbase Sells Report</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="{{ route('ratesuppliar') }}">
                                              <i class="las la-minus"></i><span>Product Base Sells Report</span>
                                          </a>
                                  </li>
                          </ul>
                      </li>
                      <li class=" ">
                          <a href="#showroom" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash8" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                              </svg>
                              <span class="ml-4">Showroom</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="showroom" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="">
                                          <a href="{{ route('showroomlist')}}">
                                              <i class="las la-minus"></i><span>Showroom List</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="{{ route('adshowroomform') }}">
                                              <i class="las la-minus"></i><span>Add Showroom</span>
                                          </a>
                                  </li>
                          </ul>
                      </li>
                      <li class=" ">
                          <a href="#stock" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash5" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                  <line x1="1" y1="10" x2="23" y2="10"></line>
                              </svg>
                              <span class="ml-4">Stock</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="stock" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="">
                                          <a href="{{ route('stockproduct') }}">
                                              <i class="las la-minus"></i><span>Stock</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="{{ route('transferproductform') }}">
                                              <i class="las la-minus"></i><span>Transfer Product</span>
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
                          <img src="{{ asset('assets') }}/images/logo.png" class="img-fluid rounded-normal" alt="logo">
                          
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
                                      <img src="{{ asset('assets') }}/images/user/1.png" class="img-fluid rounded" alt="user">
                                  </a>
                                  <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <div class="card shadow-none m-0">
                                          <div class="card-body p-0 text-center">
                                              <div class="media-body profile-detail text-center">
                                                  <img src="{{ asset('assets') }}/images/page-img/profile-bg.jpg" alt="profile-bg"
                                                      class="rounded-top img-fluid mb-4">
                                                  <img src="{{ asset('assets') }}/images/user/1.png" alt="profile-img"
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
    <!-- Wrapper End-->
    <footer class="iq-footer">
            <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                                <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
   <script> 
    // Get references to the input fields
// Get references to the input fields
const unitCostInput = document.querySelector('input[name="unitcost"]');
const quantityInput = document.querySelector('input[name="quentity"]');
const vatInput = document.querySelector('input[name="vat"]');
const totalPurchasePriceInput = document.querySelector('input[name="totalpurchaseprice"]');
const totalSellsPriceInput = document.querySelector('input[name="totalsellsprice"]');
const unitSellsPriceInput = document.querySelector('input[name="unitSellsprice"]');
const cPriceInput = document.querySelector('input[name="cprice"]');
const profitPercentageInput = document.querySelector('input[name="profitpercentage"]');


// Add event listeners to the input fields  
unitCostInput.addEventListener('input', calculateTotalPrice);
quantityInput.addEventListener('input', calculateTotalPrice);
unitSellsPriceInput.addEventListener('input', calculateProfitPercentage);
vatInput.addEventListener('input', calculateTotalSellsPrice);

// Define the calculation functions
function calculateTotalPrice(){
    const unitCost = parseFloat(unitCostInput.value);
    const quantity = parseFloat(quantityInput.value);
    const totalPurchasePrice = unitCost * quantity;
    totalPurchasePriceInput.value = totalPurchasePrice.toFixed(2);
    calculateProfitPercentage();
}

function calculateProfitPercentage() {
    const unitCost = parseFloat(unitCostInput.value);
    const unitSellsPrice = parseFloat(unitSellsPriceInput.value);
    const profitPercentage = ((unitSellsPrice - unitCost) / unitSellsPrice) * 100;
    profitPercentageInput.value = profitPercentage.toFixed(2);
    calculateTotalSellsPrice();
}

function calculateTotalSellsPrice() {
    const unitSellsPrice = parseFloat(unitSellsPriceInput.value);
    const quantity = parseFloat(quantityInput.value);
    const vat = parseFloat(vatInput.value);
    const customerPrice = unitSellsPrice * (1 + (vat / 100));
    const roundedPrice = Math.ceil(customerPrice); // round to the nearest integer
    cPriceInput.value = roundedPrice;
    const totalSellsPrice = unitSellsPrice * quantity * (1 + (vat / 100));
    totalSellsPriceInput.value = totalSellsPrice.toFixed(2);
}

function confirmDelete(categoryId) {
    var confirmBox = document.createElement('div');
    confirmBox.classList.add('confirm-box');

    var message = document.createElement('h2');
    message.textContent = 'Are you sure you want to delete this category?';
    confirmBox.appendChild(message);

    var yesButton = document.createElement('button');
    yesButton.textContent = 'Yes';
    yesButton.addEventListener('click', function() {
      window.location.href = "{{ url('deletecategory') }}/" + categoryId;
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
function confirmDeletesubcategory(subcategoryId) {
    var confirmBox = document.createElement('div');
    confirmBox.classList.add('confirm-box');

    var message = document.createElement('h2');
    message.textContent = 'Are you sure you want to delete this Subcategory?';
    confirmBox.appendChild(message);

    var yesButton = document.createElement('button');
    yesButton.textContent = 'Yes';
    yesButton.addEventListener('click', function() {
      window.location.href = "{{ url('subcategorydelete') }}/" + subcategoryId;
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
function confirmDeleteproduct(productid) {
    var confirmBox = document.createElement('div');
    confirmBox.classList.add('confirm-box');

    var message = document.createElement('h2');
    message.textContent = 'Are you sure you want to delete this Product?';
    confirmBox.appendChild(message);

    var yesButton = document.createElement('button');
    yesButton.textContent = 'Yes';
    yesButton.addEventListener('click', function() {
      window.location.href = "{{ url('productdelete') }}/" + productid;
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

function confirmDeletepurchase(purchaseid) {
    var confirmBox = document.createElement('div');
    confirmBox.classList.add('confirm-box');

    var message = document.createElement('h2');
    message.textContent = 'Are you sure you want to delete this Purchase?';
    confirmBox.appendChild(message);

    var yesButton = document.createElement('button');
    yesButton.textContent = 'Yes';
    yesButton.addEventListener('click', function() {
      window.location.href = "{{ url('deletepurchase') }}/" + purchaseid;
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

function confirmDeleteworkorder(purchaseid) {
    var confirmBox = document.createElement('div');
    confirmBox.classList.add('confirm-box');

    var message = document.createElement('h2');
    message.textContent = 'Are you sure you want to delete this WorkOrder?';
    confirmBox.appendChild(message);

    var yesButton = document.createElement('button');
    yesButton.textContent = 'Yes';
    yesButton.addEventListener('click', function() {
      window.location.href = "{{ url('deleteworkorder') }}/" + purchaseid;
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
function confirmDeletesuppliar(suppliarid) {
    var confirmBox = document.createElement('div');
    confirmBox.classList.add('confirm-box');

    var message = document.createElement('h2');
    message.textContent = 'Are you sure you want to delete this Suppliar?';
    confirmBox.appendChild(message);

    var yesButton = document.createElement('button');
    yesButton.textContent = 'Yes';
    yesButton.addEventListener('click', function() {
      window.location.href = "{{ url('deletesuppliar') }}/" + suppliarid;
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

function confirmdeleteshowroom(showroomid) {
    var confirmBox = document.createElement('div');
    confirmBox.classList.add('confirm-box');

    var message = document.createElement('h2');
    message.textContent = 'Are you sure you want to delete this Showroom?';
    confirmBox.appendChild(message);

    var yesButton = document.createElement('button');
    yesButton.textContent = 'Yes';
    yesButton.addEventListener('click', function() {
      window.location.href = "{{ url('deleteshowroom') }}/" + showroomid;
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

export default {
    data() {
        return {
            categoryname: '',
        };
    },
    methods: {
        saveItem() {
            const data = {
                categoryname: this.categoryname,
                
            };

            axios.post('/api/insertcategory', data)
                .then(response => {
                    console.log(response.data.message);
                    // Perform any additional actions if needed

                    // Reset the form fields
                    this.name = '';
                })
                .catch(error => {
                    console.error(error);
                    // Handle error scenarios if needed
                });
        }
    }
};
</script>


    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('assets') }}/js/backend-bundle.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('assets') }}/js/table-treeview.js"></script>
    <script src="{{ asset('assets') }}/js/purchase.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets') }}/js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('assets') }}/js/chart-custom.js"></script>
    <!-- app JavaScript -->
    <script src="{{ asset('assets') }}/js/app.js"></script>
     <script src="{{ asset('assets') }}/js/jquery.js"></script>
    @yield('search')
  </body>
</html>