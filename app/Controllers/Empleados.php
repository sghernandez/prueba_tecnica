<?php

namespace App\Controllers;

use App\Models\EmpleadoModel;
use App\Models\AreaModel;
use App\Models\RolModel;

class Empleados extends BaseController
{
    protected $id;
    protected $data;
    protected $model; 
    protected $area;
    protected $rol;

    public function __construct() {                
        $this->model = new EmpleadoModel();         
    }    
    
	public function index() 
    {    
        $data = [
            'employes' => $this->model->findAll(),
            'title' => 'Listado de Empleados',
        ];
        
		return view('empleados/empleados_view', array_merge($data, $this->getForaneas()));
	}
    
    
    public function save()
    {
        $errors = $roles_empleado = [];
        $id = $this->request->getPost('id');        
        
        if($this->request->getPost('send'))
        {
            $post = EmpleadoModel::setPost();
            
            if($id){ $this->model->update($id, $post); }            
            else { $this->model->insert($post); }
            $errors = $this->model->errors();
            
            if( ! $this->model->errors() ) 
            {
                $this->setRoles($id);
                session()->setFlashdata('success', 'Información guardada satisfactoriamente.');
                return redirect()->to('empleados');
            }                                    
        }

        return view('empleados/empleados_form', $this->datForm($id, $errors));
    }
    
    
    private function datForm($id, $errors)
    {
        $title = ($id ? 'Editar' : 'Nuevo'). ' Empleado';
        $roles_empleado = [];
        $empleado = $id ? $this->model->getWhere(['id' => $id])->getResult() : [];           
        $r_emp = $id ? $this->model->query('SELECT * FROM empleado_rol WHERE empleado_id = '. $id)->getResult() : [];                                 
        foreach ($r_emp as $r){ $roles_empleado[$r->rol_id] = $r->rol_id; }
        $nuevos_roles = $this->request->getPost('roles') ? : [];                
        
        $validator = inputValidation(
                ['name' => 'nombre', 'gender' => 'sexo', 'email' => 'email', 'area' => 'area_id', 'boletin' => 'boletin', 'description' => 'descripcion'], 
                $empleado, $errors
        );
        
        // se adiciona los errores de los roles
        $validator['roles']['error'] =  $this->request->getPost('send') && !count($nuevos_roles) ? 'You must choosse at least one rol.' : '';
        
        foreach ($nuevos_roles as $idRol) {
            $roles_empleado[$idRol] = $idRol; // sobreescribe con lo que se envía del formulario
        }
        
        return array_merge(compact('roles_empleado', 'validator', 'title', 'id'),  $this->getForaneas());
                
    }
    
    
    private function setRoles($id)
    {
        $db = \Config\Database::connect();
        $id = $id ? : $db->insertID();
        $db->query('DELETE FROM empleado_rol WHERE empleado_id = '. $id);
        
        foreach ($this->request->getPost('roles') as $r) 
        {
            $roles[] = [
                'empleado_id' => $id,
                'rol_id' => $r
            ];
        }
                
        $builder = $db->table('empleado_rol');        
        $builder->insertBatch($roles);      
    }

    
    private function getForaneas()
    {        
        $area = new AreaModel(); 
        $rol = new RolModel(); 
        $roles = [];
        $areas[null] = 'Seleccione una Area';
        
        foreach ($area->findAll() as $r) { $areas[$r->id] = $r->nombre; }
        foreach ($rol->findAll() as $r) { $roles[$r->id] = $r->nombre; }        
        
        return compact('areas', 'roles');       
    }
    
    
    public function delete()
    {                
        if($id = $this->request->getPost('id')) 
        {
            $this->model->query('DELETE FROM empleados WHERE id = '. $id);
            $this->model->query('DELETE FROM empleado_rol WHERE empleado_id = '. $id);
            
            session()->setFlashdata('success', 'Registro borrado satisfactoriamente.');
        }
        
        return redirect()->to('empleados');
    }    
    
}
