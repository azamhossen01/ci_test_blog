<?php 
class Article extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function article_list($table,$limit,$offset){
        $data = $this->db->get($table,$limit,$offset)->result();
        return $data;
    }

    public function anyName($table,$field,$value,$result){
        $data = $this->db->select($result)->where($field,$value)->get($table)->row();
        return $data;
        print_r($data);die();
    }

    public function store_data($table,$data){
        $result = $this->db->insert($table,$data);
        return $result;
    }

    public function get_data($table,$where){
        $result = $this->db->where($where)->get($table)->row();
        return $result;
    }

    public function update_data($table,$data,$where){
        $query = $this->db->update($table,$data,$where);
        // $query = $this->db->where($where)->update($table,$data);
        return $query;
    }

    public function delete_data($table,$where){
        $query = $this->db->delete($table,$where);
        return $query;
    }

    public function num_rows($table){
        $result = $this->db->get($table)->num_rows();
        return $result;
    }
}


?>