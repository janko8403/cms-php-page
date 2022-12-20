@extends('admin.layout.app')

@section('title')
    Dodaj stopkę
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Dodaj stopkę</h4>
                </div>
                <div class="card-body">
                    <div class="spacer s2"></div>
                    <form method="POST" action="{{ url('admin/create-footer') }}">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Stopka</label>
                                    <textarea name="copyright" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5 class="mt-5">Dodatkowe opcje</h5>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Adres</label>
                                    <textarea name="address" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Kontakt</label>
                                    <textarea name="contact" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5 class="mt-5">Informacje o uchodźcach</h5>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Info</label>
                                    <textarea name="info" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5 class="mt-5">Informacje o pomocy</h5>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Info</label>
                                    <textarea name="contact_info" class="form-control" cols="30" rows="3"></textarea>
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
