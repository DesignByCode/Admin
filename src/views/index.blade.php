@extends('admin::layouts.admin')

@section('content')
    <div class="wrapper">
        <div class="row">
            <div class="lg-col-3">

                <model-counter :data="{'url': 'api/counter/users', 'model': 'Users', 'icon': 'lunacon-users-solid', 'href': 'admin/users'}"></model-counter>
            </div>
            <div class="lg-col-3">
                <model-counter :data="{'url': 'api/counter/categories', 'model': 'Categories', 'icon': 'lunacon-list', 'href': 'admin/categories'}"></model-counter>
            </div>
            <div class="lg-col-3">
                <model-counter :data="{'url': 'api/counter/products', 'model': 'Products', 'icon': 'lunacon-box-opened', 'href': 'admin/products'}"></model-counter>
            </div>
            <div class="lg-col-3">
                <model-counter :data="{'url': 'api/counter/tags', 'model': 'Tags', 'icon': 'lunacon-tags', 'href': 'admin/tags'}"></model-counter>
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
                                <line-chart url="api/charts/users" activities="User Signups"></line-chart>
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
