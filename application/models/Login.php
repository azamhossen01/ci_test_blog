<?php 
class Login extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function login($email,$password){
        
        $row = $this->db->where('email',$email)->get('users')->row();
        
        if($row){
            
            $pass = $this->db->where('password',$password)->where('email',$email)->get('users')->row();
               
            if($pass){
                
                $session_data = array(
                    'id' => $pass->id,
                    'username' => $pass->username,
                    'email' => $pass->email,
                    'name' => $pass->name 
                );
                $this->session->set_userdata($session_data);
            }else{
                return 'pass_error';
            }
        }else{
            return 'email_error';
        }
    }
}

?>