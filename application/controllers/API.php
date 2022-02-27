<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * ***************Ajax.php**********************************
 * @type            : Class
 * @class name      : Ajax
 * @description     : This class used to handle ajax call from view file 
 *                    of whole application.  
 * ********************************************************** */

class Api extends CI_Controller {
   
    function index(){
        echo strtotime( "+7 day" );
    }

    function activateSoftware(){
        if(isset($_POST['license_key'])){
            // $license_key = $_POST['license_key'];  TODO: //make use of it
            $response['status'] = 1;
            $response['message'] = 'Software Activated Successfully';
            $response['validity'] = strtotime( "+14 day" );
            $response['activation_key'] = strtotime( "+7 day" );
        }else{
            $response['status'] = 0;
            $response['message'] = 'Invalid License Key';
            $response['validity'] = 0;
        }
        echo json_encode($response);
    }
}