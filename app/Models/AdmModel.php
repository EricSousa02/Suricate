<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class AdmModel extends Model{
    protected $table = 'administradores';
    protected $allowedFields = ['nome','email','senha'];
}