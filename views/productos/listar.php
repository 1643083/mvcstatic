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
    <a href='./crear.php' class='btn btn-sm btn-primary'>Registrar</a>
    <hr>
    <table class="table table-striped" id="tabla-productos">
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
    //método    : acción (clases, POO)
    //atributo  : característica, propiedad
    //evento    : respuesta

    //verificar que toda la página esté cargada (lista)
    document.addEventListener("DOMContentLoaded", function(){
      // enviarle una solicitud al controlador y esperar una respuesta
      function obtenerDatos(){
        const datos = new FormData()
        datos.append("operacion", "listar")

        //¿qué es una promesa?
        //conceptos ligados a procesos asíncronos, donde una tarea
        //puede ser resuelta en N tiempo o bien puede fallar
        fetch('../../app/controllers/producto.controller.php', {
          method: 'POST',
          body: datos
         })
         .then(response=>response.json())
         .then(data=>{
          //console.log(data) //todos los datos en un paquete

          const tabla = document.querySelector("#tabla-productos tbody")
          //renderizar las filas en <table>
            data.forEach(element => {
              tabla.innerHTML += `
              <tr>
                <td>${element.id}</td>
                <td>${element.clasificacion}</td>
                <td>${element.marca}</td>
                <td>${element.descripcion}</td>
                <td>${element.garantia}</td>
                <td>${element.ingreso}</td>
                <td>${element.cantidad}</td>
                <td></td>
              </tr>
              `;
            });
          })
      }
      obtenerDatos()
    })
  </script>

</body>
</html>