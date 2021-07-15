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
        /*
        $data = EmpleadoModel::setPost();
        $this->model->update(1, $data);
        
        if(count($this->model->errors())):
        get_print_r($this->model->errors());
        endif; */
        
        $data = [
            'employes' => $this->model->findAll(),
            'title' => 'Listado de Empleados',
        ];
        
		return view('empleados/empleados_view', array_merge($data, $this->getForaneas()));
	}
    
    
    public function save()
    {
        $errors = '';
        $id = $this->request->getPost('id');
        $post = EmpleadoModel::setPost();
        
        if($this->request->getPost('send'))
        {
            if($id){ $this->model->update($id, $post); }            
           /* else { $this->model->insert($post); }
            
            $errors = $this->model->errors() ? $this->failValidationErrors($errors) : [];    */              
        }
               
        $roles_empleado = [];
        $empleado = $id ? $this->model->getWhere(['id' => $id])->getResult() : [];   
        
        $r_emp = $id ? $this->model->getWhere(['empleado_id' => $id])
            ->get('empleado_rol')
            ->getResult() : [];  
        
        foreach ($r_emp as $r){ $roles_empleado[$r->rol_id] = $r->rol_id; }
        
        $data = [
            'title' => ($id ? 'Editar' : 'Nuevo'). ' Empleado',
            'data' => [
                'name' => $errors ? set_value('name') : (isset($empleado->nombre) ? $empleado->nombre : ''),
                'gender' => $errors ? set_value('gender') : (isset($empleado->sexo) ? $empleado->sexo : ''),
                'email' => $errors ? set_value('email') : (isset($empleado->email) ? $empleado->email : ''),
                'area' => $errors ? set_value('area') : (isset($empleado->area_id) ? $empleado->area_id : ''),
                'boletin' => $errors ? set_value('boletin') : (isset($empleado->boletin) ? $empleado->boletin : ''),
                'description' => $errors ? set_value('description') : (isset($empleado->descripcion) ? $empleado->descripcion : ''),
                'roles_empleado' => $roles_empleado,
                'errors' => $errors
             ]
        ];
        
        return view('empleados/empleados_form', array_merge($data, $this->getForaneas()));
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
}
