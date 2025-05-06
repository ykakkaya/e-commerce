@extends('admin.layouts.master')

@section('admin_content')
    <section class="section">
        <div class="section-header">
            <h1>Kategori Ekleme</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Kategori Ekleme</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{ route('admin.sub-category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kategori Başlığı</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="row">
                                        <div class="form-select col-md-6">
                                            <label>Kategori Durumu</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Aktif</option>
                                                <option value="0">Pasif</option>
                                            </select>
                                            @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <button type="submit" class="btn btn-primary">Kaydet</button>
            </form>
        </div>
    </section>
@endsection
