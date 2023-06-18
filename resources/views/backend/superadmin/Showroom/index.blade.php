@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Showroom List</h4>
                    </div>
                    <a href="{{ route('adshowroomform')}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Showroom</a>
                </div>
    </div>
            <div class="col-lg-12">
                <table class="data-tables table mb-0 tbl-server-info">
                    <thead class="thead-dark">
                        <tr class="ligth ligth-data">
                            <th>ShowroomID</th>
                            <th>ShowroomName</th>
                            <th>Address</th>
                            <th>Mobile No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                    	@foreach ($list as $lists)
                        <tr>
                        	<td>{{ $lists->showroomid }}</td>
                        	<td>{{ $lists->showroomname }}</td>
                        	<td>{{ $lists->address }}</td>
                        	<td>{{ $lists->mobile }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                        href="#"><i class="ri-eye-line mr-0"></i></a>
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="#"><i class="ri-pencil-line mr-0"></i></a>
                                    <a class="badge bg-warning mr-2"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title=""
                                       data-original-title="Delete"
                                       href="#"
                                       onclick="return confirmdeleteshowroom({{ $lists->id }})">
                                      <i class="ri-delete-bin-line mr-0"></i>
                                    </a>    
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>	
@endsection	