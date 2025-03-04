@extends('back.layout.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Settings</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Settings
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="pd-20 card-box mb-4">
        @livewire('admin.settings')
    </div>
@endsection

@push('scripts')
    <script>
        // When preview using ijabo.
        $('input[type="file"][name="site_logo"]').ijaboViewer({
            preview: 'img#preview_site_logo',
            imageShape: 'rectangular',
            allowedExtensions: ['png', 'jpg'],
            OnErrorShape: function(message, element) {
                alert(message);
            },
            OnInvalidType: function(message, element) {
                alert(message);
            },
            OnSuccess: function(message, element) {}
        });
        // When update use ajax.
        $('#updateLogoForm').submit(function(e) {
            e.preventDefault();
            var form = this;
            var inputVal = $(form).find('input[type="file"]').val();
            var errorElement = $(form).find('span.text-danger');
            errorElement.text('');
            if (inputVal.length > 0) {
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data.status == 1) {
                            $(form)[0].reset();
                            $().notifa({
                                vers: 1,
                                cssClass: 'success',
                                html: data.message,
                                delay: 3000,
                            })
                            $('img.site_logo').each(function() {
                                $(this).attr('src', '/' + data.image_path);
                            })
                        } else {
                            $().notifa({
                                vers: 1,
                                cssClass: 'error',
                                html: data.message,
                                delay: 3000,
                            })
                        }
                    },
                    // error: function(xhr, status, error) {
                    //     errorElement.text('An error occurred while updating the logo.');
                    // }
                })
            } else {
                errorElement.text('Please select a logo.');
            }
        })

        $('input[type="file"][name="site_favicon"]').ijaboViewer({
            preview: 'img#preview_site_favicon',
            imageShape: 'rectangular',
            allowedExtensions: ['png', 'jpg'],
            OnErrorShape: function(message, element) {
                alert(message);
            },
            OnInvalidType: function(message, element) {
                alert(message);
            },
            OnSuccess: function(message, element) {}
        })

        $('#updateFaviconForm').submit(function(e) {
            e.preventDefault();
            var form = this;
            var inputVal = $(form).find('input[type="file"]').val();
            var errorElement = $(form).find('span.text-danger');
            errorElement.text('');
            if (inputVal.length > 0) {
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data.status == 1) {
                            $(form)[0].reset();
                            var linkEelement = document.querySelector('link[rel="icon"]');
                            linkEelement.href = '/' + data.image_path;
                            $().notifa({
                                vers: 1,
                                cssClass: 'success',
                                html: data.message,
                                delay: 2700,
                            })
                            $('img.site_favicon').each(function() {
                                $(this).attr('src', '/' + data.image_path);
                            })
                        } else {
                            $().notifa({
                                vers: 1,
                                cssClass: 'error',
                                html: data.message,
                                delay: 2700,
                            })
                        }
                    },
                    // error: function(xhr, status, error) {
                    //     errorElement.text('An error occurred while updating the favicon.');
                    // }
                })
            } else {
                errorElement.text('Please select a favicon.');
            }
        })
    </script>
@endpush
