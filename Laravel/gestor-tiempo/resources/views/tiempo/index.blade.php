@extends('layouts.app')

@section('tittle', 'Home');

@section('content')

   
    <!--
        Tiempo
    -->
    <div id="tiempo" class="text-center">
    <h1>{{$sumaHorasTotales}}:{{$sumaMinutosTotales}} - 15:00 <hr></h1>
    </div>

  

     <!--
        Validaciones
    -->

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
   
    @endif

    <!--
        Acciones agregar y reiniciar
    -->
    <div id="acciones" class="d-flex justify-content-between mt-4 mb-2">
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#agregar">Agregar</button>
        <button type="button" class="btn btn-secondary btn-lg">Reiniciar</button>
    </div>

    <!--
        tabla de tiempo
    -->
    <div id="registroHoras" class="table-responsive pt-3">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Comienzo</th>
                    <th scope="col">Final</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach($tiempos as $tiempo)
                    @if ($tiempo->estado == 1)
                        <tr>
                        <th scope="row">{{$tiempo->id}}</th>
                        <td scope="col">{{$tiempo->comienzo}}</td>
                        <td scope="col">{{$tiempo->final}}</td>
                        <td scope="col">{{$tiempo->created_at}}</td>
                        <td>
                            <div class="btn-group" data-toggle="buttons">
                                <button type="button" class="btn btn-warning mr-1 pl-3 pr-3" data-toggle="modal" data-target="#editar-{{$tiempo->id}}"><ion-icon name="create"></ion-icon></button>
                                <button type="button" class="btn btn-danger pl-3 pr-3" data-toggle="modal" data-target="#eliminar-{{$tiempo->id}}"><ion-icon name="trash"></ion-icon></button>
                            </div>
                        </td>
                    
                </tr>

                    @endif
                
                @endforeach
                
            </tbody>
        </table>
    </div>
    <!-- Modal agregar tiempo -->
    <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="agregar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header  bg-dark">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle">Agregar</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tiempoInicio">Inicio</label>
                                <input type="time" class="form-control" id="tiempoInicio" name="tiempoInicio">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tiempoFinal">Final</label>
                                <input type="time" class="form-control" id="tiempoFinal" name="tiempoFinal">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>


    <!-- Modals editar tiempo -->

    @foreach($tiempos as $tiempo)
        <div class="modal fade" id="editar-{{$tiempo->id}}" tabindex="-1" role="dialog" aria-labelledby="editar-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                        <div class="modal-header  bg-dark">
                        <h5 class="modal-title text-white" id="exampleModalCenterTitle">Editar tiempo</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="POST" action="/edit/{{$tiempo->id}}"> 
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="tiempoInicio">Inicio</label>
                                    <input type="time" class="form-control" id="tiempoInicio" name="tiempoInicio" value="{{$tiempo->comienzo}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tiempoFinal">Final</label>
                                    <input type="time" class="form-control" id="tiempoFinal" name="tiempoFinal" value="{{$tiempo->final}}"> 
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="tiempoInicio">Fecha:</label>
                                    <input type="text" class="form-control" id="id_tiempo" name="fecha" value="{{$tiempo->created_at}}" disabled>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

     <!-- Modals ELIMINAR tiempo -->

    @foreach($tiempos as $tiempo)
        <div class="modal fade" id="eliminar-{{$tiempo->id}}" tabindex="-1" role="dialog" aria-labelledby="editar-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white text-center" id="exampleModalCenterTitle">Eliminar Tiempo</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="POST" action="/delete/{{$tiempo->id}}"> 
                            @method('DELETE')
                            @csrf
                            <div>
                                <p class="text-center font-weight-bold">¿Estas seguro de eliminar este tiempo?</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-danger btn-lg mr-3">Si</button>
                                <button type="button" class="btn btn-secondary btn-lg ml-3" data-dismiss="modal">No</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection
