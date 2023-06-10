@extends('layouts.admin')
@section('title','لوحة التحكم')
@section('content')

<!--begin::Post-->
<div class="post d-flex flex-column-fluid"  id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Row-->
        <div class="row gy-5 g-xl-8">
            <!--begin::Col-->
            <div class="col-xl-12">
                <div class="d-flex justify-content-around align-items-center">
                    <!--begin::Card widget 6-->
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $products->count() }} منتجات</span>
                                    <!--end::Amount-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Subtitle-->
                                <span class="text-gray-900 pt-3 fw-bold fs-6">عدد المنتجات في الموقع</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->

                    </div>
                    <!--end::Card widget 6-->
                    <!--begin::Card widget 6-->
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $categories->count() }} قسم</span>
                                    <!--end::Amount-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Subtitle-->
                                <span class="text-gray-900 pt-3 fw-bold fs-6">عدد الأقسام في الموقع</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->

                    </div>
                    <!--end::Card widget 6-->
                    <!--begin::Card widget 6-->
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $order->count() }} الطلبات</span>
                                    <!--end::Amount-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Subtitle-->
                                <span class="text-gray-900 pt-3 fw-bold fs-6">عدد الطلبات في الموقع</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->

                    </div>
                    <!--end::Card widget 6-->

                    <!--begin::Card widget 6-->
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $cart }} منتج</span>
                                    <!--end::Amount-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Subtitle-->
                                <span class="text-gray-900 pt-3 fw-bold fs-6">عدد المنتجات التي تم بيعها في الموقع</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->

                    </div>
                    <!--end::Card widget 6-->


                    <!--begin::Card widget 6-->
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Currency-->
                                    <span class="fs-4 fw-bold text-gray-400 me-1 align-self-start">$</span>
                                    <!--end::Currency-->
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $payment }}</span>
                                    <!--end::Amount-->

                                </div>
                                <!--end::Info-->
                                <!--begin::Subtitle-->
                                <span class="text-gray-900 pt-3 fw-bold fs-6">كمية الدخل الواردة من المنتجات</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->

                    </div>
                    <!--end::Card widget 6-->
                </div>
            </div>
            <!--end::Col-->


        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->


@stop
