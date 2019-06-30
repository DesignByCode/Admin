@extends('admin::layouts.admin')

@section('content')
    <div class="wrapper">
        <div class="row">
            <div class="lg-col-3">
                <model-counter :data="{'url': 'api/counter/users', 'model': 'Users', 'icon': 'lunacon-users-solid'}"></model-counter>
            </div>
            <div class="lg-col-3">
                <model-counter :data="{'url': 'api/counter/products', 'model': 'Products', 'icon': 'lunacon-box-opened'}"></model-counter>
            </div>
            <div class="lg-col-3">
                <model-counter :data="{'url': 'api/counter/users', 'model': 'Users', 'icon': 'lunacon-users-solid'}"></model-counter>
            </div>
            <div class="lg-col-3">
                <model-counter :data="{'url': 'api/counter/users', 'model': 'Users', 'icon': 'lunacon-users-solid'}"></model-counter>
            </div>
        </div>
        <div class="row">
            <div class="lg-col-3">
                <clock/>
            </div>
        </div>
        <div class="row">

            <div class="lg-col-12">
                <div class="panel panel--default">
                    <div class="panel__header">{{ __('Dashboard') }}</div>
                    <div class="panel__body">
                        <div class="row">
                            <div class="lg-col-6">
                                <line-chart url="api/charts/users" activities="Views"></line-chart>
                            </div>
                            <div class="lg-col-6">
                                <line-chart url="api/charts/categories" activities="Views"></line-chart>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
