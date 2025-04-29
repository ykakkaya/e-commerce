  <div class="wsus__dashboard_menu">
    <div class="wsusd__dashboard_user">
      <img src="{{  Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('backend/assets/img/avatar/avatar-1.png') }} " alt="img" class="img-fluid">
      <p>{{ Auth::user()->name ?? 'Guest'}}</p>
    </div>
  </div>
