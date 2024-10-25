@extends('Admin.layouts.app')
@section('page_title', 'Manage Product')
@section('admin-content')

    @if ($id > 0)
        @php
            $image_required = '';
        @endphp
    @else
        @php
            $image_required = 'required';
        @endphp
    @endif
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>@yield('page_title')</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item">@yield('page_title')</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ url('admin/product') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> back
            </a>

        </div>
    </div>
    @if (session()->has('sku_error'))
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            {{ session('sku_error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    @error('attr_image.*')
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @enderror

    @error('images.*')
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @enderror
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <form class="row needs-validation" action="{{ route('product.manage_product_process') }}" method="post"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    <input type="hidden" name="id" value="{{ $id }}" />
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Product</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="control-label "> Name</label>
                                    <input id="name" value="{{ $name }}" name="name" type="text"
                                        class="form-control" required>
                                    @error('name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="slug" class="control-label "> Slug</label>
                                    <input id="slug" value="{{ $slug }}" name="slug" type="text"
                                        class="form-control" required>
                                    @error('slug')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="image" class="control-label "> Image (250px *
                                        300px)</label>
                                    <input id="image" name="image" type="file" class="form-control"
                                        {{ $image_required }}>
                                    @error('image')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if ($image != '')
                                        <a href="{{ asset('storage/media/product/' . $image) }}" target="_blank"><img
                                                height="50px" width="50px"
                                                src="{{ asset('storage/media/product/' . $image) }}" /></a>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for="category_id" class="control-label ">
                                        Category</label>
                                    <select id="category_id" name="category_id" class="form-select" required>
                                        <option value="">Select Categories</option>
                                        @foreach ($category as $list)
                                            @if ($category_id == $list->id)
                                                <option selected value="{{ $list->id }}">
                                                @else
                                                <option value="{{ $list->id }}">
                                            @endif
                                            {{ $list->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="category_id" class="control-label "> Brand</label>
                                    <select id="brand" name="brand" class="form-select" required>
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $list)
                                            @if ($brand == $list->id)
                                                <option selected value="{{ $list->id }}">
                                                @else
                                                <option value="{{ $list->id }}">
                                            @endif
                                            {{ $list->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="model" class="control-label "> Model</label>
                                    <input id="model" value="{{ $model }}" name="model" type="text"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="short_desc" class="control-label "> Short Desc</label>
                                    <textarea id="short_desc" name="short_desc" type="text" class="tinymce-editor" aria-required="true"
                                        aria-invalid="false" required>{{ $short_desc }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="desc" class="control-label "> Desc</label>
                                    <textarea id="desc" name="desc" type="text" class="tinymce-editor" aria-required="true"
                                        aria-invalid="false" required>{{ $desc }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="keywords" class="control-label "> Keywords</label>
                                    <textarea id="keywords" name="keywords" type="text" class="tinymce-editor" aria-required="true"
                                        aria-invalid="false" required>{{ $keywords }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="technical_specification" class="control-label "> Technical
                                        Specification</label>
                                    <textarea id="technical_specification" name="technical_specification" type="text" class="tinymce-editor"
                                        required>{{ $technical_specification }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="uses" class="control-label "> Uses</label>
                                    <textarea id="uses" name="uses" type="text" class="tinymce-editor" aria-required="true"
                                        aria-invalid="false" required>{{ $uses }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="warranty" class="control-label "> Warranty</label>
                                    <textarea id="warranty" name="warranty" type="text" class="tinymce-editor" aria-required="true"
                                        aria-invalid="false" required>{{ $warranty }}</textarea>
                                </div>
                                <div class="col-md-8">
                                    <label for="model" class="control-label "> Lead
                                        Time</label>
                                    <input id="lead_time" value="{{ $lead_time }}" name="lead_time" type="text"
                                        class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="model" class="control-label "> Tax</label>
                                    <select id="tax_id" name="tax_id" class="form-select">
                                        <option value="">Select Tax</option>
                                        @foreach ($taxes as $list)
                                            @if ($tax_id == $list->id)
                                                <option selected value="{{ $list->id }}">
                                                @else
                                                <option value="{{ $list->id }}">
                                            @endif
                                            {{ $list->tax_desc }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-3">
                                    <label for="model" class="control-label "> IS Promo
                                    </label>
                                    <select id="is_promo" name="is_promo" class="form-select" required>
                                        @if ($is_promo == '1')
                                            <option value="1" selected>Yes</option>
                                            <option value="0">No</option>
                                        @else
                                            <option value="1">Yes</option>
                                            <option value="0" selected>No</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="model" class="control-label "> IS Featured
                                    </label>
                                    <select id="is_featured" name="is_featured" class="form-select" required>
                                        @if ($is_featured == '1')
                                            <option value="1" selected>Yes</option>
                                            <option value="0">No</option>
                                        @else
                                            <option value="1">Yes</option>
                                            <option value="0" selected>No</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="model" class="control-label "> IS Tranding
                                    </label>
                                    <select id="is_tranding" name="is_tranding" class="form-select" required>
                                        @if ($is_tranding == '1')
                                            <option value="1" selected>Yes</option>
                                            <option value="0">No</option>
                                        @else
                                            <option value="1">Yes</option>
                                            <option value="0" selected>No</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="model" class="control-label "> IS Discounted
                                    </label>
                                    <select id="is_discounted" name="is_discounted" class="form-select" required>
                                        @if ($is_discounted == '1')
                                            <option value="1" selected>Yes</option>
                                            <option value="0">No</option>
                                        @else
                                            <option value="1">Yes</option>
                                            <option value="0" selected>No</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Product Images</h5>
                            <div class="col-md-12">
                                <div class="row" id="product_images_box">
                                    @php
                                        $loop_count_num = 1;
                                    @endphp
                                    @foreach ($productImagesArr as $key => $val)
                                        @php
                                            $loop_count_prev = $loop_count_num;
                                            $pIArr = (array) $val;
                                        @endphp
                                        <input id="piid" type="hidden" name="piid[]"
                                            value="{{ $pIArr['id'] }}">
                                        <div class="col-md-4 product_images_{{ $loop_count_num }}">
                                            <label for="images" class="control-label"> Image (250px * 300px)</label>
                                            <input id="images" name="images[]" type="file" class="form-control">

                                            @if ($pIArr['images'] != '')
                                                <a href="{{ asset('storage/media/product_images/' . $pIArr['images']) }}"
                                                    target="_blank">
                                                    <img width="50px"
                                                        src="{{ asset('storage/media/product_images/' . $pIArr['images']) }}" />
                                                </a>
                                            @endif
                                        </div>

                                        <div class="col-md-2">
                                            <label for="images" class="control-label mb-1">&nbsp;</label>

                                            @if ($loop_count_num == 1)
                                                <button type="button" class="btn btn-success btn-sm"
                                                    onclick="add_image_more()" style="margin-top: 30px;">
                                                    <i class="bi bi-plus-circle"></i>&nbsp; Add
                                                </button>
                                            @else
                                                <a
                                                    href="{{ url('admin/product/product_images_delete/') }}/{{ $pIArr['id'] }}/{{ $id }}">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        style="margin-top: 30px;">
                                                        <i class="bx bxs-minus-circle"></i>&nbsp; Remove
                                                    </button>
                                                </a>
                                            @endif
                                        </div>
                                        @php
                                            $loop_count_num++;
                                        @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" id="product_attr_box">
                        @php
                            $loop_count_num = 1;
                        @endphp
                        @foreach ($productAttrArr as $key => $val)
                            @php
                                $loop_count_prev = $loop_count_num;
                                $pAArr = (array) $val;
                            @endphp
                            <input id="paid" type="hidden" name="paid[]" value="{{ $pAArr['id'] }}">
                            <div id="product_attr_{{ $loop_count_num++ }}">
                                <div class="card-body">
                                    <h5 class="card-title">Product Images</h5>
                                    <div class="row g-3">
                                        <!-- SKU -->
                                        <div class="col-md-2">
                                            <label for="sku" class="control-label mb-1">SKU</label>
                                            <input id="sku" name="sku[]" type="text" class="form-control"
                                                value="{{ $pAArr['sku'] }}" required>
                                        </div>
                                        <!-- MRP -->
                                        <div class="col-md-2">
                                            <label for="mrp" class="control-label mb-1">MRP</label>
                                            <input id="mrp" name="mrp[]" type="text" class="form-control"
                                                value="{{ $pAArr['mrp'] }}" required>
                                        </div>
                                        <!-- Price -->
                                        <div class="col-md-2">
                                            <label for="price" class="control-label mb-1">Price</label>
                                            <input id="price" name="price[]" type="text" class="form-control"
                                                value="{{ $pAArr['price'] }}" required>
                                        </div>
                                        <!-- Size -->
                                        <div class="col-md-3">
                                            <label for="size_id" class="control-label mb-1">Size</label>
                                            <select id="size_id" name="size_id[]" class="form-select">
                                                <option value="">Select</option>
                                                @foreach ($sizes as $list)
                                                    <option value="{{ $list->id }}"
                                                        {{ $pAArr['size_id'] == $list->id ? 'selected' : '' }}>
                                                        {{ $list->size }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Color -->
                                        <div class="col-md-3">
                                            <label for="color_id" class="control-label mb-1">Color</label>
                                            <select id="color_id" name="color_id[]" class="form-select">
                                                <option value="">Select</option>
                                                @foreach ($colors as $list)
                                                    <option value="{{ $list->id }}"
                                                        {{ $pAArr['color_id'] == $list->id ? 'selected' : '' }}>
                                                        {{ $list->color }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Quantity -->
                                        <div class="col-md-2">
                                            <label for="qty" class="control-label mb-1">Qty</label>
                                            <input id="qty" name="qty[]" type="text" class="form-control"
                                                value="{{ $pAArr['qty'] }}" required>
                                        </div>
                                        <!-- Image -->
                                        <div class="col-md-4">
                                            <label for="attr_image" class="control-label mb-1">Image (250px *
                                                300px)</label>
                                            <input id="attr_image" name="attr_image[]" type="file"
                                                class="form-control">
                                            @if ($pAArr['attr_image'] != '')
                                                <img width="50px"
                                                    src="{{ asset('storage/media/product_attr/' . $pAArr['attr_image']) }}" />
                                            @endif
                                        </div>
                                        <!-- Add/Remove Button -->
                                        <div class="col-md-2">
                                            <label class="control-label mb-1">&nbsp;</label>
                                            @if ($loop_count_num == 2)
                                                <button type="button" class="btn btn-success btn-sm"
                                                    onclick="add_more()" style="margin-top:30px;">
                                                    <i class="bi bi-plus-circle"></i>&nbsp; Add
                                                </button>
                                            @else
                                                <a
                                                    href="{{ url('admin/product/product_attr_delete/') }}/{{ $pAArr['id'] }}/{{ $id }}">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        style="margin-top:30px;">
                                                        <i class="bx bxs-minus-circle"></i>&nbsp; Remove
                                                    </button>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <input type="submit" class="btn btn-primary">

                </form>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var loop_image_count = 1; // Keep track of current count

        function add_image_more() {
            loop_image_count++;
            var html = `
                <div class="col-md-4 product_images_${loop_image_count}">
                    <label for="images" class="control-label"> Image</label>
                    <input id="images" name="images[]" type="file" class="form-control" required>
                </div>
                <div class="col-md-2 product_images_${loop_image_count}">
                    <label for="images" class="control-label mb-1">&nbsp;</label>
                    <button type="button" class="btn btn-danger btn-sm" onclick="remove_image_more(${loop_image_count})" style="margin-top: 30px;">
                        <i class="bx bxs-minus-circle"></i>&nbsp; Remove
                    </button>
                </div>`;
            jQuery('#product_images_box').append(html);
        }

        function remove_image_more(loop_image_count) {
            jQuery('.product_images_' + loop_image_count).remove();
        }
    </script>
    <script>
        var loop_count = 1;

        function add_more() {
            loop_count++;
            var html = '<input id="paid" type="hidden" name="paid[]" ><div id="product_attr_' + loop_count +
                '"><div class="card-body"><div class="row g-3">';

            html +=
                '<div class="col-md-2"><label for="sku" class="control-label mb-1"> SKU</label><input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

            html +=
                '<div class="col-md-2"><label for="mrp" class="control-label mb-1"> MRP</label><input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

            html +=
                '<div class="col-md-2"><label for="price" class="control-label mb-1"> Price</label><input id="price" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

            var size_id_html = jQuery('#size_id').html();
            size_id_html = size_id_html.replace("selected", "");
            html +=
                '<div class="col-md-3"><label for="size_id" class="control-label mb-1"> Size</label><select id="size_id" name="size_id[]" class="form-control">' +
                size_id_html + '</select></div>';

            var color_id_html = jQuery('#color_id').html();
            color_id_html = color_id_html.replace("selected", "");
            html +=
                '<div class="col-md-3"><label for="color_id" class="control-label mb-1"> Color</label><select id="color_id" name="color_id[]" class="form-control" >' +
                color_id_html + '</select></div>';

            html +=
                '<div class="col-md-2"><label for="qty" class="control-label mb-1"> Qty</label><input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

            html +=
                '<div class="col-md-4"><label for="attr_image" class="control-label mb-1"> Image</label><input id="attr_image" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false" ></div>';

            html +=
                '<div class="col-md-2"><label for="attr_image" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;</label><button type="button" class="btn btn-danger btn-sm" style="margin-top:30px;" onclick=remove_more("' +
                loop_count + '")><i class="bx bxs-minus-circle"></i>&nbsp; Remove</button></div>';

            html += '</div></div></div>';

            jQuery('#product_attr_box').append(html)
        }

        function remove_more(loop_count) {
            jQuery('#product_attr_' + loop_count).remove();
        }
    </script>
@endsection
