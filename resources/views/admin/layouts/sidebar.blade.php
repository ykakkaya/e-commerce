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
                        xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M6 5a2 2 0 0 1 2-2h4.157a2 2 0 0 1 1.656.879L15.249 6H19a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2v-5a3 3 0 0 0-3-3h-3.22l-1.14-1.682A3 3 0 0 0 9.157 6H6V5Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M3 9a2 2 0 0 1 2-2h4.157a2 2 0 0 1 1.656.879L12.249 10H3V9Zm0 3v7a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-7H3Z"
                            clip-rule="evenodd" />
                    </svg>

                    <span>Ürün Özellikler</span></a>
                <ul class="dropdown-menu">
                    <li class={{ isActiveRoute(['admin.brands.*']) }}><a class="nav-link "
                            href="{{ route('admin.brands.index') }}">Markalar</a></li>

                </ul>
            </li>
            {{-- Site Yönetimi --}}
            <li class="dropdown {{ isActiveRoute(['admin.slider.*']) }}">
                <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><svg
                        class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M6 5a2 2 0 0 1 2-2h4.157a2 2 0 0 1 1.656.879L15.249 6H19a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2v-5a3 3 0 0 0-3-3h-3.22l-1.14-1.682A3 3 0 0 0 9.157 6H6V5Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M3 9a2 2 0 0 1 2-2h4.157a2 2 0 0 1 1.656.879L12.249 10H3V9Zm0 3v7a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-7H3Z"
                            clip-rule="evenodd" />
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
