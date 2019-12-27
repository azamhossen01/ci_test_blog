<?php
class Login_ctrl extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Login','login');
        if($this->session->userdata('id') !== null){
            redirect('admin_ctrl');
        }
    }
    public function index(){
        
        if($this->input->method() == 'post'){
            
            // $this->form_validation->set_rules('email','Email','required|valid_email|trim');
            // $this->form_validation->set_rules('password','Password','required|trim');
            if($this->form_validation->run('login_rules')){
                $email = $this->input->post('email');
                $password = md5($this->input->post('password'));
                $result = $this->login->login($email,$password);
                
                if($result == 'pass_error'){
                    $this->session->set_flashdata('error','Password Does Not Match');
                    $this->load->view('admin/login');
                   
                    // redirect('login_ctrl');
                }elseif($result == 'email_error'){
                    $this->session->set_flashdata('error','Email Does Not Match');
                    $this->load->view('admin/login');
                    // redirect('login_ctrl');
                    // echo 'email';
                }else{
                    redirect('admin_ctrl');
                }
            }else{
                $this->load->view('admin/login');
            }
        }else{
            
            $this->load->view('admin/login');
        }
        
    }
}

?>