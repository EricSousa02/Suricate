<?php namespace App\Models;

use CodeIgniter\Model;

class Product_model extends Model
{
    
    public function getCategory()
    {
        $builder = $this->db->table('category');
        return $builder->get();
    }

    public function getProduct()
    {
        $builder = $this->db->table('product');
        $builder->select('*');
        $builder->join('category', 'category_id = product_category_id','left');
        return $builder->get();
    }

    public function saveProduct($data){
        $query = $this->db->table('product')->insert($data);
        return $query;
    }

    public function updateProduct($data, $id)
    {
        $query = $this->db->table('product')->update($data, array('product_id' => $id));
        return $query;
    }

    public function deleteProduct($id)
    {
        $query = $this->db->table('product')->delete(array('product_id' => $id));
        return $query;
    } 


    public function finishProduct($id,$admin,$comentario_adm)
    {

        $params = [
            'product_id' => $id,
            'admin' => $admin,
            'comentario_adm' => $comentario_adm

        ];

        $db = db_connect();
        $query = $this->db->query("
        UPDATE product SET finished = NOW(), status = 'finalizado', visualizado_por = :admin: , comentario_adm = :comentario_adm: WHERE product_id = :product_id:
        ",$params);

        $db->close();
        return $query;
    } 



    public function finishNegate($id,$admin,$comentario_adm)
    {

        $params = [
            'product_id' => $id,
            'admin' => $admin,
            'comentario_adm' => $comentario_adm

        ];

        $db = db_connect();
        $query = $this->db->query("
        UPDATE product SET finished = NOW(), status = 'recusado', visualizado_por = :admin:, comentario_adm = :comentario_adm: WHERE product_id = :product_id:
        ",$params);

        $db->close();
        return $query;
    } 



    public function getFinished(){
        $db = db_connect();
        $query = $this->db->query("
        SELECT finished FROM product WHERE finished IS NULL");
        $db->close();  

        return $query;
    }



    public function getStatus(){
        $db = db_connect();
        $query = $this->db->query("
        SELECT status FROM product");
        $db->close();  

        return $query;
    }





//====================================================================================================
    public function getAdm()
    {
        $builder = $this->db->table('administradores');
        $builder->select('*');
       
        return $builder->get();
    }


    public function saveAdministradores($data){
        $query = $this->db->table('administradores')->insert($data);
        return $query;
    }



    public function deleteAdministradores($id)
    {
        $query = $this->db->table('administradores')->delete(array('id' => $id));
        return $query;
    } 



    public function updateAdministradores($data, $id)
    {
        $query = $this->db->table('administradores')->update($data, array('id' => $id));
        return $query;
    }




    //====================================================================================================
    public function getAluno()
    {
        $builder = $this->db->table('alunos');
        $builder->select('*');
    
        return $builder->get();
    }


    public function saveAluno($data){
        $query = $this->db->table('alunos')->insert($data);
        return $query;
    }



    public function deleteAluno($id)
    {
        $query = $this->db->table('alunos')->delete(array('id' => $id));
        return $query;
    } 



    public function updateAluno($data, $id)
    {
        $query = $this->db->table('alunos')->update($data, array('id' => $id));
        return $query;
    }


    public function getLastdate(){
        $db = db_connect();
        $query = $this->db->query("
        SELECT datetime_created FROM product
        WHERE product_id = (SELECT max(product_id) FROM product)");
        $db->close();  

        return $query;
    }
}

