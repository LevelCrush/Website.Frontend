@props(['page'])

@extends('layouts.standard')

@section('title', $page->title)

@section('content')
    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
@endsection
