@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('meta_tags')
    {{-- <meta http-equiv="x-ua-compatible" content="ie=edge"> --}}
    {!! SEO::generate() !!}
@endsection
@section('content')
    @php
        $ifHaveBlog = \App\Models\Post::where('visibility', '1')->exists();
    @endphp
    @include('front.pages.index-section.hero')
    @include('front.pages.index-section.about')
    @include('front.pages.index-section.portfolio')
    @include('front.pages.index-section.fun-fact')
    @if ($ifHaveBlog)
        @include('front.pages.index-section.blog')
    @endif
    @include('front.pages.index-section.testimonial')
    @include('front.pages.index-section.brand')
@endsection
