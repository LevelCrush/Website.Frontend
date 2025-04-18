@extends('layouts.standard')

@section('title', 'Home | Level Crush')

@section('content')
    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
@stop
