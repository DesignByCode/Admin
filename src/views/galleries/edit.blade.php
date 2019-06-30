@extends('admin::layouts.admin')

@section('content')
    <div class="wrapper">
        <div class="row">
            <div class="md-col-12 form__group">
                <a href="{{ route('admin.galleries.index') }}" class="btn btn--primary"><i class="lunacon lunacon-chevron-left btn__icon--left"></i> Back</a>
            </div>
        </div>
        <div class="row">
            <div class="md-col-12">
                <div class="panel panel--default">
                    <div class="panel__header">{{ __('Gallery Images') }}</div>
                    <div class="panel__body">
                        <drop-zone
                            :object="{{$gallery->getMedia('gallery')}}"
                            photo="galleries"
                            upload="{{ route('api.galleries.upload', [$gallery])  }}"
                            remove="api/galleries">
                        </drop-zone>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

