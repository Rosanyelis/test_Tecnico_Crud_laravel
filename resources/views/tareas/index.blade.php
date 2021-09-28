<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Test Técnico</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body>

        <div class="container mt-5">
            @include('alert')
            <div class="card">
                <div class="card-header">
                    Listado de Tareas
                </div>
                <div class="card-body">
                    <a href="{{ url('/tareas/nueva-tarea') }}" class="btn btn-dark btn-sm text-right">Nueva Tarea</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>Tarea</th>
                              <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tareas as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <a href="{{ url('/tareas/'.$item->id.'/ver-tarea') }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ url('/tareas/'.$item->id.'/editar-tarea') }}" class="btn btn-success btn-sm">Editar</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}">Eliminar</button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ url('/tareas/'.$item->id.'/eliminar-tarea') }}">
                                            @method('DELETE')
                                            @csrf
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                ¿Está Seguro de Eliminar éste Registro?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Si, estoy Seguro</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>  
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html> 