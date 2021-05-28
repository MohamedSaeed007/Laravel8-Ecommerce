@extends('admin.layouts.master')
@section('title')
    {{ __('site.' . $title) }}
@endsection
@section('styles')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <!-- END: Vendor CSS-->
@endsection
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{ __('site.' . $title) }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.dashboard') }}">{{ __('site.home') }}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="">{{ __('site.roles') }}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Basic table -->
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="datatables-basic table">
                            <thead>
                                <tr>
                                    <th>{{ __('site.id') }}</th>
                                    <th>{{ __('site.name') }}</th>
                                    <th>{{ __('site.guard') }}</th>
                                    <th>{{ __('site.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $index => $role)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->guard_name }}</td>
                                        <td>
                                            <a data-id="{{ $role->id }}"
                                                class="edit btn btn-primary"><i data-feather='edit'></i> {{ __('site.edit') }}</a>
                                            <a data-id="{{ $role->id }}"
                                                class="delete btn btn-danger"><i data-feather='trash-2'></i> {{ __('site.delete') }}</a>
                                            <a href="{{ route('admin.roles.assign',$role->id) }}"
                                                class="btn btn-success"><i data-feather='link'></i> {{ __('site.assign permissions') }}</a>
                                            <form id="deleteForm{{ $role->id }}"
                                                action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal to add new record -->
            <div class="modal modal-slide-in fade" id="modal">
                <div class="modal-dialog sidebar-sm">
                    <form class="add-new-record modal-content pt-0" action="{{ route('admin.roles.store') }}"
                        method="POST">
                        @csrf
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="modal-title">{{ __('site.create') }}</h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <input id="record-id" type="hidden" name="id">
                            <div class="form-group">
                                <label class="form-label"
                                    for="basic-icon-default-fullname">{{ __('site.role name') }}</label>
                                <input type="text" class="form-control dt-full-name" name="name" id="record-name"
                                    placeholder="John Doe" aria-label="John Doe" />
                            </div>

                            <button id="modal-form-submit" type="submit"
                                class="btn btn-primary data-submit mr-1">{{ __('site.create') }}</button>
                            <button type="reset" class="btn btn-outline-secondary"
                                data-dismiss="modal">{{ __('site.cancel') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--/ Basic table -->
    </div>
@endsection
@section('scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('adminpanel') }}/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="{{ asset('adminpanel') }}/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="{{ asset('adminpanel') }}/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="{{ asset('adminpanel') }}/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
    <script src="{{ asset('adminpanel') }}/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="{{ asset('adminpanel') }}/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="{{ asset('adminpanel') }}/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="{{ asset('adminpanel') }}/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="{{ asset('adminpanel') }}/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="{{ asset('adminpanel') }}/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="{{ asset('adminpanel') }}/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="{{ asset('adminpanel') }}/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <!-- END: Page Vendor JS-->

    <script>
        // Get record to edit and assign data to modal
        $('.edit').on('click', function() {
            const id = $(this).data('id');
            $.get("roles/" + id + "/edit", function(data) {
                $('#modal-title').text("{{ __('site.update') }}");
                $('#modal-form-submit').text("{{ __('site.update') }}");
                $('#record-id').val(data.id);
                $('#record-name').val(data.name);
                $('#modal').modal('show');
            });
        });
        // Restore modal to original state when close
        $('#modal').on('hidden.bs.modal', function() {
            $('#modal-title').text("{{ __('site.create') }}");
            $('#modal-form-submit').text("{{ __('site.create') }}");
            $('#record-id').val("");
            $('#record-name').val("");
        });
        // delete record
        $('.delete').on('click', function(e) {
            e.preventDefault();
            const id = $(this).data('id');
            const form = $('#deleteForm' + id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
        // datatable code
        $(function() {
            'use strict';
            $('.datatables-basic').DataTable({
                dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 10,
                lengthMenu: [10, 25, 50, 75, 100],
                buttons: [{
                        extend: 'collection',
                        className: 'btn btn-outline-secondary dropdown-toggle mr-2',
                        text: feather.icons['share'].toSvg({
                            class: 'font-small-4 mr-50'
                        }) + "{{ __('site.export') }}",
                        buttons: [{
                                extend: 'print',
                                text: feather.icons['printer'].toSvg({
                                    class: 'font-small-4 mr-50'
                                }) + "{{ __('site.print') }}",
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [0, 1, 2]
                                }
                            },
                            {
                                extend: 'csv',
                                text: feather.icons['file-text'].toSvg({
                                    class: 'font-small-4 mr-50'
                                }) + "{{ __('site.csv') }}",
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [0, 1, 2]
                                }
                            },
                            {
                                extend: 'excel',
                                text: feather.icons['file'].toSvg({
                                    class: 'font-small-4 mr-50'
                                }) + "{{ __('site.excel') }}",
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [0, 1, 2]
                                }
                            },
                            {
                                extend: 'pdf',
                                text: feather.icons['clipboard'].toSvg({
                                    class: 'font-small-4 mr-50'
                                }) + "{{ __('site.pdf') }}",
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [0, 1, 2]
                                }
                            },
                            {
                                extend: 'copy',
                                text: feather.icons['copy'].toSvg({
                                    class: 'font-small-4 mr-50'
                                }) + "{{ __('site.copy') }}",
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [0, 1, 2]
                                }
                            }
                        ],
                        init: function(api, node, config) {
                            $(node).removeClass('btn-secondary');
                            $(node).parent().removeClass('btn-group');
                            setTimeout(function() {
                                $(node).closest('.dt-buttons').removeClass('btn-group')
                                    .addClass('d-inline-flex');
                            }, 50);
                        }
                    },
                    {
                        text: feather.icons['plus'].toSvg({
                            class: 'mr-50 font-small-4'
                        }) + "{{ __('site.add') }}",
                        className: 'create-new btn btn-primary',
                        attr: {
                            'data-toggle': 'modal',
                            'data-target': '#modal'
                        },
                        init: function(api, node, config) {
                            $(node).removeClass('btn-secondary');
                        }
                    }
                ],
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(row) {
                                var data = row.data();
                                return 'Details of ' + data['full_name'];
                            }
                        }),
                        type: 'column',
                        renderer: function(api, rowIdx, columns) {
                            var data = $.map(columns, function(col, i) {
                                console.log(columns);
                                return col.title !==
                                    '' // ? Do not show row in modal popup if title is blank (for check box)
                                    ?
                                    '<tr data-dt-row="' +
                                    col.rowIndex +
                                    '" data-dt-column="' +
                                    col.columnIndex +
                                    '">' +
                                    '<td>' +
                                    col.title +
                                    ':' +
                                    '</td> ' +
                                    '<td>' +
                                    col.data +
                                    '</td>' +
                                    '</tr>' :
                                    '';
                            }).join('');

                            return data ? $('<table class="table"/>').append(data) : false;
                        }
                    }
                },
                language: {
                    paginate: {
                        // remove previous & next text from pagination
                        previous: '&nbsp;',
                        next: '&nbsp;'

                    },
                    search: "{{ __('site.search') }} :",
                    lengthMenu: "{{ __('site.Show _MENU_ entries') }}",
                    info: "{{ __('site.Showing _START_ to _END_ of _TOTAL_ entries') }}",
                    infoEmpty: "{{ __('site.Showing 0 to 0 of 0 entries') }}",
                }
            });
            $('div.head-label').html('<h4 class="mb-0">' + "{{ __('site.' . $title) }}" + '</h4>');
        });

    </script>
@endsection
