@extends('layouts.standard')



@section('content')
    @vite(['resources/js/dashboard.js'])
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 border-end-md border-bottom border-bottom-md-0">
                <div class="container">
                    <h2>Dashboard menu</h2>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="container">
                    @yield('dashboard')
                </div>
            </div>
        </div>
  </div>
@stop
