@extends('layouts.standard')

@section('title', 'Auth | Level Crush')

@fluxAppearance
@section('content')
    <div class="">
        {{ $slot }}
    </div>
@endsection
@fluxScripts

