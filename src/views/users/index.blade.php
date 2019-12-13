@extends('admin::layouts.admin')

@section('content')
    <div class="wrapper">
        <div class="row">
            <div class="panel panel--default">
                <div class="panel__header">
                    Users
                </div>
            </div>

            <table-data endpoint="{{ route('datatables.users.index') }}" post_method="edit"></table-data>
        </div>
    </div>
@endsection
