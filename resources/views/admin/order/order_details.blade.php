@extends('layouts.admin')
@section('title', 'الطلبات')
@section('content')


    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row gy-5 g-xl-8">
                <!--begin::Col-->
                <div class="col-xl-12">
                    <!--begin::Tables Widget 9-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">الطلبات</span>
                                </h3>
                            </div>
                        </div>



                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fw-bolder text-muted">
                                            <th class="w-25px">#</th>
                                            <th class="min-w-200px">اسم الزبون</th>
                                            <th class="min-w-200px">المنتج</th>
                                            <th class="min-w-150px">الكمية</th>
                                            <th class="min-w-150px">السعر</th>
                                            <th class="min-w-100px">تاريخ الشراء</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        @foreach ($cart as $item)
                                            <tr>
                                                <td>
                                                    <p class="font-weight-bold">{{ $item->id }}</p>
                                                </td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <p class="text-dark fw-bolder text-hover-primary fs-6">
                                                            {{ $item->user->name }}</p>
                                                    </div>
                                                </td>

                                                <td>
                                                    <p class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                                         {{ $item->product->name }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                                        <span class="badge badge-primary">
                                                        {{ $item->qty }}
                                                        </span>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                                        ${{ $item->price }}</p>
                                                </td>

                                                <td>
                                                    <p class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                                        {{ $item->created_at->format('Y-m-d') }}</p>
                                                </td>

                                            </tr>
                                        @endforeach


                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--begin::Body-->
                    </div>
                    <!--end::Tables Widget 9-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

@stop
