@extends('back.layout.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Profile</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Profile
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    @livewire('admin.profile')
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            let $uploadCrop = $('#upload-demo').croppie({
                enableExif: true,
                viewport: {
                    width: 200,
                    height: 200,
                    type: 'square',
                },
                boundary: {
                    width: 300,
                    height: 300
                }
            });

            // Handle file input change
            $('#profilePictureFile').on('change', function() {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Show the Croppie modal
                    $('#croppie-modal').show();

                    // Bind the image to Croppie
                    $uploadCrop.croppie('bind', {
                        url: e.target.result
                    });
                };

                reader.readAsDataURL(this.files[0]);
            });

            // Crop and upload the image
            $('#crop-button').on('click', function() {
                $uploadCrop.croppie('result', {
                    type: 'base64',
                    size: {
                        width: 200,
                        height: 200
                    }
                }).then(function(base64) {
                    $.ajax({
                        url: '{{ route('admin.update_profile_picture') }}',
                        type: 'POST',
                        data: JSON.stringify({
                            image: base64
                        }),
                        contentType: 'application/json',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.status === 1) {
                                $('#profilePicturePreview').attr('src',
                                    base64); // Update the profile picture preview
                                Livewire.dispatch('updateTopUserInfo', []);
                                Livewire.dispatch('updateProfile', []);
                                $().notifa({
                                    vers: 1,
                                    cssclass: 'success',
                                    html: response.message,
                                    delay: 2500
                                })
                                closeModal();
                            } else {
                                $().notifa({
                                    vers: 2,
                                    cssclass: 'errror',
                                    html: response.message,
                                    delay: 2500
                                })
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error uploading image:', error);
                            alert('Error uploading image!');
                        }
                    });
                });
            });
            window.closeModal = function() {
                $('#croppie-modal').hide();
                $('#profilePictureFile').val('');
            };
        });
    </script>
@endpush
