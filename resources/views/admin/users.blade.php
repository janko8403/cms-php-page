@extends('admin.layout.app')

@section('title')
    Użytkownicy
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0">Aktywni użytkownicy</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">


                        @if (count($users) === 0)

                            <div class="alert alert-danger" role="alert">
                                Brak użytkowników
                            </div>

                        @else
                            <table class="table table-hover">
                                <thead class="">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Imię
                                    </th>
                                    <th>
                                        E-mail
                                    </th>
                                     <th class="text-center">
                                        Akcja
                                    </th>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                {{ $user->id }}
                                            </td>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td class="td-actions text-center">
                                                @if (Auth::check() && Auth::user()->hasRole('Admin') && $user->id != 1 && Auth::id() != $user->id)
                                                    
                                                    @if($user->expire_date < $now)
                                                    <button 
                                                        class="copyToClipboard btn btn-danger btn-link btn-sm" 
                                                        rel="tooltip" 
                                                        data-val="{{ url('activate/'.$user->active_token) }}"
                                                        title="Skopiuj link aktywacyjny do schowka">
                                                        <i class="material-icons">lock_open</i>
                                                    </button>
                                                    @endif

                                                    @if($user->expire_date > $now)
                                                    <a 
                                                        href="{{ url('/admin/reactive-token/' . $user->active_token) }}" 
                                                        rel="tooltip" 
                                                        title="Odśwież token" 
                                                        class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">token</i>
                                                    </a>
                                                    @endif

                                                    <button
                                                        type="button" rel="tooltip"
                                                        title="Usuń" class="btn btn-danger btn-link btn-sm"
                                                        onclick="event.preventDefault();
                                                            document.getElementById('delete-{{ $user->id }}').submit();">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                    
                                                    <form id="delete-{{ $user->id }}"
                                                        action="{{ url('admin/delete-user/' . $user->id) }}"
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

                        <chat-messages :messages="messages"></chat-messages>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
