<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">e-commerce</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">YK</a>
        </div>
        <ul class="sidebar-menu">
            {{-- Kategori Yönetimi --}}
            <li
                class="dropdown {{ isActiveRoute(['admin.category.*', 'admin.sub_category.*', 'admin.child_category.*']) }}">
                <a href="#" class="nav-link has-dropdown"><svg class="w-6 h-6 text-gray-800 dark:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5v14m8-7h-2m0 0h-2m2 0v2m0-2v-2M3 11h6m-6 4h6m11 4H4c-.55228 0-1-.4477-1-1V6c0-.55228.44772-1 1-1h16c.5523 0 1 .44772 1 1v12c0 .5523-.4477 1-1 1Z" />
                    </svg>
                    <span>Kategori Yönetimi</span></a>
                <ul class="dropdown-menu">
                    <li class={{ isActiveRoute(['admin.category.*']) }}><a class="nav-link"
                            href="{{ route('admin.category.index') }}">Kategori
                            Yönetimi</a></li>
                    <li class={{ isActiveRoute(['admin.sub_category.*']) }}>
                        <a class="nav-link" href="{{ route('admin.sub_category.index') }}">Alt Kategori
                            Yönetimi</a>
                    </li>
                    <li class={{ isActiveRoute(['admin.child_category.*']) }}>
                        <a class="nav-link" href="{{ route('admin.child_category.index') }}">Child Kategori
                            Yönetimi</a>
                    </li>
                </ul>
            </li>
            {{-- Product Bileşenleri Yönetimi --}}
            <li class="dropdown {{ isActiveRoute(['admin.brands.*']) }}">
                <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><svg
                        class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M2.9917 4.9834V18.917M9.96265 4.9834V18.917M15.9378 4.9834V18.917m2.9875-13.9336V18.917" />
                        <path stroke="currentColor" stroke-linecap="round"
                            d="M5.47925 4.4834V19.417m1.9917-14.9336V19.417M21.4129 4.4834V19.417M13.4461 4.4834V19.417" />
                    </svg>


                    <span>Ürün Özellikler</span></a>
                <ul class="dropdown-menu">
                    <li class={{ isActiveRoute(['admin.brands.*']) }}><a class="nav-link "
                            href="{{ route('admin.brands.index') }}">Markalar</a></li>
                    <li class={{ isActiveRoute(['admin.products.*']) }}><a class="nav-link "
                            href="{{ route('admin.products.index') }}">Ürünler</a></li>
                </ul>
            </li>
            {{-- Site Yönetimi --}}
            <li class="dropdown {{ isActiveRoute(['admin.slider.*']) }}">
                <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8.737 8.737a21.49 21.49 0 0 1 3.308-2.724m0 0c3.063-2.026 5.99-2.641 7.331-1.3 1.827 1.828.026 6.591-4.023 10.64-4.049 4.049-8.812 5.85-10.64 4.023-1.33-1.33-.736-4.218 1.249-7.253m6.083-6.11c-3.063-2.026-5.99-2.641-7.331-1.3-1.827 1.828-.026 6.591 4.023 10.64m3.308-9.34a21.497 21.497 0 0 1 3.308 2.724m2.775 3.386c1.985 3.035 2.579 5.923 1.248 7.253-1.336 1.337-4.245.732-7.295-1.275M14 12a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                  </svg>


                    <span>Site Yönetimi</span></a>
                <ul class="dropdown-menu">
                    <li class={{ isActiveRoute(['admin.slider.*']) }}><a class="nav-link "
                            href="{{ route('admin.slider.index') }}">Slider</a></li>

                </ul>
            </li>



        </ul>

        {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}
    </aside>
</div>
