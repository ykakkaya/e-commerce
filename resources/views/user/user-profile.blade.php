@extends('user.layouts.master')
@section('user_content')
    <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
        <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> profile</h3>
            <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                    <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-9">
                                <div class="row">
                                    <div class="col-xl-12 ">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fas fa-user-tie"></i>
                                            <input type="text" name='name' value="{{ $user->name }}"
                                                placeholder="First Name">
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__dash_pro_single">
                                            <i class="far fa-phone-alt"></i>
                                            <input type="text" name="phone" value="{{ $user->phone }}"
                                                placeholder="Phone">
                                        </div>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fal fa-envelope-open"></i>
                                            <input type="email" name="email" value="{{ $user->email }}"
                                                placeholder="Email">
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12 col-md-12">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fas fa-unlock-alt"></i>
                                            <input type="password" name = "password"
                                                placeholder="Şifre Değiştirmek istemiyorsanız Boş Bırakınız">
                                        </div>
                                    </div>
                                    {{-- <div class="col-xl-12">
                                        <div id="medicine_row3">
                                            <div class="row">
                                                <div class="col-xl-5 col-md-5">
                                                    <div class="medicine_row_input">
                                                        <input type="text" placeholder="www.facebook.com" name="name[]">
                                                    </div>
                                                </div>
                                                <div class="col-xl-5 col-md-5">
                                                    <div class="medicine_row_input">
                                                        <input type="text" placeholder="www.youtube.com" name="name[]">
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 col-md-2">
                                                    <div class="medicine_row_input">
                                                        <button type="button" id="add_row3"><i class="fas fa-plus"
                                                                aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-md-6">
                                <div class="wsus__dash_pro_img">
                                    <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('nophoto.png') }}"
                                        alt="img" class="img-fluid w-100" id="showImage">
                                    <input type="file" name="image" id="image" />
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <button class="common_btn mb-4 mt-2" type="submit">Güncelle</button>
                            </div>
                            {{-- <div class="wsus__dash_pass_change mt-2">
                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fas fa-unlock-alt"></i>
                                            <input type="password" placeholder="Şifreniz">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fas fa-lock-alt"></i>
                                            <input type="password" placeholder="Yeni Şifreniz">
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fas fa-lock-alt"></i>
                                            <input type="password" placeholder="Yeni Şifrenizi Tekrar Giriniz">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <button class="common_btn" type="submit">Güncelle</button>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('bodyDown')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection

