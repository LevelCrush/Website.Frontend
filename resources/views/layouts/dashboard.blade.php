@extends('layouts.standard')



@section('content')
    @vite(['resources/js/dashboard.js'])
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 border-end-md border-bottom border-bottom-md-0">
                <div class="container">
                    <x-filament-menu-builder::menu slug="dashboard-navigation" view="filament-menu-builder::components.bootstrap5.menu"/>
                </div>
            </div>
            <div class="col-12 col-md">
                <div class="container">
                    @yield('dashboard')
                </div>
            </div>
        </div>
  </div>
@stop
