@extends('admin.layouts.master')
@section('title')
    {{ __('site.' . $title) }}
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel') }}/app-assets/css-rtl/pages/app-user.css">
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
                            <li class="breadcrumb-item"><a href="">{{ __('site.assign permissions') }}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- users edit start -->
        <section class="app-user-edit">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <!-- users edit account form start -->
                        @php
                            $models = [];
                            $cruds = ['Create', 'Read', 'Update', 'Delete', 'Manage'];
                            foreach ($permissions as $permisson) {
                                $permissionNameArr = explode(' ', $permisson->name);
                                array_push($models, $permissionNameArr[1]);
                                $models = array_unique($models);
                            }
                            
                        @endphp

                        <form action="{{ route('admin.roles.assign.post', $role->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive border rounded mt-1">
                                        <h6 class="py-1 mx-1 mb-0 font-medium-2">
                                            <i data-feather="lock" class="font-medium-3 mr-25"></i>
                                            <span class="align-middle">{{ __('site.permissions') }}</span>
                                        </h6>
                                        <table class="table table-striped table-borderless">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>{{ __('site.module') }}</th>
                                                    <th>{{ __('site.create') }}</th>
                                                    <th>{{ __('site.read') }}</th>
                                                    <th>{{ __('site.update') }}</th>
                                                    <th>{{ __('site.delete') }}</th>
                                                    <th>{{ __('site.manage') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($models as $model)
                                                    <tr>
                                                        <td>{{ $model }}</td>
                                                        @foreach ($cruds as $crud)
                                                            @if ($permissions->contains('name', $crud . ' ' . $model))
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="{{ $model }}-{{ $crud }}"
                                                                            name="permissions[]"
                                                                            value="{{ $crud }} {{ $model }}"
                                                                            {{ $role->hasPermissionTo($crud . ' ' . $model) ? 'checked' : '' }} />
                                                                        <label class="custom-control-label"
                                                                            for="{{ $model }}-{{ $crud }}"></label>
                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    N/A
                                                                </td>
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                    <button type="submit"
                                        class="btn btn-success mb-1 mb-sm-0 mr-0 mr-sm-1">{{ __('site.save') }}
                                    </button>
                                    <button id="checkAll" type="button" class="btn btn-outline-primary  mb-1 mb-sm-0 mr-0 mr-sm-1">{{ __('site.select all') }}</button>
                                    <button id="unCheckAll" type="button" class="btn btn-outline-danger  mb-1 mb-sm-0 mr-0 mr-sm-1">{{ __('site.unselect all') }}</button>
                                </div>
                            </div>
                        </form>
                        <!-- users edit account form ends -->
                    </div>
                </div>
            </div>
        </section>
        <!-- users edit ends -->
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('adminpanel') }}/app-assets/js/scripts/pages/app-user-edit.js"></script>
    <script src="{{ asset('adminpanel') }}/app-assets/js/scripts/components/components-navs.js"></script>
    <script>
        $("#checkAll").click(function() {
            $('input:checkbox').attr('checked', 'checked');
        });
        $("#unCheckAll").click(function() {
            $('input:checkbox').removeAttr('checked');
        });

    </script>
@endsection
