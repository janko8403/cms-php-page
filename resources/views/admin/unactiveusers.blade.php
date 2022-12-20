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
                    <h4 class="card-title mt-0">Nieaktywni użytkownicy</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">


                        @if (count($users) < 0)

                            <div class="alert alert-danger" role="alert">
                                Brak niepotwierdzonych użytkowników
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
                                        Nazwisko
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
                                        @foreach($user->roles as $role)
                                            @if($role->id == 2)
                                                <tr>
                                                    <td>
                                                        {{ $user->id }}
                                                    </td>
                                                    <td>
                                                        {{ $user->name }}
                                                    </td>
                                                    <td>
                                                        {{ $user->surname }}
                                                    </td>
                                                    <td>
                                                        {{ $user->email }}
                                                    </td>
                                                    <td class="td-actions text-center">
                                                        @if ($user->email_verified_at == NULL)
                                                            <a 
                                                                href="/admin/activate-user/{{ $user->id }}" rel="tooltip" 
                                                                title="Aktywuj użytkownika" 
                                                                class="btn btn-success btn-link btn-sm">
                                                                <i class="material-icons">how_to_reg</i>
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
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
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
