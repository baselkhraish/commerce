<!--begin::Aside column-->
<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
    <!--begin::image-->
    <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>صورة القسم</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body text-center pt-0">
            <!--begin::Image input-->
            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                    style="background-image: url({{ asset('uploads/images/category/'.$category->image) }})">
                <!--begin::Preview existing avatar-->
                <div class="image-input-wrapper w-150px h-150px"></div>
                <!--end::Preview existing avatar-->
                <!--begin::Label-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <!--begin::Inputs-->
                    <input type="file" name="image" accept=".png, .jpg, .jpeg" value="{{ $category->image }}" />
                    <input type="hidden" name="image" />
                    <!--end::Inputs-->
                </label>
                <!--end::Label-->
                <!--begin::Cancel-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                    <i class="bi bi-x fs-2"></i>
                </span>
                <!--end::Cancel-->
                <!--begin::Remove-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                    <i class="bi bi-x fs-2"></i>
                </span>
                <!--end::Remove-->
            </div>
            <!--end::Image input-->
            <!--begin::Description-->
            <div class="text-muted fs-7">{{ $add_photo ?? 'التعديل على هذه الصورة' }}</div>
            <!--end::Description-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::image-->



    <!--begin::Category-->
    <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>تفاصيل الأقسام</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0 pb-0">
            <!--begin::Input group-->
            <!--begin::Label-->
            <label class="form-label">الأقسام</label>
            <!--end::Label-->
            <!--begin::Select2-->
            <select name="parent_id" class="form-select mb-2  @error('parent_id') is-invalid @enderror" data-control="select2" data-placeholder="Select an option"
                data-allow-clear="true">
                <option></option>
                
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}"  {{ $category->parent_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
            @error('parent_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <!--end::Select2-->
            <!--begin::Description-->
            <div class="text-muted fs-7 mb-7">أضف القسم إلى أب</div>
            <!--end::Description-->
            <!--end::Input group-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Category-->
</div>


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


        <!--begin::title-->
        <div class="card-body pt-0 pb-0">
            <!--begin::Input group-->
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="required form-label">اسم القسم</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" name="name" class="form-control mb-2  @error('name') is-invalid @enderror"
                    value="{{ old('name', $category->name) }}" />
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <!--end::Input-->

            </div>
            <!--end::Input group-->

        </div>



    <div class="d-flex justify-content-start">
        <!--begin::Button-->
        <a href="{{ route('admin.category.index') }}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">إلغاء</a>
        <!--end::Button-->
        <!--begin::Button-->
        <button type="submit" id="kt_ecommerce_add_blog_submit" class="btn btn-primary">
            <span class="indicator-label">{{ $button_lable ?? 'حفظ' }}</span>
        </button>
        <!--end::Button-->
    </div>
</div>
<!--end::Main column-->
