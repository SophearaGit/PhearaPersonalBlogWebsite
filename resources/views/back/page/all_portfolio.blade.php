@extends('back.layout.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@push('stylesheets')
    {{-- <link rel="stylesheet" type="text/css" href="/back/vendors/styles/core.css" /> --}}
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="/back/src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="/back/src/plugins/datatables/css/responsive.bootstrap4.min.css" />
@endpush
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Portfolios</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="http://laraablog.fi/admin/dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Lists
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{ route('admin.add_portfolio') }}" class="btn btn-primary"><i
                        class="icon-copy bi bi-patch-plus"></i>&nbsp;INSERT</a>
            </div>
        </div>
    </div>
    @livewire('admin.portfolios')
@endsection
@push('scripts')
    <script>
        window.addEventListener('deletePortfolio', function(e) {
            var id = e.detail[0].id;
            $().konfirma({
                title: 'Are you sure?',
                html: 'You want to delete this portfolio.',
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, I am sure.',
                cancelButtonColor: '#FF0000',
                confirmButtonColor: '#3085d6',
                width: 400,
                allowOutsideClick: false,
                fontSize: '1rem',
                done: function() {
                    Livewire.dispatch('deletePortfolioAction', [id]);
                }
            });
        });
    </script>

    <!-- js -->
    {{-- <script src="/back/vendors/scripts/core.js"></script> --}}
    <script src="/back/vendors/scripts/script.min.js"></script>
    <script src="/back/vendors/scripts/process.js"></script>
    <script src="/back/vendors/scripts/layout-settings.js"></script>
    <script src="/back/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/back/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="/back/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="/back/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <!-- buttons for Export datatable -->
    <script src="/back/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
    <script src="/back/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="/back/src/plugins/datatables/js/buttons.print.min.js"></script>
    <script src="/back/src/plugins/datatables/js/buttons.html5.min.js"></script>
    <script src="/back/src/plugins/datatables/js/buttons.flash.min.js"></script>
    <script src="/back/src/plugins/datatables/js/pdfmake.min.js"></script>
    <script src="/back/src/plugins/datatables/js/vfs_fonts.js"></script>
    <!-- Datatable Setting js -->
    <script src="/back/vendors/scripts/datatable-setting.js"></script>
@endpush
