<?php namespace App\Controllers;

use App\Models\OrganizadorModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Request;

class Main extends Controller{
    
    protected $organizadoresModel;
    public function __construct(){
        helper('form');
        $this->organizadoresModel = new OrganizadorModel();        
    }
 
    public function  index(){

        $organizadorModel = new OrganizadorModel();


        $organizador = $this->organizadoresModel->findAll();

        $variaveis = [
            'organizadores' => $organizador
        ];

        echo view('login', $variaveis);
    
    }





    public function create(){
       
        return view('organizador/form');

        }






     public function store(){
        $organizadorModel = new OrganizadorModel();


        $organizador = $this->organizadoresModel->findAll();

        $variaveis = [
            'organizadores' => $organizador
        ];
       
        $dados = $this->request->getPost();
        
        $request = $this->organizadoresModel->save($dados);

       if($request){
           return redirect()->to(site_url("main/cadastrados"));
        }else{
            echo view('erro');
        }
     }



     public function edit($id = null){

        $organizadorModel = new OrganizadorModel();



        $organizador = $this->organizadoresModel->find($id);

        $organizadores = $this->organizadoresModel->findAll();

        $variaveis = [
            'organizador' => $organizador,
            'organizadores' => $organizadores
        ];


        return view('cadastrados',$variaveis);

     }





     public function excluir($id = null){
        $organizadorModel = new OrganizadorModel();


        $organizador = $this->organizadoresModel->findAll();

        $variaveis = [
            'organizadores' => $organizador
        ];


        if($this->organizadoresModel->delete($id)){
            return redirect()->to(site_url("main/cadastrados"));
        }
        else{
            echo view('erro');
        }
        
     }


     public function login(){
        echo view('login');
     }


     public function home(){
        echo view('home');
     }

     public function registrar(){
        echo view('registrar');
     }


     public function cadastrados(){
        $organizadorModel = new OrganizadorModel();


        $organizador = $this->organizadoresModel->findAll();

        $variaveis = [
            'organizadores' => $organizador
        ];

        echo view('cadastrados', $variaveis );
     }
}