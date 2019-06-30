@extends('admin::layouts.admin')

@section('content')
    <div class="wrapper">
        <div class="row">
            <div class="md-col-12 form__group">
                <a href="{{ route('admin.categories.index') }}" class="btn btn--primary"><i class="lunacon lunacon-chevron-left btn__icon--left"></i> Back</a>
            </div>
        </div>
        <div class="row">
            <div class="md-col-12">
                <div class="panel panel--default">
                    <div class="panel__header">{{ __('Category Images') }}</div>
                    <div class="panel__body">
                        <drop-zone
                            :object="{{ $category->getMedia('category')}}"
                            photo="categories"
                            upload="{{ route('api.categories.upload', [$category])  }}"
                            remove="api/categories">
                        </drop-zone>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="md-col-12">
                <div class="panel panel--default">
                    <div class="panel__header">{{ __('Category') }}</div>
                    <div class="panel__body">
                        <category-edit :category="{{ $category }}"></category-edit>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

