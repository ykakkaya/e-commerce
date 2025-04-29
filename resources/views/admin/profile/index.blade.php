@extends('admin.layouts.master')

@section('admin_content')
    <section class="section">
        <div class="section-header">
            <h1>Profil Düzenle</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Merhaba</h2>
            <p class="section-lead">
                Profil Bilgilerinizi Buradan Düzenleyebilirsiniz.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" id='showImage'
                                src="{{ $user->image ? asset('storage/' . $user->image) : asset('backend/assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle profile-widget-picture">
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ $user->name }} <div
                                    class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> {{ $user->email }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" class="needs-validation" action="{{ route('admin.profile.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Adınız</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $user->name }}" required="">
                                        <div class="invalid-feedback">
                                            Lütfen Adınızı Giriniz
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Şifreniz (Şifrenizi Değiştirmek İstemiyorsanız Bu Alanı Boş Bırakınız)
                                        </label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Email Adresiniz</label>
                                        <input type="email" class="form-control" name="email" class="form-control"
                                            value="{{ $user->email }}" required="">
                                        <div class="invalid-feedback">
                                            Lütfen E-mail Adresinizi Giriniz
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>Telefon numaranız</label>
                                        <input type="tel" name="phone" class="form-control"
                                            value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Profil Resmi</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
