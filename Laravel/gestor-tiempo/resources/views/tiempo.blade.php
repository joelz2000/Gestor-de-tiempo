<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home</title>
       
        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="css/plantilla.css">
        <!--Bootstrapp JavaSript JQuery-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!--Iconos-->
        <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
    </head>
    <body>

        <!--
            Encabezado arriba
        -->
        <nav class="navbar navbar-dark justify-content-center bg-dark fixed-top ">
            <h2 class="text-white">Saludos</h2>
        </nav>
        
        <!--
            Menu abajo
        -->
        <ul class="nav navbar-dark justify-content-around bg-dark fixed-bottom">
            <li class="nav-item">
                <a class="nav-link active text-white text-center" href="#">
                    <ion-icon name="time" size="large" class="text-white"></ion-icon>
                    <p>Tiempo</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white text-center" href="#">
                    <ion-icon name="alarm" size="large" class="text-white"></ion-icon>
                    <p>Alarmas</p>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link text-white text-center" href="#">
                    <ion-icon name="list-box" size="large" class="text-white"></ion-icon>
                    <p>Historial</p>
                </a>
            </li>
        </ul>
          
        <!--
            Cuerpo la parte blanca
        -->
        <div class="container mt-5 pt-5">
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
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td scope="col">12:55 a.m</td>
                            <td scope="col">2:15 p.m</td>
                            <td>
                                <div class="btn-group" data-toggle="buttons">
                                    <button type="button" class="btn btn-warning mr-1 pl-3 pr-3" data-toggle="modal" data-target="#editar-1"><ion-icon name="create"></ion-icon></button>
                                    <button type="button" class="btn btn-danger pl-3 pr-3"><ion-icon name="trash"></ion-icon></button>
                                </div>
                            </td>
                            
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>3:50 p.m</td>
                            <td>5:15 p.m</td>
                            <td>
                                <div class="btn-group" data-toggle="buttons">
                                    <button type="button" class="btn btn-warning mr-1 pl-3 pr-3" data-toggle="modal" data-target="#editar-2"><ion-icon name="create"></ion-icon></button>
                                    <button type="button" class="btn btn-danger pl-3 pr-3"><ion-icon name="trash"></ion-icon></button>
                                </div>
                            </td>
                        </tr>
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
                            <button type="button" class="btn btn-primary">Agregar</button>
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
        </div>
    </body>
</html>