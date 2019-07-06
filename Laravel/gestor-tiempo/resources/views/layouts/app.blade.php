<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gestor Tiempo - @yield('tittle')</title>
       
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
       <!-- <ul class="nav navbar-dark justify-content-around bg-dark fixed-bottom">
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
        </ul> -->
          
        <!--
            Cuerpo la parte blanca
        -->
        <div class="container mt-5 pt-5 mb-5 pb-5">
           @yield('content')
           @include('sweetalert::alert')

        </div>
    </body>
</html>