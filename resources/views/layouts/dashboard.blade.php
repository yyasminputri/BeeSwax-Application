@extends('layouts.admin')

@section('content')
    <!-- Topbar -->
    @include('partials.topbar')

    <!-- Main Content -->
    <div class="main-content">
        @yield('dashboard-content')
    </div>
@endsection