<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
  
  <div class="container">
    <h1>Lista de productos</h1>
    <a href='#' class='btn btn-sm btn-primary'>Registrar</a>
    <hr>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>CLASIFICACIÓN</th>
          <th>MARCA</th>
          <th>DESCRIPCIÓN</th>
          <th>GARANTÍA</th>
          <th>INGRESO</th>
          <th>CANTIDAD</th>
          <th>OPERACIONES</th>
        </tr>
      </thead>
      <tbody>
        <!-- contenido dinámico, viene desde la BD -->
         
      </tbody>
    </table>
  </div>

  <script>
    //verificar que toda la página esté cargada (lista)
    document.addEventListener("DOMContentLoaded", function(){
      console.log("página lista")
    })
  </script>

</body>
</html>