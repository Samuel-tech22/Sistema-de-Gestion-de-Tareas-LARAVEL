@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Gestion de Tareas</h2>
        </div>
        <div>
            <a href="{{route('tasks.create')}}" class="btn btn-primary">Crear tarea</a>
        </div>
    </div>

    @if (Session::get('success'))
    <div class="alert alert-success mt-2">
        <strong>{{Session::get('success')}}<br>
    </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Tarea</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>

            @foreach($tasks as $tasks)
            <tr>
                <td class="fw-bold">{{$tasks->title}}</td>
                <td>{{$tasks->description}}</td>
                <td>
                    {{$tasks->due_date}}
                </td>
                <td>
                    <span class="badge bg-warning fs-6">{{$tasks -> status}}</span>
                </td>
                <td>
                    <a href="{{route('tasks.edit', $tasks)}}" class="btn btn-warning">Editar</a>

                    <form action="{{route('tasks.destroy', $tasks)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
            
        </table>
    </div>
</div>
@endsection