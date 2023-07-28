<?php

namespace App\Controllers;

use App\Models\AdmModel;
use CodeIgniter\Controller;
use App\Models\Product_model;
use App\Models\UsuarioModel;

class Product extends BaseController
{
    //====================================================================================================
    public function index()
    {

        // if user not logged in
        if (!session()->get('logged_in')) {
            // then redirct to login page
            return redirect()->to('/product/login');
        }

        $session = session();
        $admin = $session->get('nome');
        $data['admin'] = $admin;
        $data['products'] = $this->getAllProduct();


        $model = new Product_model();
        $data['product']  = $model->getProduct()->getResult();
        $data['category'] = $model->getCategory()->getResult();
        echo view('product_view', $data);
    }



    //====================================================================================================
    public function save()
    {


        $file = $this->request->getFile('imagem');

        if ($file->isValid() && !$file->hasMoved()) {

            $imageName = $file->getRandomName();
            $file->move('assets/uploads/', $imageName);
            
        }


        $model = new Product_model();
        $data = array(
            'product_name'        => $this->request->getPost('product_name'),
            'product_price'       => $this->request->getPost('product_price'),
            'product_category_id' => $this->request->getPost('product_category'),
            'datetime_created' => $this->request->getPost('datetime_created'),
            'complemento' => $this->request->getPost('complemento'),
            'imagem' => $imageName

        );
        $model->saveProduct($data);
        return redirect()->to('/product');
    }
    //====================================================================================================
    public function update()
    {
        $model = new Product_model();
        $id = $this->request->getPost('product_id');
        $data = array(
            'product_name'        => $this->request->getPost('product_name'),
            'product_price'       => $this->request->getPost('product_price'),
            'product_category_id' => $this->request->getPost('product_category'),
            'complemento' => $this->request->getPost('complemento')
        );
        $model->updateProduct($data, $id);
        return redirect()->to('/product');
    }
    //====================================================================================================
    public function delete()
    {
        $model = new Product_model();
        $id = $this->request->getPost('product_id');
        $model->deleteProduct($id);
        return redirect()->to('/product');
    }




    //====================================================================================================
    public function finish()
    {
        $session = session();
        $admin = $session->get('nome');


        $model = new Product_model();
        $id = $this->request->getPost('product_id');

        $comentario_adm = $this->request->getPost('comentario_adm');
        $model->finishProduct($id, $admin, $comentario_adm);
        return redirect()->to('/product');
    }


    //====================================================================================================
    public function Negate()
    {
        $session = session();
        $admin = $session->get('nome');


        $model = new Product_model();
        $id = $this->request->getPost('product_id');
        
        $comentario_adm = $this->request->getPost('comentario_adm');
        $model->finishNegate($id, $admin, $comentario_adm);
        return redirect()->to('/product');
    }


    
    //====================================================================================================
    private function getAllProduct()
    {

        $db = db_connect();
        $dados = $db->query("SELECT * FROM product")->getResultObject();
        $db->close();

        return $dados;
    }
    //====================================================================================================
    public function productdone($product_id = -1)
    {
        $params = [
            'product_id' => $product_id
        ];

        $db = db_connect();
        $db->query("
        UPDATE product SET finished = NOW() WHERE product_id = :product_id:
        ", $params);
        $db->close();

        return redirect()->to(site_url('product'));
    }



    //====================================================================================================
    public function login()
    {
        $data = [];
        if (session()->has('success')) {

            $data['success'] = session('success');
        }


        helper('form');
        return view("login", $data);
    }



    //====================================================================================================

    public function auth()
    {
        $session = session();
        $model = new AdmModel();

        $nomear = $this->request->getVar('nomear');
        $senhar = $this->request->getVar('senhar');
        $data = $model->where('email', $nomear)->first();



        $modelUser = new UsuarioModel();
        $dados = $modelUser->where('email', $nomear)->first();


        if ($data) {
            $pass = $data['senha'];
            $verify_pass = $senhar == $pass;
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'nome'     => $data['nome'],
                    'email'    => $data['email'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/product/home');
            } else {
                $session->setFlashdata('msg', 'senha incorreta');
                return redirect()->to('/product/login');
            }
        } elseif ($dados) {
            $pass = $dados['senha'];
            $verify_pass = $senhar == $pass;

            if ($verify_pass) {
                $ses_data = [
                    'id'       => $dados['id'],
                    'nome'     => $dados['nome'],
                    'email'    => $dados['email'],
                    'turma'    => $dados['turma'],
                    'senha'    => $dados['senha'],
                    'userlogged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/product/homeUsuario');
            } else {
                $session->setFlashdata('msg', 'senha incorreta');
                return redirect()->to('/product/login');
            }
        } else {
            $session->setFlashdata('msg', 'Usuario não encontrado');
            return redirect()->to('/product/login');
        }
    }



    //====================================================================================================

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/product/login');
    }


    //====================================================================================================

    public function submissao()
    {


        //verificar se houve submissao de formulario
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(site_url('Product/registrarAluno'));
        }

        $data['administracao'] = $this->getAllAdm();

        $model = new Product_model();
        $data['administradores']  = $model->getAdm()->getResult();

        //validação 
        $validacao = $this->validate([
            'nome' => 'required|is_unique[alunos.nome,id,{id}]|is_unique[administradores.nome,id,{id}]',
            'senha' => 'required',
            'email' => 'required|is_unique[alunos.email,id,{id}]|is_unique[administradores.email,id,{id}]',
            'turma' => 'required'
        ]);


        if (!$validacao) {
            //erro na validacao 
            return redirect()->back()->withInput()->with('erro', $this->validator);
        } else {
            //sucesso na validacao 

            $model = new Product_model();
            $data = array(
                'nome'        => $this->request->getPost('nome'),
                'email'       => $this->request->getPost('email'),
                'senha' => $this->request->getPost('senha'),
                'turma' => $this->request->getPost('turma')

            );
            $model->saveAluno($data);


            return redirect()->to('/product/login')->with('success', $this->validator);
        }
    }



    //====================================================================================================

    public function home()
    {

        // if user not logged in
        if (!session()->get('logged_in')) {
            // then redirct to login page
            return redirect()->to('/product/login');
        }

        $session = session();
        $admin = $session->get('nome');
        $informacoes['admin'] = $admin;


        $db = db_connect();
        $datetime = $db->query("SELECT * FROM product
        WHERE product_id = (SELECT max(product_id) FROM product)")->getResult();
        $db->close();



        $informacoes['products'] = $this->getAllProduct();

        $model = new Product_model();
        $informacoes['product']  = $model->getProduct()->getResult();
        $informacoes['aluno']  = $model->getAluno()->getResult();
        $informacoes['admins']  = $model->getAdm()->getResult();
        $informacoes['lastDate']  = $model->getLastdate()->getResult();
        $informacoes['unfinished'] = $model->getFinished()->getResult();
        $informacoes['datetime'] = $datetime;





        return view("home", $informacoes);
    }









    //====================================================================================================

    public function adm()
    {


        // if user not logged in
        if (!session()->get('logged_in')) {
            // then redirct to login page
            return redirect()->to('/product/login');
        }


        $data['administracao'] = $this->getAllAdm();

        $model = new Product_model();
        $data['administradores']  = $model->getAdm()->getResult();

        echo view('administradores_view', $data);
    }

    //====================================================================================================
    private function getAllAdm()
    {

        $db = db_connect();
        $dados = $db->query("SELECT * FROM administradores")->getResultObject();
        $db->close();

        return $dados;
    }


    //====================================================================================================


    public function saveAdm()
    {


        $model = new Product_model();
        $data = array(
            'nome'        => $this->request->getPost('nome'),
            'email'       => $this->request->getPost('email'),
            'senha' => $this->request->getPost('senha'),

        );
        $model->saveAdministradores($data);
        return redirect()->to('/product/adm');
    }

    //====================================================================================================
    public function deleteAdm()
    {
        $model = new Product_model();
        $id = $this->request->getPost('id');
        $model->deleteAdministradores($id);
        return redirect()->to('/product/adm');
    }


    //====================================================================================================
    public function updateAdm()
    {
        $model = new Product_model();
        $id = $this->request->getPost('id');
        $data = array(
            'nome'        => $this->request->getPost('nome'),
            'email'       => $this->request->getPost('email'),
            'senha' => $this->request->getPost('senha'),

        );
        $model->updateAdministradores($data, $id);
        return redirect()->to('/product/adm');
    }


    //====================================================================================================


    public function registrarAluno()
    {


        $data = [];
        if (session()->has('erro')) {

            $data['erro'] = session('erro');
        }
        helper('form');
        return view('registrarAluno', $data);
    }





    //====================================================================================================
    private function getAllAluno()
    {

        $db = db_connect();
        $dados = $db->query("SELECT * FROM alunos")->getResultObject();
        $db->close();

        return $dados;
    }




    //====================================================================================================

    public function Alunos_cadastrados()
    {


        // if user not logged in
        if (!session()->get('logged_in')) {
            // then redirct to login page
            return redirect()->to('/product/login');
        }


        $data['alunos'] = $this->getAllAluno();

        $model = new Product_model();


        $data['alunos']  = $model->getAluno()->getResult();

        echo view('alunos_view', $data);
    }



    //====================================================================================================


    public function saveAlunos()
    {


        $model = new Product_model();
        $data = array(
            'nome'        => $this->request->getPost('nome'),
            'email'       => $this->request->getPost('email'),
            'senha' => $this->request->getPost('senha'),
            'turma' => $this->request->getPost('turma')

        );
        $model->saveAluno($data);
        return redirect()->to('/product/Alunos_cadastrados');
    }

    //====================================================================================================
    public function deleteAlunos()
    {
        $model = new Product_model();
        $id = $this->request->getPost('id');
        $model->deleteAluno($id);
        return redirect()->to('/product/Alunos_cadastrados');
    }


    //====================================================================================================
    public function updateAlunos()
    {
        $model = new Product_model();
        $id = $this->request->getPost('id');
        $data = array(
            'nome'        => $this->request->getPost('nome'),
            'email'       => $this->request->getPost('email'),
            'senha' => $this->request->getPost('senha'),
            'turma' => $this->request->getPost('turma')

        );
        $model->updateAluno($data, $id);
        return redirect()->to('/product/Alunos_cadastrados');
    }

    //====================================================================================================
    public function updateAlunosUsuario()
    {
        $model = new Product_model();
        $id = $this->request->getPost('id');
        $data = array(
            'nome'        => $this->request->getPost('nome'),
            'email'       => $this->request->getPost('email'),
            'senha' => $this->request->getPost('senha'),
            'turma' => $this->request->getPost('turma')

        );
        $model->updateAluno($data, $id);
        return redirect()->to('/product/HomeUsuario');
    }

    //====================================================================================================
    public function usuarios()
    {





        // if user not logged in
        if (!session()->get('userlogged_in')) {
            // then redirct to login page
            return redirect()->to('/product/login');
        }



        $session = session();
        $usuarioID = $session->get('id');
        $usuarioAlunoID = $session->get('id');
        $usuario = $session->get('nome');
        $usuarioEmail = $session->get('email');
        $usuarioturma = $session->get('turma');
        $usuarioSenha = $session->get('senha');


        $dados['usuario'] = $usuario;
        $dados['usuarioID'] = $usuarioID;
        $dados['usuarioAlunoID'] = $usuarioAlunoID;
        $dados['usuarioEmail'] = $usuarioEmail;
        $dados['usuarioSenha'] = $usuarioSenha;
        $dados['usuarioturma'] = $usuarioturma;
        $dados['products'] = $this->getAllProduct();


        $db = db_connect();
        $da = $db->query("SELECT * FROM `product` WHERE `product_name` LIKE '$usuario'")->getResultObject();
        $db->close();

        $dados['usuarios'] = $da;


        $model = new Product_model();
        $dados['product']  = $model->getProduct()->getResult();
        $dados['category'] = $model->getCategory()->getResult();





        echo view('usuarios_view', $dados);
    }


    //====================================================================================================
    //====================================================================================================
    public function saveOfUser()
    {


        $file = $this->request->getFile('imagem');

        if ($file->isValid() && !$file->hasMoved()) {

            $imageName = $file->getRandomName();
            $file->move('assets/uploads/', $imageName);
            
        }


        $model = new Product_model();


        if(isset($imageName)){
        $data = array(
            'product_name'        => $this->request->getPost('product_name'),
            'product_price'       => $this->request->getPost('product_price'),
            'product_category_id' => $this->request->getPost('product_category'),
            'datetime_created' => $this->request->getPost('datetime_created'),
            'complemento' => $this->request->getPost('complemento'),
            'imagem' => $imageName

        );
    }else{
        $data = array(
            'product_name'        => $this->request->getPost('product_name'),
            'product_price'       => $this->request->getPost('product_price'),
            'product_category_id' => $this->request->getPost('product_category'),
            'datetime_created' => $this->request->getPost('datetime_created'),
            'complemento' => $this->request->getPost('complemento')
            

        ); 
    }

        $model->saveProduct($data);
        return redirect()->to('/product/usuarios');
    }

    
    //====================================================================================================
    public function updateOfUser()
    {

        $model = new Product_model();
        $id = $this->request->getPost('product_id');
        $file = $this->request->getFile('imagem');
        $old_img_name = $this->request->getPost('imagemAntiga');
       

        if ($file->isValid() && !$file->hasMoved()) {

            if(strlen($old_img_name) > 0){

            if(file_exists('assets/uploads/'.$old_img_name)){
                unlink('assets/uploads/'.$old_img_name);
            }

        }
            $imageName = $file->getRandomName();
            $file->move('assets/uploads/', $imageName);
        }else{

            $imageName = $old_img_name;
        }




        if(isset($imageName)){
        $data = array(
            'product_name'        => $this->request->getPost('product_name'),
            'product_price'       => $this->request->getPost('product_price'),
            'product_category_id' => $this->request->getPost('product_category'),
            'datetime_created' => $this->request->getPost('datetime_created'),
            'complemento' => $this->request->getPost('complemento'),
            'imagem' => $imageName

        );
    }else{
        $data = array(
            'product_name'        => $this->request->getPost('product_name'),
            'product_price'       => $this->request->getPost('product_price'),
            'product_category_id' => $this->request->getPost('product_category'),
            'datetime_created' => $this->request->getPost('datetime_created'),
            'complemento' => $this->request->getPost('complemento')
            

        ); 
    }
        $model->updateProduct($data, $id);
        return redirect()->to('/product/usuarios');
    }
    //====================================================================================================
    public function deleteOfUser()
    {
        $model = new Product_model();
        $id = $this->request->getPost('product_id');
        $model->deleteProduct($id);
        $file = $this->request->getFile('imagem');
        $old_img_name = $this->request->getPost('imagemAntigaDelet');

        
      

           if(strlen($old_img_name) > 0){

            if(file_exists('assets/uploads/'.$old_img_name )){
                unlink('assets/uploads/'.$old_img_name);
            }

      
        }


        return redirect()->to('/product/usuarios');
    }


    //====================================================================================================

    public function homeUsuario()
    {


        // if user not logged in
        if (!session()->get('userlogged_in')) {
            // then redirct to login page
            return redirect()->to('/product/login');
        }

        $session = session();
        $usuarioID = $session->get('id');
        $usuarioAlunoID = $session->get('id');
        $usuario = $session->get('nome');
        $usuarioEmail = $session->get('email');
        $usuarioturma = $session->get('turma');
        $usuarioSenha = $session->get('senha');


        $dados['usuario'] = $usuario;
        $dados['usuarioID'] = $usuarioID;
        $dados['usuarioAlunoID'] = $usuarioAlunoID;
        $dados['usuarioEmail'] = $usuarioEmail;
        $dados['usuarioSenha'] = $usuarioSenha;
        $dados['usuarioturma'] = $usuarioturma;
        $dados['products'] = $this->getAllProduct();



        $db = db_connect();
        $da = $db->query("SELECT * FROM `product` WHERE `product_name` LIKE '$usuario'")->getResultObject();
        $db->close();

        $dados['usuarios'] = $da;


        $model = new Product_model();
        $dados['product']  = $model->getProduct()->getResult();
        $dados['category'] = $model->getCategory()->getResult();






        return view("homeUsuario", $dados);
    }
}
