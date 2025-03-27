@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('meta_tags')
    {{-- <meta http-equiv="x-ua-compatible" content="ie=edge"> --}}
    {!! SEO::generate() !!}
@endsection
@section('content')
    <main>
        <!-- Start Hero Section -->
        <x-start-hero-section></x-start-hero-section>
        <!-- Start Hero Section -->
        <!-- Start Porfolio Section -->
        <section>
            <div class="cs_height_150 cs_height_lg_80"></div>
            @livewire('user.portfolios')
            <div class="cs_height_150 cs_height_lg_80"></div>
        </section>
        <!-- End Porfolio Section -->
    </main>
@endsection

