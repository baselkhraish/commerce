@extends('layouts.admin')
@section('title','تعديل القسم')
@section('content')

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">


            <form action="{{ route('admin.product.update',$product->id) }}" method="post" id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                @csrf
                @method('put')
                @include('admin.product._form', [
                    'button_lable' => 'حفظ التغييرات',
                ])
            </form>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

@stop
