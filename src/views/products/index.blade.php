@extends('admin::layouts.admin')

@section('content')
    <div class="wrapper">


        <div class="row">
            <div class="md-col-12">
                <div class="panel panel--default">
                    <div class="panel__header">{{ __('Products') }}</div>
                    <div class="panel__body">
                        <product-add></product-add>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="md-col-12">
                <div class="panel panel--default">
                    <div class="panel__body">
                        <div class="row">
                            <div class="lg-col-6">
                                <line-chart url="api/charts/users" activities="Views"></line-chart>
                            </div>
                            <div class="lg-col-6">
                                <bar-chart url="api/charts/users" activities="Views"></bar-chart>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="md-col-12">
                <table-data endpoint="{{ route('products.index') }}"></table-data>
            </div>
        </div>
    </div>
@endsection
