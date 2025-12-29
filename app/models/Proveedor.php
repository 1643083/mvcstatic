<?php

//1. Acceder a la clase conexión
require_once 'Conexion.php';

//2. El proveedor heredará las funcionalidades de la clase conexión
class Proveedor extends Conexion{

    //3. Creamos un atributo donde guardamos la conexión
    private $pdo;

    //4. eEn el constructor, guardamos la conexión activa
    public function __construct(){
        $this->pdo = parent::getConexion();
    }

    public function listar(): array{
        try{
      $sql = "
        SELECT
            id, rsocial, ruc, telef, origen, contacto, confianza
            FROM proveedores
            ORDER BY id DESC;
      ";

      //2. Enviar la consulta preparada a PDO
      $consulta = $this->pdo->prepare($sql);

      //3. Ejecutar la consulta
      $consulta->execute();

      //4. Entregar resultado
      //fetchAll (colección de arreglos)
      //PDO::FETCH_ASSOC (los valores son asociativos)
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (Exception $e){
      return [];
    }
    }

    public function registrar ($registro = []): int{
        try{
      $sql = "
      INSERT INTO proveedores 
        (rsocial, ruc, telef, origen, contacto, confianza) VALUES
        (?,?,?,?,?,?)
      ";

      $consulta = $this->pdo->prepare($sql);

      //La consulta, lleva comodines, pasamos los datos en execute()
      $consulta->execute(
        array(
          $registro['rsocial'],
          $registro['ruc'],
          $registro['telef'],
          $registro['origen'],
          $registro['contacto'],
          $registro['confianza']
        )
      );

      return $this->pdo->lastInsertId();

    }catch(Exception $e){
      return -1;
    }
    }

    public function actualizar($registro = []): int{
        try{
      //Los comodines, poseen índices (arreglos)
      $sql = "
      UPDATE proveedores SET
        rsocial = ?,
        ruc = ?,
        telef = ?,
        origen = ?,
        contacto = ?,
        confianza = ?,
        updated = now()
          WHERE id = ?
      ";

      $consulta = $this->pdo->prepare($sql);

      //La consulta, lleva comodines, pasamos los datos en execute()
      $consulta->execute(
        array(
          $registro['rsocial'],
          $registro['ruc'],
          $registro['telef'],
          $registro['origen'],
          $registro['contacto'],
          $registro['confianza'],
          $registro['id']
        )
      );

      // cuántos registros fueron afectados?
      return $consulta->rowCount();

    }catch(Exception $e){
        echo "An error occurred: " . $e->getMessage();
      return -1;
    }
    }

    public function eliminar(int $id): int{
        try{
      $sql = "DELETE FROM proveedores WHERE id = ?";
      $consulta = $this->pdo->prepare($sql);

      //el execute () está vacío cuando no utilizas comodines
      $consulta->execute(
        array($id)
      );

      // ¿qué debemos devolver?
      // retorna la cantidad de filas afectadas
      return $consulta->rowCount();
    } catch(Exception $e){
      return -1;
    }
  }

}