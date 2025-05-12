@extends('admin.layouts.master')

@section('admin_content')
    <section class="section">
        <div class="section-header">
            <h1>Child Kategori Düzenle</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Child Kategori Düzenle</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{ route('admin.child_category.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Child Kategori Başlığı</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', $item->name) }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="form-group col md-6">
                                    <label>Kategori</label>
                                    <select class="form-select" name="category_id" id="category_select">
                                        <option value="">Seçiniz</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $item->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col md-6">
                                    <label>Alt Kategori</label>
                                    <select class="form-select" name="sub_category_id" id="sub_category_select">
                                        <option value="">Seçiniz</option>
                                        @foreach ($sub_categories as $sub_category)
                                            <option value="{{ $sub_category->id }}"
                                                {{ $item->sub_category_id == $sub_category->id ? 'selected' : '' }}>
                                                {{ $sub_category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('sub_category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kategori Durumu</label>
                                <select class="form-select" name="status">
                                    <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>Pasif</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                    <a href="{{ route('admin.sub_category.index') }}" class="btn btn-warning">İptal</a>
            </form>
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
    </script>
@endsection
