@extends('admin.layouts.master')

@section('admin_content')
    <section class="section">
        <div class="section-header d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Anasayfa Slider</h1>
            <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">
                + Yeni Slider Ekle
            </a>
        </div>
        <div class="section-body">
            <div class="card ">
                <div class="card-body">
                    <table id="myTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>SıraNo</th>
                                <th>Resim</th>
                                <th>Başlık</th>
                                <th>Alt Başlık</th>
                                <th>Açıklama</th>
                                <th>Button Yazı</th>
                                <th>Button Url</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $item)
                                <tr>
                                    <td style="width: 5px;">{{ $item->serial }}</td>
                                    <td><img src='{{ $item->image ? asset('storage/' . $item->image) : asset('nophoto.png') }}'
                                            height='50'>
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->sub_title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->button_text }}</td>
                                    <td>{{ $item->button_url }}</td>
                                    <td>
                                        <span class="badge {{ $item->status ? 'bg-info' : 'bg-secondary' }}">
                                            {{ $item->status ? 'Aktif' : 'Pasif' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.slider.edit', $item->id) }}"
                                            class="btn btn-warning">Düzenle</a>
                                        <a href="{{ route('admin.slider.destroy', $item->id) }}"
                                            class="btn btn-danger">Sil</a>
                                    </td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
