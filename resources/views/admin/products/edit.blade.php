@extends('admin.layouts.master')
@section('admin_content')
    <section class="section">
        <div class="section-header">
            <h1>Ürün Düzenle</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Ürün Adı</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $product->name) }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputState">Kategori</label>
                                            <select id="inputState" class="form-select" name="category_id">
                                                <option value="">Kategori Seçiniz</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputState">Alt Kategori</label>
                                            <select id="inputState" class="form-select" name="sub_category_id">
                                                @foreach ($subCategories as $subCategory)
                                                    <option value="{{ $subCategory->id }}"
                                                        {{ $product->sub_category_id == $subCategory->id ? 'selected' : '' }}>
                                                        {{ $subCategory->name }}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                        @error('sub_category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputState">Child Kategori</label>
                                            <select id="inputState" class="form-select" name="child_category_id">
                                                @foreach ($childCategories as $childCategory)
                                                    <option value="{{ $childCategory->id }}"
                                                        {{ $product->child_category_id == $childCategory->id ? 'selected' : '' }}>
                                                        {{ $childCategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('child_category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Ürün Resmi (400x400)</label>
                                        <input type="file" class="form-control" name="image" id="image">

                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <img src="{{ $product->thumb_image ? asset('storage/' . $product->thumb_image) : asset('nophoto.png') }}"
                                        alt="Marka Logo" class="img-fluid" id="showImage"
                                        style="width: 100px; height: 100px;">

                                </div>



                                <div class="form-group ">
                                    <label for="inputState">Marka</label>
                                    <select id="inputState" class="form-select" name="brand_id">
                                        <option value="">Marka Seçiniz</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" name="sku"
                                        value="{{ old('sku', $product->sku) }}">
                                    @error('sku')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Fiyat</label>
                                    <input type="text" class="form-control" name="price"
                                        value="{{ old('price', $product->price) }}">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>İndirimli Fiyat</label>
                                    <input type="text" class="form-control" name="offer_price"
                                        value="{{ old('offer_price', $product->offer_price) }}">
                                    @error('offer_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>İndirim Başlangıç Tarihi</label>
                                            <input type="date" class="form-control datepicker" name="offer_start_date"
                                                value="{{ old('offer_start_date', $product->offer_start_date) }}">
                                            @error('offer_start_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>İndirim Bitiş Tarihi</label>
                                            <input type="date" class="form-control datepicker" name="offer_end_date"
                                                value="{{ old('offer_end_date', $product->offer_end_date) }}">
                                            @error('offer_end_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Stok Miktarı</label>
                                    <input type="number" min="0" class="form-control" name="qty"
                                        value="{{ old('qty', $product->qty) }}">
                                    @error('qty')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Video Link</label>
                                    <input type="text" class="form-control" name="video_link"
                                        value="{{ old('video_link', $product->video_link) }}">
                                    @error('video_link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Kısa Açıklama</label>
                                    <textarea name="short_description" class="form-control">{{ old('short_description', $product->short_description) }}</textarea>
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Uzun Açıklama</label>
                                    <textarea name="long_description" class="form-control summernote">{{ old('long_description', $product->long_description) }}</textarea>
                                    @error('long_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputState">Ürün Tipi</label>
                                    <select id="inputState" class="form-select" name="product_type">
                                        <option value="">Ürün Tipi Seçiniz</option>
                                        <option value="new_arrival"
                                            {{ $product->product_type == 'new_arrival' ? 'selected' : '' }}>Yeni Ürün
                                        </option>
                                        <option value="featured_product"
                                            {{ $product->product_type == 'featured_product' ? 'selected' : '' }}>Öne Çıkan
                                            Ürün</option>
                                        <option value="top_product"
                                            {{ $product->product_type == 'top_product' ? 'selected' : '' }}>En Çok Satan
                                            Ürün</option>
                                        <option value="best_product"
                                            {{ $product->product_type == 'best_product' ? 'selected' : '' }}>En İyi Ürün
                                        </option>
                                    </select>
                                    @error('product_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Seo Başlığı</label>
                                    <input type="text" class="form-control" name="seo_title"
                                        value="{{ old('seo_title', $product->seo_title) }}">
                                    @error('seo_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Seo Açıklaması</label>
                                    <textarea name="seo_description" class="form-control">{{ old('seo_description', $product->seo_description) }}</textarea>
                                    @error('seo_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputState">Durum</label>
                                    <select id="inputState" class="form-select" name="status">
                                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Aktif
                                        </option>
                                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Pasif
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submmit" class="btn btn-primary">Güncelle</button>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-warning">İptal</a>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@section('bodyDown')
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "/admin/subcategory/ajax/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var subCategorySelect = $('select[name="sub_category_id"]');
                            subCategorySelect.empty();
                            subCategorySelect.append('<option value="">Seçiniz</option>');
                            $.each(data, function(key, value) {
                                subCategorySelect.append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="sub_category_id"]').empty().append(
                        '<option value="">Lütfen önce kategori seçin</option>');
                }
            });
        });
        $(document).ready(function() {
            $('select[name="sub_category_id"]').on('change', function() {
                var sub_category_id = $(this).val();
                if (sub_category_id) {
                    $.ajax({
                        url: "/admin/childcategory/ajax/" + sub_category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var childCategorySelect = $('select[name="child_category_id"]');
                            childCategorySelect.empty();
                            childCategorySelect.append('<option value="">Seçiniz</option>');
                            $.each(data, function(key, value) {
                                childCategorySelect.append('<option value="' + value
                                    .id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="child_category_id"]').empty().append(
                        '<option value="">Lütfen önce alt kategori seçin</option>');
                }
            });
        });
    </script>
@endsection
