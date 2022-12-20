@extends('admin.layout.app')

@section('title')
    Podstrony
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0">Wszystkie podstrony</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                    @if (count($pages) === 0)

                        <div class="alert alert-danger" role="alert">
                            Brak stron
                        </div>

                        @else
                        <table class="table table-hover">
                            <thead class="">
                                <th>
                                    Tytuł
                                </th>
                                <th>
                                    Slug
                                </th>
                                <th>
                                    Strona główna
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

                                @foreach ($pages as $page) 
                                    <tr>
                                        <td>
                                            {{ $page->name }}
                                        </td>
                                        <td>
                                            {{ $page->slug }}
                                        </td>
                                        <td>
                                            @if($page->main_page == 1)
                                                <p><i class="material-icons">done</i></p>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $page->lng }}
                                        </td>
                                        <td>
                                            {{ $page->sort }}
                                        </td>
                                        <td class="td-actions text-center">
                                            @if (Auth::check() && Auth::user()->hasRole('Admin'))
                                                <a href="{{ url('/admin/edit-page/' . $page->id . '/edit') }}" rel="tooltip" title="Edytuj stronę" class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">mode_edit</i>
                                                </a>
                                    
                                                <button
                                                    type="button" rel="tooltip"
                                                    title="Usuń" class="btn btn-danger btn-link btn-sm"
                                                    data-toggle="modal" 
                                                    data-target="#delete-modal-{{$page->id}}">
                                                    <i class="material-icons">close</i>
                                                </button>

                                                <a href="{{ url('/admin/clone-page/' . $page->id) }}" rel="tooltip" title="Sklonuj stronę" class="btn btn-success btn-link btn-sm">
                                                    <i class="material-icons">difference</i>
                                                </a>

                                                <div class="modal fade modal-primary" id="delete-modal-{{$page->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm modal-dialog-centered" style="width: 280px;">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center">
                                                                <span class="material-icons" style="font-size:60px; color: red;">delete_outline</span>
                                                                <h4 class="mt-1">Czy napewno usunąć stronę?</h4>
                                                            </div>
                                                            <div class="modal-footer" style="justify-content: space-between;">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                                                                <button 
                                                                    type="button" 
                                                                    class="btn btn-danger"
                                                                    onclick="event.preventDefault();
                                                                        document.getElementById('delete-{{ $page->id }}').submit();">TAK</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <form id="delete-{{ $page->id }}"
                                                    action="{{ url('admin/delete-page/' . $page->id) }}"
                                                    method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

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
