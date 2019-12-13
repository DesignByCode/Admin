@extends('admin::layouts.admin')

@section('content')
    <div class="wrapper">
        <div class="row">
            <div class="md-col-12">
                <div class="panel panel--default">
                    <div class="panel__header">{{ __('Categories') }}</div>
                    <div class="panel__body">
                        <gallery-add></gallery-add>

                    </div>

                </div>
                <table-data endpoint="{{ route('datatables.galleries.index') }}" post_method="edit"></table-data>
            </div>
        </div>
    </div>
@endsection
