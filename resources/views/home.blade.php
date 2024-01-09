@extends('layouts.app')

@section('content')
    <div class="container">

        @if (Auth::user()->peranan == 1)
            @include('home.page_admin')
        @else
            @include('home.page_user')
        @endif

    </div>
@endsection
