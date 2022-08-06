@extends('layouts.app_admin')
@section('content')
<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data User</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                            {{-- <button class="btn"><i class="fa fa-plus"></i> create</button> --}}
                            <a href="{{route('user.create')}}"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"> create </i></button></a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Email</th>
                                            {{-- <th>password</th> --}}
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                            <tbody>
                                            @forelse ($user as $row)
                                         <tr>
                                             <td>{{ $row->name }}</td>
                                             <td>{{ $row->email }}</td>
                                             {{-- <td>{{ $row->password }}</td> --}}
                                             <td>{{ $row->is_admin }}</td>
                                             <td class="text-center">
                                                 <a href="{{ route('user.edit', $row->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
         
                                                 <form action="{{ route('user.destroy', $row->id)}}" method="post" class="d-inline">
                                                     @csrf
                                                     @method('delete')
                                                 <button class="btn btn-danger btn-sm">
                                                     <i class="fa fa-trash"></i>
                                                 </button>
                                                 </form>
                                             </td>
                                         </tr>
                                         @empty
                                         <tr>
                                             <td class="text-center" colspan="6">Data post tidak tersedia</td>
                                         </tr>
                                         @endforelse
                                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
@endsection('content')