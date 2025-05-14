@extends('admin.layouts.master')

@section('admin_content')
    <section class="section">
        <div class="section-header d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Ürünler</h1>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                + Yeni Ürün Ekle
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
                                <th>Ürün Adı</th>
                                <th>Marka</th>
                                <th>Kategori</th>
                                <th>Fiyat</th>
                                <th>İndirimli Fiyat</th>
                                <th>Stok</th>
                                <th>Ürün Tipi</th>
                                <th>Durum</th>
                                <th>Kaynak</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td><img src="{{ asset('storage/' . $item->thumb_image) }}" alt="Ürün Resmi"
                                            class="img-fluid" style="width: 75px; height: 75px;"></td>

                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->brand->name }}</td>
                                    <td>{{ $item->category->name }} <br>
                                        {{ $item->subCategory->name ?? '' }}<br>
                                        {{ $item->childCategory->name ?? '' }}
                                    </td>
                                    <td>{{ $item->price }} {{ $item->currency }}</td>
                                    <td>{{ $item->offer_price ? $item->offer_price : '-' }} {{ $item->currency }}<br>
                                        @if ($item->offer_price && $item->price)
                                            <span class="badge bg-danger">
                                                %{{ number_format(100 - ($item->offer_price * 100) / $item->price, 2) }}
                                                indirim
                                            </span><br>
                                            {{-- <span class="badge bg-warning">
                                                {{ $item->offer_start_date }}<br>{{ $item->offer_end_date }}
                                            </span> --}}
                                        @endif
                                    </td>

                                    <td>{{ $item->qty }}</td>
                                    <td>
                                        @switch($item->product_type)
                                            @case('new_arrival')
                                                <span class="badge bg-secondary">Yeni Ürün</span>
                                            @break

                                            @case('featured_product')
                                                <span class="badge bg-secondary">Öne Çıkan Ürün</span>
                                            @break

                                            @case('top_product')
                                                <span class="badge bg-secondary">En Çok Satan Ürün</span>
                                            @break

                                            @case('best_product')
                                                <span class="badge bg-secondary">En İyi Ürün</span>
                                            @break

                                            @default
                                                {{-- <span class="badge bg-secondary">-</span> --}}
                                        @endswitch
                                    </td>
                                    <td>
                                        <span class="badge {{ $item->status ? 'bg-info' : 'bg-secondary' }}">
                                            {{ $item->status ? 'Aktif' : 'Pasif' }}
                                        </span>
                                    </td>
                                    <td><span class="badge bg-info">{{ $item->source }}</span></td>
                                    <td>
                                        <a href="{{ route('admin.products.edit', $item->id) }}"><svg
                                                class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                                    clip-rule="evenodd" />
                                                <path fill-rule="evenodd"
                                                    d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.products.destroy', $item->id) }}" id='delete'><svg
                                                class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="red" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>

                                        <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenu{{ $item->id }}" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false" title="Detaylar">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                    d="M6 4v10m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v2m6-16v2m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v10m6-16v10m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v2" />
                                            </svg>

                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenu{{ $item->id }}">
                                            <a class="dropdown-item"
                                                href="{{ route('admin.products.product_images', $item->id) }}"><svg
                                                    class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M13 10a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H14a1 1 0 0 1-1-1Z"
                                                        clip-rule="evenodd" />
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12c0 .556-.227 1.06-.593 1.422A.999.999 0 0 1 20.5 20H4a2.002 2.002 0 0 1-2-2V6Zm6.892 12 3.833-5.356-3.99-4.322a1 1 0 0 0-1.549.097L4 12.879V6h16v9.95l-3.257-3.619a1 1 0 0 0-1.557.088L11.2 18H8.892Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Detay Resmi</a>
                                            <a class="dropdown-item" href="#"><i class="far fa-file mr-2"></i>Another
                                                action</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="far fa-clock mr-2"></i>Something else here</a>
                                        </div>





                                    </td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
