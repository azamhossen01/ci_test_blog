<?php 
class Admin_ctrl extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Article','article');
        if($this->session->userdata('id') == null){
            redirect('login_ctrl');
        }
    }

    public function index(){
        
        $this->load->library('pagination');
        $config = [
            'base_url' => base_url('admin_ctrl/index'),
            'per_page' => 2,
            'total_rows' => $this->article->num_rows('articles'),
            'full_tag_open' => "<ul class='pagination'>",
            'full_tag_close' => "</ul>",
            'next_tag_open' => "<li>",
            'next_tag_close' => "</li>",
            'prev_tag_open' => "<li>",
            'prev_tag_close' => "</li>",
            'num_tag_open' => "<li>",
            'num_tag_close' => "</li>",
            'cur_tag_open' => "<li class='active'><a>",
            'cur_tag_open' => "</a><li>"

        ];
        $this->pagination->initialize($config);
        $data = $this->article->article_list('articles',$config['per_page'],$this->uri->segment(3));
        $this->load->view('admin/dashboard',compact('data'));
    }

    public function create(){
        $this->load->view('admin/article/create');
    }

    public function store(){
        if($this->form_validation->run('add_article_rules')){
            $data = $this->input->post();
            $result = $this->article->store_data('articles',$data);
            $this->_flashAndRedirect($result,'Article added successfully','Article add fail'); 
        }else{
            $this->load->view('admin/article/create');
        }
        
    }

    public function edit($id){
        if($this->input->method() == 'post'){
            if($this->form_validation->run('add_article_rules')){
                $data = $this->input->post();
                $result = $this->article->update_data('articles',$data,['id'=>$id]);  
                $this->_flashAndRedirect($result,'Article updated successfully','Article update failed'); 
            }else{
                redirect('admin_ctrl/edit/'.$id);
            }      
        }else{
            $article = $this->article->get_data('articles',['id'=>$id]);
            $this->load->view('admin/article/edit',compact('article'));
        }
    }

    public function delete($id){
        $result = $this->article->delete_data('articles',['id'=>$id]);
        $this->_flashAndRedirect($result,'Article deleted successfully','Article deleted failed');
    }


    public function logout(){
        $this->session->unset_userdata('id','user_id','username','email','name');
        redirect('login_ctrl');
    }

    private function _flashAndRedirect($success,$successMessage,$failuremessage){
        if($success){
            $this->session->set_flashdata('success',$successMessage);
        }else{
            $this->session->set_flashdata('error',$failuremessage);
        }
        redirect('admin_ctrl');
    }
}
?>