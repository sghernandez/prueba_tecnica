<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class AreaModel extends Model
{
    protected $id;
    protected $table = 'areas';
    protected $primaryKey = 'id';

    protected $returnType = 'object'; 
    protected $allowedFields = ['nombre'];

    protected $skipValidation = FALSE;


    public function __construct() {
        parent::__construct();     
    }   

}