@extends('admin.layouts.master')

@section('admin_content')
    <section class="section">
        <div class="section-header">
            <h1>Slider Ekleme</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Slider Ekleme</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Slider Başlığı</label>
                                    <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Açıklama</label>
                                    <input type="text" class="form-control" name="sub_title"
                                        value="{{ $slider->sub_title }}">
                                    @error('sub_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Alt Başlığı</label>
                                    <input type="text" class="form-control" name="description"
                                        value="{{ $slider->description }}">
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Button Text</label>
                                        <input type="text" class="form-control" name="button_text"
                                            value="{{ $slider->button_text }}">
                                        @error('button_text')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Button Url</label>
                                        <input type="text" class="form-control" name="button_url"
                                            value="{{ $slider->button_url }}">
                                        @error('button_url')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Slider Resmi(1300*500)</label>
                                        <input type="file" class="form-control" id="image" name="image" ">
                                                @error('image')
        <span class="text-danger">{{ $message }}</span>
    @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <image
                                                    src="{{ $slider->image ? asset('storage/' . $slider->image) : asset('nophoto.png') }}"
                                                    class="img-thumbnail" id="showImage" height="50px" width="150px">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Slider Sıralama</label>
                                                <input type="text" class="form-control" name="serial"
                                                    value="{{ $slider->serial }}">
                                                @error('serial')
        <span class="text-danger">{{ $message }}</span>
    @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Slider Durumu</label>
                                                <select class="form-control" name="status">
                                                    <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>Aktif
                                                    </option>
                                                    <option value="0" {{ $slider->status == 0 ? 'selected' : '' }}>Pasif
                                                    </option>
                                                </select>
                                                @error('status')
        <span class="text-danger">{{ $message }}</span>
    @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Güncelle</button>
                                        <a href="{{ route('admin.slider.index') }}" class="btn btn-warning">İptal</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
@endsection

