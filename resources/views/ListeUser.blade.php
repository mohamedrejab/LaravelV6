@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bonjour Admin
                </div>

                <div class="card-body">
                @include('navbar')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Rôle</th>
                            <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($all as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td><a href="{{route('editUser', ['id' => $user->id])}}"><i class="far fa-edit"></i></a><a href="{{route('deleteUser', ['id' => $user->id])}}"><i class="far fa-trash-alt mr-2"></i></a></td>
                            </tr>
                        @endforeach   
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
