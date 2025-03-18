@extends('back.layout.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Add Portfolio</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Add portfolio
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{ route('admin.portfolios') }}" class="btn btn-primary">View All portfolios</a>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-30">
        <form action="{{ route('admin.create_portfolio') }}" method="POST" autocomplete="off" enctype="multipart/form-data"
            id="addPortfolioForm">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"><b>Title</b></label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" class="form-control" name="title" placeholder="Enter portfolio title">
                    <span class="text-danger error-text title_error"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"><b>Overview</b></label>
                <div class="col-sm-12 col-md-10">
                    <textarea class="form-control" name="overview" placeholder="Enter overview here"></textarea>
                    <span class="text-danger error-text overview_error"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"><b>Portfolio Feature Image</b></label>
                <div class="col-sm-12 col-md-10">
                    <input type="file" name="featured_image" class="form-control-file form-control" height="auto">
                    <span class="text-danger error-text featured_image_error"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"><b></b></label>
                <div class="col-sm-12 col-md-10" style="max-width: 250px">
                    <img src="" alt="" class="img-thumbnail" id="featured_image_preview"
                        data-ijabo-default-img="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"><b>Strategy</b></label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" class="form-control" name="strategy" placeholder="Enter strategy">
                    <span class="text-danger error-text strategy_error"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"><b>Project Type</b></label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" class="form-control" name="project_type" placeholder="Enter project type">
                    <span class="text-danger error-text project_type_error"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"><b>Client</b></label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" class="form-control" name="client" placeholder="Enter client name">
                    <span class="text-danger error-text client_error"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"><b>Content</b></label>
                <div class="col-sm-12 col-md-10">
                    <textarea name="content" id="content" cols="30" rows="10" class="ckeditor form-control"
                        placeholder="Enter project content..."></textarea>
                    <span class="text-danger error-text content_error"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"><b>Project Challenge</b></label>
                <div class="col-sm-12 col-md-10">
                    <textarea name="project_challenge" id="project_challenge" cols="30" rows="10" class="ckeditor form-control"
                        placeholder="Describe the project challenge..."></textarea>
                    <span class="text-danger error-text project_challenge_error"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"><b>Design Research</b></label>
                <div class="col-sm-12 col-md-10">
                    <textarea name="design_research" id="design_research" cols="30" rows="10" class="ckeditor form-control"
                        placeholder="Enter design research details..."></textarea>
                    <span class="text-danger error-text design_research_error"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"><b>Design Approach</b></label>
                <div class="col-sm-12 col-md-10">
                    <textarea name="design_approach" id="design_approach" cols="30" rows="10" class="ckeditor form-control"
                        placeholder="Describe the design approach..."></textarea>
                    <span class="text-danger error-text design_approach_error"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"><b>The Solution</b></label>
                <div class="col-sm-12 col-md-10">
                    <textarea name="the_solution" id="the_solution" cols="30" rows="10" class="ckeditor form-control"
                        placeholder="Explain the solution provided..."></textarea>
                    <span class="text-danger error-text the_solution_error"></span>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        $('input[type="file"][name="featured_image"]').ijaboViewer({
            preview: 'img#featured_image_preview',
            imageShape: 'rectangular',
            allowedExtensions: ['jpeg', 'jpg', 'png'],
            onErrorShape: function(message, element) {
                alert(message);
            },
            onInvalidType: function(message, element) {
                alert(message);
            },
            onSuccess: function(message, element) {

            }
        });

        // Initialize CKEditor for both textareas
        CKEDITOR.replace('content');
        CKEDITOR.replace('project_challenge');
        CKEDITOR.replace('design_research');
        CKEDITOR.replace('design_approach');
        CKEDITOR.replace('the_solution');

        $('#addPortfolioForm').on('submit', function(e) {
            e.preventDefault();
            var form = this;
            var content = CKEDITOR.instances.content.getData();
            var project_challenge = CKEDITOR.instances.project_challenge.getData();
            var design_research = CKEDITOR.instances.design_research.getData();
            var design_approach = CKEDITOR.instances.design_approach.getData();
            var the_solution = CKEDITOR.instances.the_solution.getData();
            var formdata = new FormData(form);
            formdata.append('content', content);
            formdata.append('project_challenge', project_challenge);
            formdata.append('design_research', design_research);
            formdata.append('design_approach', design_approach);
            formdata.append('the_solution', the_solution);

            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: formdata,
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 1) {
                        $(form)[0].reset();
                        CKEDITOR.instances.content.setData('');
                        CKEDITOR.instances.project_challenge.setData('');
                        CKEDITOR.instances.design_research.setData('');
                        CKEDITOR.instances.design_approach.setData('');
                        CKEDITOR.instances.the_solution.setData('');
                        $('img#featured_image_preview').attr('src', '');
                        $().notifa({
                            vers: 1,
                            CssClass: 'success',
                            html: data.message,
                            delay: 2500
                        });
                    } else {
                        $().notifa({
                            vers: 1,
                            CssClass: 'error',
                            html: data.message || 'An error occurred.',
                            delay: 2500
                        });
                    }
                },
                error: function(data) {
                    console.log(data.responseJSON.errors);
                    $.each(data.responseJSON.errors, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                }
            });
        });
    </script>
@endpush
