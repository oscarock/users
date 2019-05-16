@extends('layout')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header text-center py-4">Usuarios</h1>
        </div>
        <div class="col-md-7">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#create"><i class="fas fa-plus-circle"></i> Usuario</a><br><br>
        </div>
        <div class="col-md-12">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                <tr v-for="users in users">
                    <td>@{{ users.id }}</td>
                    <td>@{{ users.name }}</td>
                    <td>@{{ users.surname }}</td>
                    <td>@{{ users.document }}</td>
                    <td>@{{ users.phone }}</td>
                    <td>@{{ users.email }}</td>
                    <td></td>
                </tr>
            </table>
        </div>    
    </div>
</div>
@endsection