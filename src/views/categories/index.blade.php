@extends('admin::layouts.admin')

@section('content')
    <div class="wrapper">
        <div class="row">
            <div class="md-col-12">
                <div class="panel panel--default">
                    <div class="panel__header">{{ __('Categories') }}</div>
                    <div class="panel__body">
                        <categories-add></categories-add>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table-data endpoint="{{ route('datatables.categories.index') }}" post_method="edit"></table-data>
            </div>
        </div>
    </div>
@endsection
