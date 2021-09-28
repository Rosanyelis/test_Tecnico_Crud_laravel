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
            <div class="card">
                <form method="POST" action="{{ url('/tareas/'.$tarea->id.'/actualizar-tarea') }}">
                    @method('PUT')
                    @csrf
                    <div class="card-header">
                        Editar Tarea
                    </div>
                    <div class="card-body">
                        
                        <div class="mb-3">
                            <label for="tarea" class="form-label">Tarea</label>
                            <input type="text" name="title" class="form-control" value="{{ $tarea->title }}" id="tarea" placeholder="nueva tarea">
                            @if ($errors->has('title'))
                                <small class="form-text text-danger">{{ $errors->first('title') }}</small>
                            @endif
                        </div>
                        
                        
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ url('/') }}" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html> 