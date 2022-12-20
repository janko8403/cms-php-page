@extends('admin.layout.app')

@section('title')
    Stopki
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0">Wszystkie</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                    @if (count($footers) === 0)

                        <div class="alert alert-danger" role="alert">
                            Brak
                        </div>

                        @else
                        <table class="table table-hover">
                            <thead class="">
                                <th>
                                    Stopka (język)
                                </th>
                                <th class="text-center">
                                    Akcja
                                </th>
                            </thead>
                            <tbody>

                                @foreach ($footers as $footer) 
                                    <tr>
                                        <td>
                                        {{ ($footer->lng != '') ? $footer->lng : 'Wybierz język' }}
                                        </td>
                                        <td class="td-actions text-center">
                                            @if (Auth::check() && Auth::user()->hasRole('Admin'))
                                                <a href="{{ url('admin/edit-footer/' . $footer->id . '/edit') }}" rel="tooltip" title="Edytuj stopkę" class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">mode_edit</i>
                                                </a>

                                                <button
                                                    type="button" rel="tooltip"
                                                    title="Usuń" class="btn btn-danger btn-link btn-sm"
                                                    data-toggle="modal" 
                                                    data-target="#delete-modal-{{$footer->id}}">
                                                    <i class="material-icons">close</i>
                                                </button>

                                                <form id="delete-{{ $footer->id }}"
                                                    action="{{ url('admin/delete-footer/' . $footer->id) }}"
                                                    method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <a href="{{ url('/admin/clone-footer/' . $footer->id) }}" rel="tooltip" title="Sklonuj stopkę" class="btn btn-success btn-link btn-sm">
                                                    <i class="material-icons">difference</i>
                                                </a>

                                                <div class="modal fade modal-primary" id="delete-modal-{{$footer->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm modal-dialog-centered" style="width: 280px;">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center">
                                                                <span class="material-icons" style="font-size:60px; color: red;">delete_outline</span>
                                                                <h4 class="mt-1">Czy napewno usunąć stopkę?</h4>
                                                            </div>
                                                            <div class="modal-footer" style="justify-content: space-between;">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                                                                <button 
                                                                    type="button" 
                                                                    class="btn btn-danger"
                                                                    onclick="event.preventDefault();
                                                                        document.getElementById('delete-{{ $footer->id }}').submit();">TAK</button>
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
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
