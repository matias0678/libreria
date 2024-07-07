<?php 
namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model
{   
    protected $table = 'libros';
    protected $primaryKey = 'lib_id';
    protected $allowedFields = ['lib_id','nombre', 'autor', 'fecha'];

    //listar
    public function listarLibros(){
        $libros= $this->db->query("select * from libros");
        return $libros->getResult();
    }

    //cargar un libro
    public function insertar($datos){
        $libros= $this->db->table('libros');
        $libros->insert($datos);

        return $this->db->insertID();
    }

    //obtener datos del libro
    public function obtenerLibro($data){
        $libros = $this->db->table('libros');
        $libros->where($data);
        return $libros->get()->getResultArray();
    }

    //Actualiza datos del libro
    public function actualizar($data, $lib_id){
        $libros = $this->db->table('libros');
        $libros->set($data);
        $libros->where('lib_id', $lib_id);
        return $libros->update();
    }

    // Eliminar un libro
    public function eliminar($data){
        $libros = $this->db->table('libros');
        $libros->where($data);
        return $libros->delete();
    }
    
    // Búsqueda por nombre (o parte del nombre)
    public function buscarPorNombre($nombre)
    {
        $libros= $this->db->query("select * from libros where nombre='%" . $nombre . "%'");
        return $libros->getResult();
    }

    // Búsqueda por autor
    public function buscarPorAutor($autor)
    {
        return $this->like('autor', $autor)->findAll();
    }

    // Búsqueda por código de libro
    public function buscarPorCodigo($codigo)
    {
        return $this->where('lib_id', $codigo)->first();
    }
}
?>