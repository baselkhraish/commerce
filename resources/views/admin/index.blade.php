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
                 <!--begin::Row-->
                 <div class="row g-5 g-xl-10 mb-xl-10">
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-4 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 6-->
                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column p-5">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Amount-->
                                    <span class="fs-1hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $products->count() }} منتج</span>

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
                                <div class="card-title d-flex flex-column p-5">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Amount-->
                                    <span class="fs-1hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $categories->count() }} قسم</span>
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
                        <!--end::Card widget 5-->
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-4 mb-md-5 mb-xl-10">
                         <!--begin::Card widget 6-->
                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column p-5">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Amount-->
                                    <span class="fs-1hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $order->count() }} طلب</span>

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
                                <div class="card-title d-flex flex-column p-5">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Amount-->
                                    <!--begin::Currency-->
                                    <span class="fs-4 fw-bold text-gray-400 me-1 align-self-start">$</span>
                                    <!--end::Currency-->
                                    <!--begin::Amount-->
                                    <span class="fs-1hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $payment }}</span>
                                    <!--end::Amount-->                                        <!--end::Amount-->
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
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-4 mb-md-5 mb-xl-10">
                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column p-5">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Amount-->
                                        <span class="fs-1hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $cart }} منتج</span>
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
                    </div>
                </div>
                <!--end::Modals-->
            </div>
            <!--end::Col-->




        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->


@stop
