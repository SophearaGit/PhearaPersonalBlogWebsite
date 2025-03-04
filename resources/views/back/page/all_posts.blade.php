@extends('back.layout.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Posts</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            List
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{ route('admin.add_post') }}" class="btn btn-primary">
                    <i class="icon-copy bi bi-plus-circle"></i> Add post</a>
            </div>
        </div>
    </div>
    @livewire('admin.posts')
@endsection
@push('scripts')
    <script>
        window.addEventListener('deletePost', function(e) {
            var id = e.detail[0].id;
            $().konfirma({
                title: 'Are you sure?',
                html: 'You want to delete this post.',
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, I am sure.',
                cancelButtonColor: '#FF0000',
                confirmButtonColor: '#3085d6',
                width: 400,
                allowOutsideClick: false,
                fontSize: '1rem',
                done: function() {
                    Livewire.dispatch('deletePostAction', [id]);
                }
            });
        });
    </script>
@endpush
