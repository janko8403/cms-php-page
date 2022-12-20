@extends('admin.layout.app')

@section('title')
    Języki
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0">Wszystkie języki</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">


                    @if (count($languages) === 0)

                        <div class="alert alert-danger" role="alert">
                            Brak języków
                        </div>

                        @else
                        <table class="table table-hover">
                            <thead class="">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Język
                                </th>
                                <th>
                                    Kolejność
                                </th>
                                <th class="text-center">
                                    Akcja
                                </th>
                            </thead>
                            <tbody>

                                @foreach ($languages as $language) 
                                    <tr>
                                        <td>
                                            {{ $language->lng }}
                                        </td>
                                        <td>
                                            {{ $language->long_lng }}
                                        </td>
                                        <td>
                                            {{ $language->sort }}
                                        </td>
                                        <td class="td-actions text-center">
                                            @if (Auth::check() && Auth::user()->hasRole('Admin'))
                                                <a href="{{ url('/admin/edit-language/' . $language->id . '/edit') }}" rel="tooltip" title="Edytuj język" class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">mode_edit</i>
                                                </a>
                                                <button
                                                    type="button" rel="tooltip"
                                                    title="Usuń" class="btn btn-danger btn-link btn-sm"
                                                    data-toggle="modal" 
                                                    data-target="#delete-modal-{{$language->id}}">
                                                    <i class="material-icons">close</i>
                                                </button>

                                                <form id="delete-{{ $language->id }}"
                                                    action="{{ url('admin/delete-language/' . $language->id) }}"
                                                    method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <div class="modal fade modal-primary" id="delete-modal-{{$language->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm modal-dialog-centered" style="width: 280px;">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center">
                                                                <span class="material-icons" style="font-size:60px; color: red;">delete_outline</span>
                                                                <h4 class="mt-1">Czy napewno usunąć język?</h4>
                                                            </div>
                                                            <div class="modal-footer" style="justify-content: space-between;">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                                                                <button 
                                                                    type="button" 
                                                                    class="btn btn-danger"
                                                                    onclick="event.preventDefault();
                                                                        document.getElementById('delete-{{ $language->id }}').submit();">TAK</button>
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
