<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_gallery extends CI_Controller {
    
    function __construct() {
        parent::__construct();
		
		// Load image model
		$this->load->model('image');
		
		$this->load->helper('form');
        $this->load->library('form_validation');
		
		// Default controller name
		$this->controller = 'manage_gallery';
		
		// File upload path
		$this->uploadPath = 'uploads/images/';
    }
    
    public function index(){
        $data = array();
        
        // získá zprávu ze session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        $data['gallery'] = $this->image->getRows();
        $data['title'] = 'Galerie';
        
        //načte potřebné views
        $this->load->view('templates/header', $data);
        $this->load->view($this->controller.'/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function view($id){
        $data = array();
        
        // Zkontrolujte, zda id není prázdné
        if(!empty($id)){
			$con = array('id' => $id);
            $data['image'] = $this->image->getRows($con);
            $data['title'] = $data['image']['title'];
            
            //načte view 
            $this->load->view('templates/header', $data);
            $this->load->view($this->controller.'/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect($this->controller);
        }
    }
    
    public function add(){
        $data = $imgData = array();
		$error = '';
        
        // Je-li podána žádost o přidání
        if($this->input->post('imgSubmit')){
            // Pravidla pro validaci polí formuláře
            $this->form_validation->set_rules('title', 'image title', 'required');
			$this->form_validation->set_rules('image', 'image file', 'callback_file_check');
            
            // Připraví data z galerie
            $imgData = array(
                'title' => $this->input->post('title')
            );
            
            // Ověřit data odeslaného formuláře
            if($this->form_validation->run() == true){
				// Nahraje obrázek na server
				if(!empty($_FILES['image']['name'])){
					$imageName = $_FILES['image']['name'];
					
					// Povolí přípony obrázků
					$config['upload_path'] = $this->uploadPath;
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					
					// Načtení a inicializace knihovny pro nahrávání
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					
					// Nahraje fotky do image
					if($this->upload->do_upload('image')){
						
						$fileData = $this->upload->data();
						$imgData['file_name'] = $fileData['file_name'];
					}else{
						$error = $this->upload->display_errors(); 
					}
				}
				
				if(empty($error)){
					// Vloží fotky a vypíše oznámení
					$insert = $this->image->insert($imgData);
					
					if($insert){
						$this->session->set_userdata('success_msg', 'Obrázek byl úspěšně nahrán.');
						redirect($this->controller);
					}else{
						$error = 'Vyskytly se nějaké problémy, zkuste to prosím znovu.';
					}
				}
				
				$data['error_msg'] = $error;
            }
        }
        
        $data['image'] = $imgData;
        $data['title'] = 'Nahrání fotky';
        $data['action'] = 'Upload';
        
        // Načte view pro přidání fotky
        $this->load->view('templates/header', $data);
        $this->load->view($this->controller.'/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    public function edit($id){
        $data = $imgData = array();
        
        // Zjíská data z image
		$con = array('id' => $id);
        $imgData = $this->image->getRows($con);
		$prevImage = $imgData['file_name'];
        
        // Je-li podána žádost o aktualizaci
        if($this->input->post('imgSubmit')){
            // Form field validation rules
            $this->form_validation->set_rules('title', 'gallery title', 'required');
            
            // Připraví galerii
            $imgData = array(
                'title' => $this->input->post('title')
            );
            
            // Ověřit data odeslaného formuláře
            if($this->form_validation->run() == true){
				// Nahraje fotky na server
				if(!empty($_FILES['image']['name'])){
					$imageName = $_FILES['image']['name'];
					
					// Povolené přípony
					$config['upload_path'] = $this->uploadPath;
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					
					// Load and initialize upload library
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					
					// Nahraje fotku na server
					if($this->upload->do_upload('image')){
						
						$fileData = $this->upload->data();
						$imgData['file_name'] = $fileData['file_name'];
						
						// Odstraní předešlou fotku 
						if(!empty($prevImage)){
							@unlink($this->uploadPath.$prevImage); 
						}
					}else{
						$error = $this->upload->display_errors(); 
					}
				}
				
				if(empty($error)){
					// Vypíše oznámení
					$update = $this->image->update($imgData, $id);
					
					if($update){
						$this->session->set_userdata('success_msg', 'Fotka byla úspěšně aktualizována.');
						redirect($this->controller);
					}else{
						$error = 'Vyskytl se nějaký problém, zkuste to prosím znovu.';
					}
				}
				
				$data['error_msg'] = $error;
            }
        }

        
        $data['image'] = $imgData;
        $data['title'] = 'Upravit fotku';
        $data['action'] = 'Edit';
        
        // Load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view($this->controller.'/add-edit', $data);
        $this->load->view('templates/footer');
    }
	
	public function block($id){
        // Zjistí, jestli hodnota ID není prázná
        if($id){
            // Upraví stav fotky
			$data = array('status' => 0);
            $update = $this->image->update($data, $id);
            
            if($update){
                $this->session->set_userdata('success_msg', 'Fotka byla úspěšně zablokována.');
            }else{
                $this->session->set_userdata('error_msg', 'Vyskytl se nějaký problém, zkuste to prosím znovu.');
            }
        }

        redirect($this->controller);
    }
	
	public function unblock($id){
        // Zjistí, jestli hodnota ID není prázná
        if($id){
            // Upraví stav fotky
			$data = array('status' => 1);
            $update = $this->image->update($data, $id);
            
            if($update){
                $this->session->set_userdata('success_msg', 'Fotka byla úspěšně odblokována.');
            }else{
                $this->session->set_userdata('error_msg', 'Vyskytl se nějaký problém, zkuste to prosím znovu.');
            }
        }

        redirect($this->controller);
    }
    
    public function delete($id){
        // Zjistí, jestli hodnota ID není prázná
        if($id){
			$con = array('id' => $id);
			$imgData = $this->image->getRows($con);
			
            // Smaže fotku z databáze
            $delete = $this->image->delete($id);
            
            if($delete){
				
				if(!empty($imgData['file_name'])){
					@unlink($this->uploadPath.$imgData['file_name']); 
				} 
				
                $this->session->set_userdata('success_msg', 'Fotka byla úspěšně odstraněna');
            }else{
                $this->session->set_userdata('error_msg', 'Vyskytl se nějaký problém, zkuste to prosím znovu.');
            }
        }

        redirect($this->controller);
    }
	
	public function file_check($str){
		if(empty($_FILES['image']['name'])){
			$this->form_validation->set_message('file_check', 'Vyberte fotku pro nahrání.');
			return FALSE;
		}else{
			return TRUE;
		}
	}
}
?>