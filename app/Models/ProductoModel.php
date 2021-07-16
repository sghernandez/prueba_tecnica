<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class ProductoModel extends Model
{
    protected $id;
    protected $table = 'empleados';
    protected $primaryKey = 'id';

    protected $returnType = 'object'; 
    protected $allowedFields = ['nombre', 'email', 'sexo', 'area_id', 'boletin', 'descripcion'];

    protected $useTimestapms = FALSE;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $validationRules;  

    protected $validationMessages = [
        'email' => ['is_unique' => 'El email ya está en uso.']
    ];
    
    protected $skipValidation = FALSE;

    public function __construct($id = 0)
    {
        parent::__construct();     

        $this->id = $id;
        $this->validationRules = [
            'Producto_nombre' => "required|is_unique[Producto.Producto_nombre,$this->primaryKey,$this->id]|min_length[3]|max_length[50]",
            'Producto_precio' => 'required|numeric',
        ];    

    }   


}