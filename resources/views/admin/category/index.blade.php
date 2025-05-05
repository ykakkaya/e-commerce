@extends('admin.layouts.master')

@section('admin_content')
    <section class="section">
        <div class="section-header d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Kategoriler</h1>
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                + Yeni Kategori Ekle
            </a>
        </div>
        <div class="section-body">
            <div class="card ">
                <div class="card-body">
                    <table id="myTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>SıraNo</th>
                                <th>Icon</th>
                                <th>Kategori Adı</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                                <tr>
                                    <td style="width: 5px;">{{ $key + 1 }}</td>

                                    <td><i class="{{ $item->icon }}"style="font-size: 24px;" ></i></td>

                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <span class="badge {{ $item->status ? 'bg-info' : 'bg-secondary' }}">
                                            {{ $item->status ? 'Aktif' : 'Pasif' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.category.edit', $item->id) }}"><svg
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
                                        <a href="{{ route('admin.category.destroy', $item->id) }}" id='delete'><svg
                                                class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="red" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
