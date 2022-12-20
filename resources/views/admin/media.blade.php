@extends('admin.layout.app')

@section('title')
    Biblioteka
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header card-header-primary">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title mt-0">Wszystkie pliki</h4>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-warning btn-round pull-right" data-toggle="modal" data-target="#addFile">
                                Dodaj plik
                            </button>
                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if (count($medias) === 0)

                            <div class="alert alert-danger" role="alert">
                                Brak plików
                            </div>

                            @else
                            <table class="table table-hover">
                                <thead class="">
                                    <th>
                                        Plik
                                    </th>
                                    <th>
                                        Link
                                    </th>
                                    <th class="text-center">
                                        Akcja
                                    </th>
                                </thead>
                                <tbody>

                                    @foreach ($medias as $media)
                                        <tr>
                                            <td>
                                                {{ str_replace("public/images/library/","",$media->file) }}
                                            </td>
                                            <td>
                                                <a rel="tooltip" title="Otwórz w nowym oknie" target="_blank" href="{{ url('storage/'.str_replace("public/","",$media->file)) }}"><i class="material-icons text-danger">link</i></a>
                                            </td>
                                            <td class="td-actions text-center">
                                                @if (Auth::check() && Auth::user()->hasRole('Admin'))
                                                    <button 
                                                        type="button" 
                                                        rel="tooltip"
                                                        title="Kopiuj do schowka"
                                                        data-val="{{ url('storage/'.str_replace("public/","",$media->file)) }}" 
                                                        class="copyToClipboard btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">content_copy</i>
                                                    </button>

                                                    <button
                                                        type="button" rel="tooltip"
                                                        title="Usuń" class="btn btn-danger btn-link btn-sm"
                                                        data-toggle="modal" 
                                                        data-target="#delete-modal-{{$media->id}}">
                                                        <i class="material-icons">close</i>
                                                    </button>

                                                    <form id="delete-{{ $media->id }}"
                                                        action="{{ url('admin/delete-media/' . $media->id) }}"
                                                        method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                    <div class="modal fade modal-primary" id="delete-modal-{{$media->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm modal-dialog-centered" style="width: 280px;">
                                                            <div class="modal-content">
                                                                <div class="modal-body text-center">
                                                                    <span class="material-icons" style="font-size:60px; color: red;">delete_outline</span>
                                                                    <h4 class="mt-1">Czy napewno usunąć plik?</h4>
                                                                </div>
                                                                <div class="modal-footer" style="justify-content: space-between;">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                                                                    <button 
                                                                        type="button" 
                                                                        class="btn btn-danger"
                                                                        onclick="event.preventDefault();
                                                                            document.getElementById('delete-{{ $media->id }}').submit();">TAK</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{ $medias->links('pagination::bootstrap-4') }}
                        @endif
                    </div>
                </div>

                <div class="modal fade" id="addFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Dodaj plik</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <i class="material-icons">clear</i>
                                </button>
                            </div>
                            <form method="POST" action="{{ url('admin/create-media') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label text-white">Dodaj zdjęcie</label>
                                                <input type="file" name="file" class="form-control mt-4" style="opacity:1; z-index:auto;">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <button type="submit" class="btn btn-danger btn-link pull-right">Dodaj plik</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                {{-- <div class="card-header card-header-success mt-5">
                    <form method="POST" action="{{ url('admin/create-media') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label text-white">Dodaj zdjęcie</label>
                                    <input type="file" name="file" class="form-control mt-4" style="opacity:1; z-index:auto;">
                                </div>
                            </div>
                            <div class="col-md-12 mt-5">
                                <div class="form-group">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary pull-left">Dodaj plik</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
