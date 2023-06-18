@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Category List</h4>
                    </div>
                    <a href="{{ route('addcategoryform')}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Category</a>
                    <a href="{{ route('addsubcategorylist')}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>list SubCategory</a>
                </div>
    </div>
            <div class="col-lg-12">
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
                <table class="data-tables table mb-0 tbl-server-info">
                    <thead class="thead-dark">
                        <tr class="ligth ligth-data">
                            <th>Category Name</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                    	@foreach ($category as $categorylist)
                        <tr>
                        	<td>{{ $categorylist->name }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                        href="#"><i class="ri-eye-line mr-0"></i></a>
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="{{ route('category-update', [$categorylist->id])}}"><i class="ri-pencil-line mr-0"></i></a>
                                   <a class="badge bg-warning mr-2"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title=""
                                       data-original-title="Delete"
                                       href="#"
                                       onclick="return confirmDelete({{ $categorylist->id }})">
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