<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear producto</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Registro de productos</h1>
    <a href="./listar.php" class="btn btn-sm btn-primary">Lista de productos</a>
    <hr>
    <form action="" id="formulario-producto">
      <div class="card">
      <div class="card-header">Complete el formulario</div>
      <div class="card-body">
        <!--controles-->
        <div class="form-floating mb-2">
          <select id="clasificacion" class="form-select" required>
            <option value="">Seleccione</option>
            <option value="equipo">Equipo</option>
            <option value="accesorio">Accesorio</option>
            <option value="consumible">Consumible</option>
          </select>
        </div>

        <div class="form-floating mb-2">
          <input type="text" id="marca" class="form-control" required>
          <label for="marca" class="form-label">Marca</label>
        </div>

        <div class="form-floating mb-2">
          <input type="text" id="descripcion" class="form-control" required>
          <label for="descripcion" class="form-label">Descripción</label>
        </div>

        <div class="form-floating mb-2">
          <input type="number" min="0" max="36" value="12" id="garantia" class="form-control" required>
          <label for="garantia" class="form-label">Garantía</label>
        </div>

        <div class="form-floating mb-2">
          <input type="date" id="ingreso" class="form-control" required>
          <label for="ingreso" class="form-label">Fecha de ingreso</label>
        </div>

        <div class="form-floating mb-2">
          <input type="number" min="1" max="100" value="1" id="cantidad" class="form-control" required>
          <label for="cantidad" class="form-label">Cantidad</label>
        </div>

      </div>
      <div class="card-footer text-end">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-outline-secondary" type="reset">Cancelar</button>
        </div>
      </div>
    </form>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function (){

      // detener el envío automático del formulario
      document.querySelector("#formulario-producto").addEventListener("submit", function(event){
        //detener el envío
        event.preventDefault()

        if (confirm("¿está seguro de guardar?")){
          guardarDatos()
        }
      })

      function guardarDatos(){
        const datos = new FormData()
        datos.append("operacion", "registrar")
        datos.append("clasificacion", document.querySelector("#clasificacion").value)
        datos.append("marca", document.querySelector("#marca").value)
        datos.append("descripcion", document.querySelector("#descripcion").value)
        datos.append("garantia", document.querySelector("#garantia").value)
        datos.append("ingreso", document.querySelector("#ingreso").value)
        datos.append("cantidad", document.querySelector("#cantidad").value)

        fetch('../../app/controllers/producto.controller.php', {
          method: 'POST',
          body: datos
        })
        .then(response=>response.json())
        .then(data=>{
          console.log(data)
          if (data.id > 0) {
            alert("datos guardatos correctamente")
            document.querySelector("#formulario-producto").reset()
          }else{
            alert("no se pudo completar el proceso")
          }
        })
      }

    })
  </script>
</body>
</html>