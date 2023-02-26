<?php 
include_once 'app/procesa_correo.php';

if(isset($_POST['formulario']) && $_POST['formulario'] == 'correo'){
  $obj = new enviarMail();
  $res = $obj->mail(); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">  
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <title>Taller - Formulario Correo</title>
    <style>
     .card{ width: 600px !important; border-radius: 15px;}
     body{ background-color: #f0f0f0;}
     .bloque{ height: 50px;}
    </style>  
</head>
<body>
<div class="login-box">
<center>
  <div class="bloque"></div>
<div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><strong>00363-AB-10-S-2023-01-ELECTIVA A2</strong></p>
      <p class="login-box-msg"><strong>Ingresar datos de Contacto</strong></p>
      
      <form action="index.php" method="post" id="formulario">
      <input type="hidden" name="formulario" value="correo">
      <table>
        <tr>
          <th><label for="nombres">Nombres: </label></th>
          <td>
          <div class="input-group mb-3">        
          <input type="text" class="form-control" placeholder="Nombres" name="nombres" id="nombres" required>            
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>            
          </div>
          </td>
        </tr>
        <tr>
          <th><label for="celular">Celular: </label></th>
          <td>
            <div class="input-group mb-3">        
            <input type="number" class="form-control" name="celular" id="celular" placeholder="celular" required>            
              <div class="input-group-text">
              <i class="fa fa-phone"></i>              
              </div>
            </div>    
          </td>
        </tr>
        <tr>
          <th><label for="Correo">Correo Electronico: </label></th>
          <td>
          <div class="input-group mb-3">
          <input type="email" class="form-control" name="correo" id="Correo" placeholder="Correo Electronico" required>
              <div class="input-group-text">
                <span class="fas fa-at"></span>
              </div>
            </div>      
          </td>
        </tr>
      </table>

      <div class="input-group mb-3">      
        <textarea rows="3" cols="3" class="form-control" placeholder="Escribenos un mensaje" required name="sms"></textarea>
      </div> 

        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">
            Enviar Correo Electronico</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    </center>
    <!-- /.login-card-body -->
  </div>
  <script src="plugins/jquery/jquery.min.js"></script>  
  <script src="plugins/toastr/toastr.min.js"></script>
  <script>
      $(function(){
        let Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
          });
      });

      toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-full-width",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
  </script>   
<?php
if(isset($_POST['formulario']) && $_POST['formulario'] == 'correo'){
  if($res==1){
    echo "
    <script>
    Command: toastr['success']('Su correo electrónico fue enviado correctamente!', 'Formulario y Correo')
    </script>
    ";
  }else{
    echo "
    <script>
        Command: toastr['error']('Ocurrio un problema al enviar el correo!', 'Error, Correo No Enviado!');
    </script>
    ";
  }
}
?>
</body>
</html>
