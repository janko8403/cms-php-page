@extends('auth.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-6 pr-15 pr-md-0 bg-gray">
            <div class="card-login">
                <div class="card-header-login">{{ $text }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
