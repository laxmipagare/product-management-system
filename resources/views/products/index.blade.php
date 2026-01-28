@extends('layouts.app')
@section('content')
<!--begin::App Wrapper-->
<div class="app-wrapper">
    <!--begin::Header-->
    @include('layouts.nav')
    <!--end::Header-->
    
    <!--begin::App Main-->
    <main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Product List </h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ url('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
            </div>
            <div id="deletealertBox"></div>
        </div>
        <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">List</h3>

                    <div class="card-tools">
                        
                        <a href="{{ url('products/create') }}" class="btn btn-primary btn-sm">
                            <i class="nav-icon bi bi-plus"></i>
                        </a>
                        
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    
                    <table class="table table-bordered" id="productTable">
                        <thead>
                        <tr>
                            <th style="width: 5px;">Sr. No</th>
                            <th style="width: 45px">Product Name</th>
                            <th style="width: 45px">Product Price</th>
                            <th style="width: 5px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <!-- <tr class="align-middle">
                            <td>1</td>
                            <td>abc</td>
                            <td></td>
                            <td>
                                <a href="" class="btn btn-success btn-sm">
                                <i class="nav-icon bi bi-pencil"></i></a> 
                                <a href="" class="btn btn-danger btn-sm"><i class="nav-icon bi bi-trash"></i></a>
                            </td>
                        </tr> -->
                        
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            
            </div>
            
            
            </div>
            <!-- /.col -->
        </div>
        <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
    </main>
    <!--end::App Main-->
    <!--begin::Footer-->
    <footer class="app-footer">
    <!--begin::To the end-->
    <div class="float-end d-none d-sm-inline">Anything you want</div>
    <!--end::To the end-->
    <!--begin::Copyright-->
    <strong>
        Copyright &copy; 2014-2025&nbsp;
        <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
    </strong>
    All rights reserved.
    <!--end::Copyright-->
    </footer>
    <!--end::Footer-->
</div>
<!--end::App Wrapper-->
<script>
    window.productListUrl = "{{ url('/products/list') }}";
    window.baseUrl = "{{ url('/') }}";
</script>
@push('scripts')
<script src="{{ asset('/assets/js/products/js/products.js') }}"></script>
@endpush
@endsection