@extends('layouts.app')

@section('tittle', 'Home');

@section('content')

<!--
    Tiempo
-->
<div id="tiempo" class="text-center">
    <h1>14:15:21 - 15:00:00 <hr></h1>
</div>

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
                
            <tr>
                <th scope="row">{{$tiempo->id}}</th>
                <td scope="col">{{$tiempo->comienzo}}</td>
                <td scope="col">{{$tiempo->final}}</td>
                <td scope="col">{{$tiempo->created_at}}</td>
                <td>
                    <div class="btn-group" data-toggle="buttons">
                        <button type="button" class="btn btn-warning mr-1 pl-3 pr-3" data-toggle="modal" data-target="#editar-{{$tiempo->id}}"><ion-icon name="create"></ion-icon></button>
                        <button type="button" class="btn btn-danger pl-3 pr-3"><ion-icon name="trash"></ion-icon></button>
                    </div>
                </td>
                
            </tr>
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
                            <input type="time" class="form-control" id="tiempoInicio" name="tiempoInicio" placeholder="Tiempo inicial">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tiempoFinal">Final</label>
                            <input type="time" class="form-control" id="tiempoFinal" name="tiempoFinal" placeholder="Tiempo Final">
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

<!-- Modal editar 1 tiempo -->
<div class="modal fade" id="editar-1" tabindex="-1" role="dialog" aria-labelledby="editar-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
                <div class="modal-header  bg-dark">
                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Agregar</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Inicio</label>
                            <input type="time" class="form-control" id="inputEmail4" placeholder="Tiempo inicial">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Final</label>
                            <input type="time" class="form-control" id="inputPassword4" placeholder="Tiempo Final">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Editar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal editar 2 tiempo -->
<div class="modal fade" id="editar-2" tabindex="-1" role="dialog" aria-labelledby="editar-2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
                <div class="modal-header  bg-dark">
                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Agregar</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Inicio</label>
                            <input type="time" class="form-control" id="inputEmail4" placeholder="Tiempo inicial">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Final</label>
                            <input type="time" class="form-control" id="inputPassword4" placeholder="Tiempo Final">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Editar</button>
            </div>
        </div>
    </div>
</div>

@endsection
