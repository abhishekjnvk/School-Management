<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Welcome.php**********************************
 * @type            : Class
 * @class name      : Welcome
 * @description     : This is default class of the application.  
	
 * ********************************************************** */

class Welcome extends CI_Controller {
    /*     * **************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : this function load login view page            
     * @param           : null; 
     * @return          : null 
     * ********************************************************** */
    public $global_setting = array();
    public function index() {

        //get key from header
        $loginDevice=$this->input->get_request_header('loginDevice');
        if(!$loginDevice) $loginDevice="desktop";
        // $activation_key=$this->input->get_request_header('activation_key')||"1222";
        // echo $activation_key;
        if(!empty($loginDevice)){
            if (logged_in_user_id()) {
                redirect('dashboard');
            }
            $this->global_setting = $this->db->get_where('global_setting', array('status'=>1))->row();

            if(!empty($this->global_setting) && $this->global_setting->language){             
                $this->lang->load($this->global_setting->language);             
            }else{
            $this->lang->load('english');
            }
            $this->load->view('login');            
        }else{
            if(empty($loginDevice)){
                echo "Login Through Website is Disabled";
            }
            // if(empty($activation_key)){
            //     echo "Activation Key is Missing";
            // }
        }
    }
}