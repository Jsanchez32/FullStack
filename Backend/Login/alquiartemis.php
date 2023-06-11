<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtro 2.0</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>

    <header>
        <button class="login" data-bs-toggle="modal" data-bs-target="#modalLogin">Iniciar Sesión</button>
    </header>
    <div class="informacion">
        <h1>Sistema de <br>facturacion y <br>Marketing</h1>
        <h2>Campus <br> 2.0</h2>
        <button data-bs-toggle="modal" data-bs-target="#modalRegistro">Registro</button>
    </div>


    
    <!-- Modal Registro -->
  <div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Usuarios</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
 
            <form action="registrarse.php" method="post">
              <div class="col-md-12">
                <label for="" class="form-label">User</label>
                <input type="text" class="form-control" id="username" name="username">
              </div>
              
              <div class="col-md-12">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>    

              <div class="col-md-12">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="ejemplo@gmail.com" name="email">
              </div>     
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Registrarse" name="registrarse">
              </div> 
            </form> 
        </div>
      </div>
    </div>
  </div>


  <!-- Modal Login -->

  <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="formularioLogin" action="loguearse.php" class="row g-3"  method="POST">
                <div class="col-md-12">
                  <label for="" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email">
                </div> 
              
                <div class="col-md-12">
                  <label for="" class="form-label">Password</label>
                  <input type="text" class="form-control" id="password" name="password">
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Registrarse" name="login">
                </div>
              </form> 
          </div>
      </div>
    </div>
  </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="/JS/main.js" type="module"></script>
</body>
</html>