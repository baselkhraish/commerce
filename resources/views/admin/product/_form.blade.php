<!--begin::Aside column-->
<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
    <!--begin::image-->
    <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>صورة المنتج</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body text-center pt-0">
            <!--begin::Image input-->
            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                style="background-image: url({{ asset('uploads/images/products/' . $product->image) }})">
                <!--begin::Preview existing avatar-->
                <div class="image-input-wrapper w-150px h-150px"></div>
                <!--end::Preview existing avatar-->
                <!--begin::Label-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <!--begin::Inputs-->
                    <input type="file" name="image" accept=".png, .jpg, .jpeg" value="{{ $product->image }}" />
                    <input type="hidden" name="avatar_remove" />
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
                <h2>الأقسام </h2>
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
            </div>
            <!--begin::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Select2-->
            <select name="category_id" class="form-control  @error('category_id') is-invalid @enderror">
                <option selected disabled>--اختر قسماً--</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>

            <!--end::Select2-->
            <!--begin::Description-->
            <div class="text-muted fs-7 mt-2">اختر قسم</div>
            <!--end::Description-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Status-->
</div>


<!--begin::Main column-->
<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
    <!--begin::General options-->
    <div class="card card-flush py-4">
        @include('admin.parts.errors')
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <h2>المنتجات</h2>
            </div>
        </div>
        <!--end::Card header-->


        <!--begin::name-->
        <div class="card-body pt-0 pb-0">
            <!--begin::Input group-->
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="required form-label">اسم المنتج</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" name="name" class="form-control mb-2  @error('name') is-invalid @enderror"
                    value="{{ old('name', $product->name) }}" />
                <!--end::Input-->
            </div>
            <!--end::Input group-->

        </div>

        <!--begin::price-->
        <div class="card-body pt-0 pb-0">
            <!--begin::Input group-->
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="required form-label">سعر المنتج</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" name="price" class="form-control mb-2  @error('price') is-invalid @enderror"
                    value="{{ old('price', $product->price) }}" />
                <!--end::Input-->
            </div>
            <!--end::Input group-->

        </div>

        <!--begin::sale price-->
        <div class="card-body pt-0 pb-0">
            <!--begin::Input group-->
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="required form-label">سعر العرض</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" name="sale_price" class="form-control mb-2  @error('sale_price') is-invalid @enderror"
                    value="{{ old('sale_price', $product->sale_price) }}" />
                <!--end::Input-->
            </div>
            <!--end::Input group-->

        </div>

        <!--begin::qty-->
        <div class="card-body pt-0 pb-0">
            <!--begin::Input group-->
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="required form-label">الكمية</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" name="qty" class="form-control mb-2  @error('qty') is-invalid @enderror"
                    value="{{ old('qty', $product->qty) }}" />
                <!--end::Input-->
            </div>
            <!--end::Input group-->

        </div>

        <!--begin::description-->
        <div class="card-body pt-0 pb-0">
            <!--begin::Input group-->
            <div class="mb-10 fv-row">
                <!--begin::Input group-->
                <div>
                    <!--begin::Label-->
                    <label class="form-label" for="exampleFormControlTextarea1">وصف المنتج</label>
                    <!--end::Label-->
                    <!--begin::Editor-->
                    <div class="form-group">
                        <textarea name="description" class="mytextarea form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="8">{{ old('description', $product->description) }}</textarea>
                    </div>
                    <!--end::Editor-->
                </div>
                <!--end::Input-->
            </div>
            <!--end::Input group-->
        </div>

    </div>
    <!--end::General options-->

    <div class="d-flex justify-content-start">
        <!--begin::Button-->
        <a href="{{ route('admin.product.index') }}" id="kt_ecommerce_add_product_cancel"
            class="btn btn-light me-5">إلغاء</a>
        <!--end::Button-->
        <!--begin::Button-->
        <button type="submit" id="kt_ecommerce_add_blog_submit" class="btn btn-primary">
            <span class="indicator-label">{{ $button_lable ?? 'حفظ' }}</span>
        </button>
        <!--end::Button-->
    </div>
</div>
<!--end::Main column-->
