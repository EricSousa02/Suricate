<?php namespace App\Models;

use CodeIgniter\Model;

class OrganizadorModel extends Model{

    protected $table = 'organizador';
    protected $primarykey = 'id';

    protected $allowedFields = [
        'nome',
        'email',
        'senha'
    ];

}