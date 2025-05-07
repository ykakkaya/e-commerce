@extends('admin.layouts.master')

@section('admin_content')
    <section class="section">
        <div class="section-header">
            <h1>Child Kategori Düzenleme </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Child Kategori Düzenle</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{ route('admin.child_category.update', $child_category->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Alt Kategori Başlığı</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $sub_category->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-select" name="category_id">
                                        <option value="">Seçiniz</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $sub_category->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
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

                                <button type="submit" class="btn btn-primary">Güncelle</button>
                                <a href="{{ route('admin.child_category.index') }}" class="btn btn-warning">İptal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

