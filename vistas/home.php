<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
      <!--BOOTSTRAP 4--->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <!--FONT AWESOME 5--->
      <script src="https://kit.fontawesome.com/af9517cc59.js" crossorigin="anonymous"></script>
      <!--JavaScrip--->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="script/buscar.js"></script>

      
    </head>
<body>
   
   <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div id="box-user" class="user-box">
            <div class="container">
                <i class="fa-solid fa-user"><h3> <?php $_SESSION['username'] = $userForm; ?></h3></i>
                <div class="cerrar-sesion">
                    <p><?php echo $user->getUser();  ?></p>
                    <a href="includes/logout.php">Cerrar sesion</a>
                </div>
            </div>
            <ul>
                <li><a href=""><i class="fa-solid fa-desktop"></i> Escritorio</a></li>
                <hr>
                <li><a href=""><i class="fa-solid fa-file-powerpoint"></i> Mis puntos</a></li>
                <hr>
                <li><a href=""><i class="fa-solid fa-list"></i> Mis pedidos</a></li>
                <hr>
                <li><a href=""><i class="fa-solid fa-location-dot"></i> Editar dirección</a></li>
                <hr>
                <li><a href=""><i class="fa-regular fa-pen-to-square"></i> Editar datos</a></li>
                <hr>
                <li><a href=""><i class="fa-solid fa-heart"></i> Mi lista de deseos</a></li>
            </ul>

        </div>
        <div class="card card-body">
                <form action="includes/save.php" method="POST">
                    <h2>My Account</h2> <br>
                    <h5>!Bienvenido <?php echo $user->getNombre();  ?>!</h5>
                    <h6>Su balance actual es de:   <?php echo $user->getPuntos();  ?> puntos</h6>
                    <p>!Agrega tus compras y gana puntos</p>
                    <div class="form-group">
                        <p>Codigo de producto</p>
                        <input type="text" id="codigo" name="codigo" class="form-control" placeholder="Digita el codigo de producto" autofocus>
                        <input type="hidden" id="vendedor" name="vendedor" class="form-control" value="<?php echo $user->getVendedor();  ?>">
                    </div>
                    <div class="form-group">
                        <p>Fecha de compra</p>
                        <input type="date" name="fecha">
                    </div>

                    <div class="form-group">
                        <p>Monto de compra</p>
                        <input type="text" id="precio" name="precio" class="form-control">
                        <input type="hidden" id="punto" name="punto" class="form-control">
                    </div>

                    <input type="submit" class="btn btn-primary" name="save" value="Submit">
                </form>
            </div>
            
   </nav>
        
   
</body>
</html>