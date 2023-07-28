<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class UsuarioModel extends Model{
    protected $table = 'alunos';
    protected $allowedFields = ['nome','email','turma','senha'];
}