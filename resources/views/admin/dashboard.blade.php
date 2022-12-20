@extends('admin.layout.app')

@section('title')
    Dashboard
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">language</i>
                    </div>
                    <p class="card-category">Języki</p>
                    <h3 class="card-title">{{ count($languages) }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">link</i>
                        <a href="{{ url('admin/language') }}">zobacz więcej</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">folder_copy</i>
                    </div>
                    <p class="card-category">Strony</p>
                    <h3 class="card-title">{{ count($pages) }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">link</i>
                        <a href="{{ url('admin/pages') }}">zobacz więcej</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-default card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">layers</i>
                    </div>
                    <p class="card-category">Stopki</p>
                    <h3 class="card-title">{{ count($footers) }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">link</i>
                        <a href="{{ url('admin/footers') }}">zobacz więcej</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">crop_original</i>
                    </div>
                    <p class="card-category">Media</p>
                    <h3 class="card-title">{{ count($medias) }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">link</i>
                        <a href="{{ url('admin/media') }}">zobacz więcej</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">people</i>
                    </div>
                    <p class="card-category">Użytkownicy</p>
                    <h3 class="card-title">{{ count($users) }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">link</i>
                        <a href="{{ url('admin/users') }}">zobacz więcej</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection