<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-3">
        <h3>Búsqueda por ID</h3>
        <form action="" id="form-busqueda-1">
            <div class="mb-3">
                <label for="idbuscado">ID buscado</label>
                <div class="input-group">
                    <span class="input-group-text">Ingrese solo números</span>
                    <input type="text" class="form-control" id="idbuscado" autofocus>
                    <button class="btn btn-success" type="submit"> <i class="bi bi-search"></i> Buscar</button>
                </div>
            </div>

            <div>
                <label for="descripcion">item</label>
                <input type="text" class="form-control" id="descripcion">
            </div>

        </form>

        <hr>
    </div>

    <h3>Búsqueda por marca</h3>
    <form action="" id="form-busqueda-2">
      <div>
        <label for="marcas">Marcas</label>
        <div class="input-group">
          <select id="marcas" class="form-select">
            <option value="">Seleccione</option>
            <option value="Epson">Epson</option>
            <option value="Logitech">Logitech</option>
            <option value="Canon">Canon</option>
            <option value="HP">HP</option>
            <option value="Sony">Sony</option>
            <option value="Kingston">Kingston</option>
            <option value="LG">LG</option>
          </select>
          <button class="btn btn-success" type="submit"><i class="bi bi-search"></i> Buscar</button>
        </div>
      </div>
    </form>

    <table class="table table-bordered mt-3" id="tabla-marcas">
      <thead>
        <tr>
          <th>ID</th>
          <th>Descripción</th>
          <th>Garantía</th>
          <th>Cantidad</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>


  </div>

    <script>
        document.addEventListener("DOMContentLoaded", function (){
            function buscarProductoPorId(){
                const datos = new FormData()
                datos.append("operacion", "buscarPorId")
                datos.append("id", document.querySelector("#idbuscado").value)

                fetch(`../../app/controllers/producto.controller.php`, {
                    method: 'POST',
                    body: datos
                })
                    .then(response => response.json())
                    .then(data => {
                        const resultado = data[0]['descripcion'] + " " + data[0]['marca']
                        document.querySelector("#descripcion").value = resultado
                    })
                    .catch(error=>{
                        document.querySelector("#descripcion").value = ""
                        alert("No encontramos el producto")
                    })
            }
        })

        function buscarPorMarca(){
        const datos = new FormData()
        datos.append("operacion", "buscarPorMarca")
        datos.append("marca", document.querySelector("#marcas").value)

        fetch(`../../app/controllers/producto.controller.php`, {
          method: 'POST',
          body: datos
        })
          .then(response => response.json())
          .then(data => {
            if (data){
              //Contiene datos...
              document.querySelector("#tabla-marcas tbody").innerHTML = ""
              
              data.forEach(element => {
                document.querySelector("#tabla-marcas tbody").innerHTML += `
                <tr>
                  <td>${element.id}</td>
                  <td>${element.descripcion}</td>
                  <td>${element.garantia}</td>
                  <td>${element.cantidad}</td>
                </tr>
                `
              });
            }
          })
          .catch(error => {
            console.log("error")
          })
      }

        
        

        document.querySelector("#form-busqueda-1").addEventListener("submit", function(event){
                event.preventDefault()

                buscarProductoPorId()
            })

        document.querySelector("#form-busqueda-2").addEventListener("submit", function(event){
                event.preventDefault()

                buscarPorMarca()
      })

    </script>

</body>
</html>