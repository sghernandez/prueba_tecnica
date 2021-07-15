<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class EmpleadoModel extends Model
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
    protected $data;    

    protected $validationMessages = [
        'email' => ['is_unique' => 'El email ya está en uso.']
    ];

    protected $skipValidation = FALSE;
    protected $request;

    public function __construct()
    {
        parent::__construct();     
        
        $this->id = intval($this->id = isset($_POST['id']) ? $_POST['id'] : '');
        $this->validationRules = [
            'nombre' => 'required|alpha|min_length[10]|max_length[255]',
            'email' => "required|is_unique[empleado.email,$this->primaryKey,$this->id]|valid_email",
            'sexo' => 'required|in_list[M,F]',
            'area_id' => 'required',
            'descripcion' => 'required|min_length[10]',
        ];    

    }   
    

    public static function setPost()
    {
        $request = \Config\Services::request();
 
        return  [ 
            'nombre' => $request->getPost('name'),
            'email' => $request->getPost('email'),
            'sexo' => $request->getPost('gender'),
            'area_id' => $request->getPost('area'),
            'boletin' => $request->getPost('boletin'),
            'descripcion' => $request->getPost('description'),
        ];                           
    }    

}