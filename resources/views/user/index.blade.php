@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Laravel Ajax ToDo App</h2>
        <button name="btn-add" class="btn btn-primary btn-xs btn-add">User list</button>
        <div>

            <!-- Table-to-load-the-data Part -->
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Mobile</th>
                    <th>Birthday</th>
                    <th>Sexe</th>
                    <th>Activation</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="tasks-list" name="tasks-list">
                @foreach ($users as $user)
                    <tr id="task{{$user->id}}">
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->firstName}}</td>
                        <td>{{$user->lastName}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->birthday}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->activation}}</td>
                        <td>{{$user->role}}</td>
                        <td>
                            <button class="btn btn-warning btn-xs btn-detail open-modal" data-url="{{$user->id}}">Edit</button>
                            <button class="btn btn-danger btn-xs btn-delete delete-task" data-url="{{$user->id}}">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- End of Table-to-load-the-data Part -->

        </div>
    </div>
@endsection
