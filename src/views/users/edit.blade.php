@extends('admin::layouts.admin')

@section('content')
    <div class="wrapper">
        <div class="row">
            <div class="md-col-12 form__group">
                <a href="{{ route('admin.users.index') }}" class="btn btn--primary"><i class="lunacon lunacon-chevron-left btn__icon--left"></i> Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="panel panel--default">
                    <div class="panel__header">User Profile</div>
                    <div class="panel__body">
                        <roles-permissions :permissions="{{ $permissions }}" :roles="{{ $user }}"></roles-permissions>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
