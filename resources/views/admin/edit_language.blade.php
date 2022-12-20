@extends('admin.layout.app')

@section('title')
   Język
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Edytuj język</h4>
                </div>
                <div class="card-body">
                    <div class="spacer s2"></div>
            
                    <form method="POST" action="{{ url('admin/update-language/'. $language->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Wybierz język</label>
                                    <select class="form-control" name="lng">
                                        <option value="">Język</option>
                                        @foreach($languages as $lang)
                                            <option {{ ($lang->lng == $language->lng) ? 'selected' : '' }} value="{{ $lang->lng }}">{{$lang->long_lng }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-5">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Kolejność</label>
                                        <input type="number" class="form-control" name="sort" value="{{ $language->sort }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary pull-left">Zapisz język</button>
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
