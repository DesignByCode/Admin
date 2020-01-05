@extends('admin::layouts.admin')

@section('content')
    <div class="wrapper">
        <div class="row">
            <div class="md-col-9 form__group">
                <a href="{{ route('admin.products.index') }}" class="btn btn--primary"><i class="lunacon lunacon-chevron-left btn__icon--left"></i> Back</a> &nbsp; &nbsp; <strong>This product has {{ $views }} {{ ($views !== 1) ? 'views' : 'view' }}</strong>
            </div>
            <div class="md-col-3 form__group md-text-align-right">
                <activate-component :data="{{ $product }}"></activate-component>
            </div>
        </div>
        <product-notify></product-notify>
        <div class="row">
            <div class="md-col-12">
                <div class="panel panel--default">
                    <div class="panel__header">{{ __('Products Images') }}</div>
                    <div class="panel__body">
                        <drop-zone
                            :object="{{ $product->getMedia('product') }}"
                            photo="products"
                            upload="{{ route('api.products.upload', [$product])  }}"
                            remove="api/products">
                        </drop-zone>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="md-col-8">
                <div class="panel panel--default">
                    <div class="panel__header">{{ __('Products') }}</div>
                    <div class="panel__body">
                        <product-edit :product="{{ $product }}"></product-edit>
                    </div>
                </div>
            </div>
            <div class="md-col-4">

                <div class="panel panel--default">
                    <div class="panel__body">
                        <video-add :model="{{ $product }}"></video-add>

                        <video-list :model="{{ $product->id }}"></video-list>
                    </div>
                </div>

                <div class="panel panel--default">
                    <div class="panel__body">
                        <bar-chart url="api/charts/product/{{ $product->id }}" activities="Views"></bar-chart>
                    </div>
                </div>   

            </div>
        </div>

    </div>
@endsection
