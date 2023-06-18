@extends('backend.layout.showroominchage.admin')
@section('content')
    <div class="container">
              <div class="row">
                <div class="col-md-12">
                  @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                    @endif 
                    <div id="sales_totals">
          					    <a href="{{ route('sellsreport', 'today') }}">Today Sales: {{ $totalSalesToday ?? 'N/A' }}</a><br>
          					    <a href="{{ route('sellsreport', 'week') }}">This Week Sales: {{ $totalSalesWeek ?? 'N/A' }}</a><br>
          					    <a href="{{ route('sellsreport', 'month') }}">This Month Sales: {{ $totalSalesMonth ?? 'N/A' }}</a>
					          </div>
                </div>
              </div>
                   
              </div>
          </div>
@endsection