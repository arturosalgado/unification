<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
        function index(){
            $data = $this->base->getBaseArray();
            $this->load->view("header_home", $data);
            $this->load->view("login", $data);
            $this->load->view("footer_home");
        }
        
        function validate(){
             $user = $_POST['user'];
             $passwd = $_POST['passwd'];
             $query = $this->db->query("SELECT * FROM usuario WHERE username ='$user' AND passwd ='$passwd'");
             if($query->num_rows()>0){
                $array = $query->result_array();
                $this->session->set_userdata($array[0]);
                redirect('dashboard');
             }
             else
                redirect('login/denied');
        }
        
        function denied(){
            $data = $this->base->getBaseArray();
            $this->load->view("header", $data);
            $this->load->view("denied", $data);
            $this->load->view("footer");
        }

        function logout(){
            $this->session->unset_userdata();
            $this->session->sess_destroy();
            redirect('login');
        }
    }  
?>
