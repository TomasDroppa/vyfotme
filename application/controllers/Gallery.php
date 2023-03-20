<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Gallery extends CI_Controller {
        
        function __construct() {
            parent::__construct();
            
            // Load image model
            $this->load->model('image');

            // Default controller name
            $this->controller = 'gallery';
        }
        
        public function index(){
            $data = array();
            
            $con = array(
                'where'=> array(
                    'status' => 1
                )
            );
            $data['gallery'] = $this->image->getRows($con);

            $data['title'] = 'Stranka';
        
            // Load the list page view
            $this->load->view('templates/header', $data);

            $this->load->view('gallery/index', $data);

            $this->load->view('templates/footer');
        }

    }

?>

