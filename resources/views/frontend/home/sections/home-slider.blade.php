<section id="wsus__banner">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__banner_content">
                    <div class="row banner_slider">
                        @if ($sliders->count() > 0)
                            @foreach ($sliders as $slider)
                                <div class="col-xl-12">
                                    <div class="wsus__single_slider"
                                        style="min-height: 400px; background: url({{ $slider->image ? asset('storage/' . $slider->image) : asset('nophoto.png') }})">
                                        <div class="wsus__single_slider_text">
                                            <h3>{{ $slider->title }}</h3>
                                            <h1>{{ $slider->sub_title }}</h1>
                                            <h6>{{ $slider->description }}</h6>
                                            @if ($slider->button_text != null )
                                                <a class="common_btn"
                                                    href="{{ $slider->button_url ?? '#' }}">{{ $slider->button_text }}</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-xl-12">
                                <div class="wsus__single_slider" style="background: url({{ asset('nophoto.png') }});">
                                    <div class="wsus__single_slider_text">
                                        <h3>Yeni Ürün </h3>
                                        <h1>Alt başlık</h1>
                                        <h6>Yeni Ürün Açıklama</h6>
                                        <a class="common_btn" href="#">shop now</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- <div class="col-xl-12">
                            <div class="wsus__single_slider" style="background: url({{ asset('frontend/images/slider_3.jpg') }});">
                                <div class="wsus__single_slider_text">
                                    <h3>new arrivals</h3>
                                    <h1>winter collection</h1>
                                    <h6>start at $99</h6>
                                    <a class="common_btn" href="#">shop now</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
