@extends('admin.layout.app')

@section('title')
    Dodaj nową
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Dodaj stronę</h4>
                </div>
                <div class="card-body">
                    <div class="spacer s2"></div>
                    <form method="POST" action="{{ url('admin/create-page') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Wybierz język</label>
                                    <select class="form-control" name="lng">
                                        <option value="">Język</option>
                                        @foreach($languages as $language)
                                            <option value="{{ $language->lng }}">{{$language->long_lng }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3 mb-3">
                                <div class="togglebutton">
                                    <label>
                                        <input type="checkbox" name="main_page">
                                        <span class="toggle"></span>
                                        Strona główna
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nazwa strony</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Kolejność</label>
                                    <input type="number" class="form-control" name="sort" value="{{ old('sort') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="togglebutton">
                                    <label>
                                        <input type="checkbox" name="disable_header" id="disable-header" onclick="showHeader()">
                                        <span class="toggle"></span>
                                        Włącz header
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3" id="show-header" style="display:none">
                                <div class="accordion">Header</div>
                                <div class="panel">
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Tytuł</label>
                                                <textarea name="header_title" class="form-control" cols="30" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Opis</label>
                                                <textarea name="header_desc" class="form-control" cols="30" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h5 class="mt-4">Dodatkowe opcje</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-12 mt-4 mb-4">
                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" name="arrow">
                                                    <span class="toggle"></span>
                                                    Włącz Strzałkę
                                                </label>
                                            </div>
                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" name="button_yellow">
                                                    <span class="toggle"></span>
                                                    Pasek żółty
                                                </label>
                                            </div>
                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" name="button_blue">
                                                    <span class="toggle"></span>
                                                    Pasek niebieski
                                                </label>
                                            </div>
                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" name="buttons" id="disable-buttons" onclick="showButtons()">
                                                    <span class="toggle"></span>
                                                    Buttony
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-12" id="show-buttons" style="display:none">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Lewy button</label>
                                                        <input type="text" class="form-control" name="left_button" value="{{ old('left_button') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Lewy button link</label>
                                                        <input type="text" class="form-control" name="left_button_link" value="{{ old('left_button_link') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Prawy button</label>
                                                        <input type="text" class="form-control" name="right_button" value="{{ old('right_button') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Prawy button link</label>
                                                        <input type="text" class="form-control" name="right_button_link" value="{{ old('right_button_link') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-2 mb-3">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Dodaj zdjęcie</label>
                                                <input type="file" name="header_img" class="form-control mt-4" style="opacity:1; z-index:auto;">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h5 class="mt-5">Treść strony</h5>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Treść</label>
                                    <textarea name="content" class="form-control" cols="30" rows="15"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3 mb-3">
                                <div class="togglebutton">
                                    <label>
                                        <input type="checkbox" name="additional_options">
                                        <span class="toggle"></span>
                                        Dodatkowe opcje
                                    </label>
                                </div>
                                <div class="togglebutton">
                                    <label>
                                        <input type="checkbox" name="info_refugees">
                                        <span class="toggle"></span>
                                        Informacje o uchodźcach
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary pull-left">Zapisz stronę</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
