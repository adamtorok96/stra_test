@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('admin.home.menu')
        </div>

        <div class="col-md-9">
            @include('admin.home.info')
        </div>
    </div>
@endsection