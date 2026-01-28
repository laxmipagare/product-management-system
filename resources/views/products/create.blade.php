
@extends('layouts.app')
@section('content')

<!--begin::App Wrapper-->
<div class="app-wrapper">
    
    @include('layouts.nav')
    <!--begin::App Main-->
    <main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Create Product</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
            </div>
            <div id="alertBox"></div>
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
        <div class="row g-4">
            <!--begin::Col-->
            <div class="col-md-12">
            <!--begin::Form Validation-->
            <div class="card card-info card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Product Details</div>
                    <div class="card-tools">
                        <a href="{{ url('/products') }}" class="btn btn-primary btn-sm">
                            Back
                        </a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form id="productForm" method="POST" action="javascript:void(0)" enctype="multipart/form-data">
                    @csrf
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Row-->
                    <div class="row g-3">
                        
                    <!--begin::Col-->
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Product Name<span style="color:red;">*</span></label>
                        <input
                        type="text"
                        class="form-control"
                        id="validationCustom01"
                        name="product_name"
                        placeholder="Product Name"
                        required
                        />
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Product Price<span style="color:red;">*</span></label>
                        <input
                        type="text"
                        class="form-control"
                        id="validationCustom01"
                        name="product_price"
                        placeholder="Product Price"
                        required
                        />
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Product Description<span style="color:red;">*</span></label>
                        <textarea class="form-control" aria-label="textarea" name="product_description" placeholder="Product Description" required></textarea>
                    </div>
                    <!--end::Col-->


                    <!--begin::Col-->
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Upload Multiple Images</label>
                        <input
                        type="file"
                        class="form-control"
                        id="validationCustom01"
                        name="product_image[]"
                        placeholder="Product Image"
                        multiple
                        />
                    </div>
                    <!--end::Col-->

                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="card-footer">
                    <button class="btn btn-info" type="submit">Submit form</button>
                </div>
                <!--end::Footer-->
                </form>
                <!--end::Form-->
                <!--begin::JavaScript-->
                <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (() => {
                    'use strict';

                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    const forms = document.querySelectorAll('.needs-validation');

                    // Loop over them and prevent submission
                    Array.from(forms).forEach((form) => {
                    form.addEventListener(
                        'submit',
                        (event) => {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }

                        form.classList.add('was-validated');
                        },
                        false,
                    );
                    });
                })();
                </script>
                <!--end::JavaScript-->
            </div>
            <!--end::Form Validation-->
            </div>
            <!--end::Col-->
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

<script>
    window.productListUrl = "{{ url('/products/list') }}";
    window.productStoreUrl = "{{ url('/products/store') }}";
    window.productUpdateUrl = "{{ url('/products/update') }}";
</script>
@push('scripts')
<script src="{{ asset('/assets/js/products/js/products.js') }}"></script>
@endpush
<!--end::App Wrapper-->
@endsection