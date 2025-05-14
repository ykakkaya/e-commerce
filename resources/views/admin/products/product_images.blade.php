@extends('admin.layouts.master')

@section('admin_content')
    <section class="section">
        <div class="section-header d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Ürünler Detay Resmi {{ $product->name }}</h1>

        </div>
        <div class="section-body">
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <form method="POST" action="{{ route('admin.products_images.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Ürün Detay Resmi</label>
                                    <input type="file" class="form-control" name="images[]" id="image" multiple>
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6" id="preview-container"
                                    style="display: flex; gap: 10px; flex-wrap: wrap;">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Detay Resim Ekle</button>
                        </form>


                    </div>

                </div>
            </div>
            <div class="card ">
                <div class="card-body">
                    <table id="myTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>

                                <th>Ürün Resmi</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->productImageGaleries as $key => $item)
                                <tr>


                                    <td>
                                        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('nophoto.png') }}"
                                            alt="Marka Resmi" style="width:50px; height: 50px;">
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.productImages.destroy', $item->id) }}" id='delete'><svg
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
    </section>
@endsection
@section('bodyDown')
    <script>
        $(document).ready(function() {
            let fileList = [];

            $('#image').on('change', function(e) {
                const newFiles = Array.from(e.target.files);

                // Mevcut + yeni toplam 5'ten fazla ise uyar ve engelle
                if (fileList.length + newFiles.length > 5) {
                    alert("En fazla 5 resim yükleyebilirsiniz.");
                    $('#image').val(''); // input'u sıfırla
                    return;
                }

                newFiles.forEach((file, index) => {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const wrapper = $('<div>').css({
                            'position': 'relative',
                            'display': 'flex',
                            'flex-direction': 'column',
                            'align-items': 'center',
                            'margin-bottom': '10px'
                        });

                        const img = $('<img>').attr('src', e.target.result).addClass(
                            'img-thumbnail').css({
                            'width': '100px',
                            'height': '100px',
                            'object-fit': 'cover'
                        });

                        const removeBtn = $('<button>')
                            .text('Kaldır')
                            .attr('type', 'button')
                            .addClass('btn btn-sm btn-danger mt-1')
                            .css({
                                'font-size': '12px'
                            })
                            .click(function() {
                                const idx = fileList.indexOf(file);
                                if (idx > -1) fileList.splice(idx, 1);
                                wrapper.remove();
                                updateFileInput();
                            });

                        wrapper.append(img).append(removeBtn);
                        $('#preview-container').append(wrapper);
                    };

                    reader.readAsDataURL(file);
                    fileList.push(file);
                });

                updateFileInput();

                function updateFileInput() {
                    const dataTransfer = new DataTransfer();
                    fileList.forEach(file => dataTransfer.items.add(file));
                    $('#image')[0].files = dataTransfer.files;
                }
            });
        });
    </script>
@endsection
