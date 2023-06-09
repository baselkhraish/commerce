@extends('layouts.admin')
@section('title','إنشاء منتج')
@section('content')

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">


            <form action="{{ route('admin.product.store') }}" method="post" id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                @csrf
                @include('admin.product._form', [
                    'button_lable' => 'إضافة',
                    'add_photo' =>'قم بإضافة صورة إلى المنتج'
                ])
            </form>


        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

@stop
