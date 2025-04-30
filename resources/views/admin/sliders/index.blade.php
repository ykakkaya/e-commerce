@extends('admin.layouts.master')

@section('admin_content')
    @foreach ($sliders as $slider)
        <li>{{ $slider->title }}</li>
    @endforeach
@endsection
