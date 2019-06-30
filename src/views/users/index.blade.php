@extends('admin::layouts.admin')

@section('content')
    <div class="wrapper">
        <div class="row">
            {{--<data-table endpoint="{{ route('users.index') }}"></data-table>--}}

            <table-data endpoint="{{ route('users.index') }}" post_method="edit"></table-data>
        </div>
    </div>
@endsection
