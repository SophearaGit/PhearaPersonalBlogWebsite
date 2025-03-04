@extends('back.layout.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')
    @livewire('admin.categories')
@endsection
@push('scripts')
    <script>
        window.addEventListener('showParentCategoryModalForm', function() {
            $('#pcategory_modal').modal('show');
            $('#pcategory_modal').on('shown.bs.modal', function() {
                $(this).removeAttr('inert');
            });

        });
        window.addEventListener('hideParentCategoryModalForm', function() {
            $('#pcategory_modal').modal('hide');
            $('#pcategory_modal').on('hidden.bs.modal', function() {
                $(this).attr('inert', ''); // Add it back when hidden
            });
        });
        window.addEventListener('showCategoryModalForm', function() {
            $('#category_modal').modal('show');
            $('#category_modal').on('shown.bs.modal', function() {
                $(this).removeAttr('inert');
            });

        });
        window.addEventListener('hideCategoryModalForm', function() {
            $('#category_modal').modal('hide');
            $('#category_modal').on('hidden.bs.modal', function() {
                $(this).attr('inert', ''); // Add it back when hidden
            });
        });
        $('table tbody#sortable_parent_categories').sortable({
            cursor: "move",
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    if ($(this).attr('data-ordering') != (index + 1)) {
                        $(this).attr('data-ordering', (index + 1)).addClass('updated');
                    }
                })
                var positions = [];
                $('.updated').each(function() {
                    positions.push([$(this).attr('data-index'), $(this).attr('data-ordering')]);
                    $(this).removeClass('updated');
                })
                // alert(positions);
                Livewire.dispatch('updateParentCategoryOrdering', [positions]);
            }
        });
        $('table tbody#sortable_categories').sortable({
            cursor: "move",
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    if ($(this).attr('data-ordering') != (index + 1)) {
                        $(this).attr('data-ordering', (index + 1)).addClass('updated');
                    }
                })
                var positions = [];
                $('.updated').each(function() {
                    positions.push([$(this).attr('data-index'), $(this).attr('data-ordering')]);
                    $(this).removeClass('updated');
                })
                // alert(positions);
                Livewire.dispatch('updateCategoryOrdering', [positions]);
            }
        });
        window.addEventListener('deleteParentCategory', function(event) {
            var id = event.detail[0].id;
            // alert(id);
            $().konfirma({
                title: 'Are you sure?',
                html: 'You want to delete this parent category.',
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, I am sure.',
                cancelButtonColor: '#FF0000',
                confirmButtonColor: '#3085d6',
                width: 400,
                allowOutsideClick: false,
                fontSize: '1rem',
                done: function() {
                    Livewire.dispatch('deleteParentCategoryAction', [id]);
                }
            });
        });
        window.addEventListener('deleteCategory', function(event) {
            var id = event.detail[0].id;
            // alert(id);
            $().konfirma({
                title: 'Are you sure?',
                html: 'You want to delete this category.',
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, I am sure.',
                cancelButtonColor: '#FF0000',
                confirmButtonColor: '#3085d6',
                width: 400,
                allowOutsideClick: false,
                fontSize: '1rem',
                done: function() {
                    Livewire.dispatch('deleteCategoryAction', [id]);
                }
            });
        });
    </script>
@endpush
