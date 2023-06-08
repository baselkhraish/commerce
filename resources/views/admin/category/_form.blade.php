<!--begin::Main column-->
<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
    <!--begin::General options-->
    <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <h2>الأقسام</h2>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0 pb-0">
            <!--begin::Input group-->
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="required form-label">اسم القسم</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" name="name" class="form-control mb-2  @error('name') is-invalid @enderror" placeholder="اسم القسم" value="{{ old('name',$category->name) }}"/>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <!--end::Input-->
                <!--begin::Description-->
                <div class="text-muted fs-7">هنا يمكنك إضافة اسم القسم</div>
                <!--end::Description-->
            </div>
            <!--end::Input group-->
        </div>

        <!--end::Card header-->
        <div class="card-body pt-0 pb-0">
            <!--begin::Card body-->
            <div class="mb-10 fv-row">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">الحالة</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="status" class="form-control  @error('status') is-invalid @enderror">
                        <option value="" disabled>اختر الحالة</option>
                        <option value="1" @selected(old('status',$category->status) == 1)>نشط</option>
                        <option class="text-danger" value="0" @selected(old('status',$category->status) == 0)>غير نشط</option>
                    </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7"><span class="text-danger">للعلم</span> إذا كانت غير نشطة فإنه سيؤدي إلى إلغاء تنشيط كل المقالات التابعة لهذا القسم</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
            </div>
        </div>

    </div>
    <!--end::General options-->

    <div class="d-flex justify-content-start">
        <!--begin::Button-->
        <a href="{{ route('admin.category.index') }}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">إلغاء</a>
        <!--end::Button-->
        <!--begin::Button-->
        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
            <span class="indicator-label">{{ $button_lable ?? 'حفظ' }}</span>
        </button>
        <!--end::Button-->
    </div>
</div>
<!--end::Main column-->
