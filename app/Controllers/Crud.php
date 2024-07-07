<?php

namespace App\Controllers;

use App\Models\crudModel;
use CodeIgniter\API\ResponseTrait;

class Crud extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $Crud= new CrudModel();
        $datos= $Crud->listarLibros();

        $mensaje=session('mensaje');

        $data=[
                "datos" => $datos,
                "mensaje" => $mensaje
                ];
        return view('listado',$data);
        
    }

    public function crear(){
        if($_POST['nombre'] != "" && $_POST['autor'] != "" && $_POST['fecha'] != ""){
        $datos=[
                "nombre" => $_POST['nombre'],
                "autor" => $_POST['autor'],
                "fecha"=> $_POST['fecha']
        ];
        $Crud= new CrudModel();
        $respuesta=$Crud->insertar($datos);

        if($respuesta > 0){
            return redirect()->to(base_url().'/')->with('mensaje','1');    
        }
        else{
            return redirect()->to(base_url().'/')->with('mensaje','0');
        }
        }
        else{
            return redirect()->to(base_url().'/')->with('mensaje','0');
        }
    }

    public function actualizar(){
        $datos=[
            "nombre" => $_POST['nombre'],
            "autor" => $_POST['autor'],
            "fecha"=> $_POST['fecha']
            ];
        $lib_id= $_POST['lib_id'];
        $Crud= new CrudModel();
        
        $respuesta = $Crud->actualizar($datos, $lib_id);

        if($respuesta > 0){
            return redirect()->to(base_url().'/')->with('mensaje','2');    
        }
        else{
            return redirect()->to(base_url().'/')->with('mensaje','3');
        }
    }

    public function obtenerLibro($lib_id){
        $data = ["lib_id" => $lib_id];
        $Crud = new CrudModel();
        $respuesta = $Crud->obtenerLibro($data);

        $datos=["datos" => $respuesta];

        return view('actualizar',$datos);

    }
    
    public function eliminar($lib_id){
        $Crud= new CrudModel();
        $data=[
            "lib_id" => $lib_id
            ];
        $respuesta = $Crud->eliminar($data);

        if($respuesta > 0){
            return redirect()->to(base_url().'/')->with('mensaje','4');    
        }
        else{
            return redirect()->to(base_url().'/')->with('mensaje','5');
        }
    }

    // Búsqueda por nombre (o parte del nombre)
    public function buscarPorNombre($nombre)
    {
        $librosModel = new CrudModel();
        $libros = $librosModel->buscarPorNombre($nombre);
        
        return $this->respond($libros);
        if($libros > 0){
            return redirect()->to(base_url().'/')->with('mensaje','4');    
        }
        else{
            return redirect()->to(base_url().'/')->with('mensaje','5');
        }
    }

    // Búsqueda por autor
    public function buscarPorAutor($autor)
    {
        $librosModel = new CrudModel();
        $libros = $librosModel->buscarPorAutor($autor);
        
        return $this->respond($libros);
    }

    // Búsqueda por código de libro
    public function buscarPorCodigo($codigo)
    {
        $librosModel = new CrudModel();
        $libro = $librosModel->buscarPorCodigo($codigo);
        
        return $this->respond($libro);
    }
}
