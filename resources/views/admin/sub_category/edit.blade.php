@extends('admin.layouts.master')

@section('admin_content')
    <section class="section">
        <div class="section-header">
            <h1>Kategori Düzenleme </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Kategori Düzenle</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{ route('admin.sub-category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kategori Başlığı</label>
                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Kategori Durumu</label>
                                        <select class="form-select" name="status">
                                            <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Aktif
                                            </option>
                                            <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Pasif
                                            </option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Güncelle</button>
                                <a href="{{ route('admin.sub-category.index') }}" class="btn btn-warning">İptal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('bodyDown')
    <script>
        $(function() {
            $('#iconpicker').iconpicker().on('change', function(e) {
                $('#iconInput').val(e.icon);
            });
        });
    </script>
@endsection
