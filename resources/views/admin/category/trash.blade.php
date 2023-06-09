@extends('layouts.admin')
@section('title','الأقسام سلة المحذوفات')
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
                                <span class="card-label fw-bolder fs-3 mb-1">الأقسام المحذوفة</span>
                                <span class="text-muted mt-3 fw-bold fs-7">{{ $categories->count() }}  قسم محذوف</span>
                            </h3>
                        </div>
                        <div>
                            <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-primary">الأقسام</a>
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
                                        <th class="min-w-200px">اسم القسم</th>
                                        <th class="min-w-150px">تاريخ الإضافة</th>
                                        <th class="min-w-100px text-end">الحركات</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach ($categories as $item)
                                    <tr>
                                        <td>
                                            <p class="font-weight-bold">{{ $item->id }}</p>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                    <p
                                                        class="text-dark fw-bolder text-hover-primary fs-6">{{ $item->name }}</p>
                                            </div>
                                        </td>

                                        <td>
                                            <p
                                                class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $item->created_at }}</p>
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                <form action="{{route('admin.category.restore',$item->id)}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <input type="submit" value="استعادة" class="btn btn-sm btn-success" style="margin-left: 15px" onclick="return confirm('هل تريد الاسترجاع?')">
                                                </form>
                                                <form action="{{route('admin.category.forceDelete',$item->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" value="حذف نهائي" class="btn btn-sm btn-danger" style="margin-left: 15px" onclick="return confirm('هل تريد الحذف?')">
                                                </form>
                                            </div>
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
