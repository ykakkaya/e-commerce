@extends('admin.layouts.master')

@section('admin_content')
    <section class="section">
        <div class="section-header">
            <h1>Marka Ekleme</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Marka Ekleme</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Marka Adı</label>
                                    <input type="text" class="form-control" name="name" value="{{$brand->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Marka Logo</label>
                                        <input type="file" class="form-control" name="image" id="image">

                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <img src="{{$brand->image ? asset('storage/'.$brand->image) : asset('nophoto.png') }}" alt="Marka Logo" class="img-fluid" id="showImage"
                                        style="width: 200px; height: 100px;">

                                    <div class="form-group ">
                                        <label>Marka Öne Çıkan</label>
                                        <select class="form-select" name="is_featured">
                                            <option {{$brand->is_featured == 1 ? 'selected' : ''}} value="1">Evet</option>
                                            <option {{$brand->is_featured == 0 ? 'selected' : ''}} value="0">Hayır</option>
                                        </select>
                                        @error('is_featured')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group ">
                                        <label>Kategori Durumu</label>
                                        <select class="form-select" name="status">
                                            <option {{$brand->status == 1 ? 'selected' : ''}} value="1">Aktif</option>
                                            <option {{$brand->status == 0 ? 'selected' : ''}} value="0">Pasif</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

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

