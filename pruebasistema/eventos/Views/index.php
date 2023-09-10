<?php include("Menu.php") ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="<?php echo base_url; ?>Assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>Assets/css/main.min.css" rel="stylesheet">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
    <div id='calendar'></div>
    </div>

    <div class="modal fade" id="MyModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-info">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <form action="" id="formulario">
            <div class="modal-body">
            <div class="form-floating mb-3">
                <input type="text" id="id" name="id">
                <input type="text" class="form-control" id="title" name="title">
                <label for="title" class="form-label">evento</label>
                </div>
                 <div class="form-floating mb-3">
                <input type="date" class="form-control" id="start" name="start">
                <label for="start" class="form-label">fecha</label>
                </div>
                <div class="form-floating mb-3">
                <input type="color" class="form-control" id="color" name="color">
                <label for="color" class="form-label">color</label>
                </div>
            <div class="modal-footer">
                <button class="btn btn-warning">cancelar</button>
                <button class="btn btn-danger" type="button" id="btnEliminar">eliminar</button>
                <button class="btn btn-info" id="btnAccion" type="submit">registrar</button>
            </div>
          </form>
           
        </div>
      </div>
    </div>
    

    <script src="<?php  echo base_url; ?>Assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php  echo base_url; ?>Assets/js/main.min.js"></script>
    <script src="<?php  echo base_url; ?>Assets/js/moment.js"></script>
    <script src="<?php  echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php  echo base_url; ?>Assets/js/es.js"></script>
    <script>
        const base_url = '<?php  echo base_url; ?>';
    </script>
    <script src="<?php  echo base_url; ?>Assets/js/app.js"></script>


  </body>
</html>