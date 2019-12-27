<?php 
class Public_ctrl extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->load->view('public/article_list');
    }
}
?>