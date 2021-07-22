<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
</head>

<body>
<div class="container ">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post">

      <div class="input-group margin-bottom-sm">
      <span class="input-group-text"><i class="fa fa-address-card-o fa-fw"></i></span>
      <input type="text" class="form-control" id="name" name="name" placeholder="Identificador del usuario">
      </div>
      <br>
      <div class="input-group">
      <span class="input-group-text"><i class="fa fa-user-circle-o fa-fw"></i></span>
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre completo del usuario">
      </div>
      <br>
      <div class="input-group">
      <span class="input-group-text"><i class="fa fa-envelope-open-o fa-fw"></i></span>
      <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico">
      </div>
      <br>
      <div class="input-group">
      <span class="input-group-text"><i class="fa fa-key fa-fw"></i></span>
      <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Primary</button>
      <br><br>

      <?php echo $errores; ?>

    </form>

</div>
</body>
</html>
