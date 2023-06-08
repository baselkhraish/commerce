@extends('layouts.admin')
@section('title','إنشاء قسم')
@section('content')

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">


            <form action="{{ route('admin.category.store') }}" method="post" id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                @csrf
                @include('admin.category._form', [
                    'button_lable' => 'إضافة',
                ])
            </form>


        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

@stop
