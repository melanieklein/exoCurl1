<?php
	class Membre extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if( $this->session->userdata('logged_in') && $this->uri->segment(2) != "disconnect"){
				redirect('lien/');
			}
		}
		public function index()
		{
			$this->load->helper('form');

			$dataLayout['titre'] = 'Share your links !';
			$dataLayout['vue'] = $this->load->view('member_login',array(),true);
			$this->load->view('layout', $dataLayout);
		}
	
		public function login()
		{
			$email = $this->input->post('email');
			$mdp = $this->input->post('mdp');
			$dataUser = array(
				'email' => $email,
				'mdp' => $mdp,
				);

			$this->load->model('M_Membre');
			$res = $this->M_Membre->verifier($dataUser);
		
			if($res){
				$this->session->set_userdata('logged_in',true);
				$this->session->set_userdata('email', $this->input->post('email'));
				$this->session->set_userdata('pseudo', $res[0]['nom']);
				redirect('lien/');
			}
			else
			{
				$this->load->helper('form');
				$this->load->model('M_Membre');

				$this->session->set_userdata('logged_in',false);
				redirect('membre/index');
			}
		}

		public function registration() {
			$this->load->helper('form');
			$this->load->model('M_Membre');

			$dataLayout['titre'] = 'Share your links !';
			$dataLayout['vue'] = $this->load->view('inscription',array(),true);
			$this->load->view('layout', $dataLayout);
		}

		public function signin()
		{
			$this->load->helper('form');
			$this->load->model('M_Membre');
			$this->load->helper('email');

			$config = array(
				'allowed_types' => 'jpg|jpeg|png|gif',
				'upload_path' => './uploads/',
				'max_size' => 7000,
				);
			$this->load->library('upload',$config);
			//$this->upload->initialize($config);
			$this->upload->do_upload();
			$image_data = $this->upload->data();

			$config = array(
				'image_library' => 'GD2',
				'source_image' => $image_data['full_path'],
				'new_image' => './uploads/thumbs/',
				'create_thumb' => true,
				'thumb_marker' => '',
				'maintain_ratio' => true,
				'width' => 150,
				'height' => 150
				);

			$this->load->library('image_lib',$config);
			$this->image_lib->resize();		

			$data['pseudo'] = $_POST['pseudo'];
			$data['email'] = $_POST['email'];
			$data['mdp'] = $_POST['mdp'];
			$data['avatar'] =  $config['source_image'];
					
			$dataFiche['membres'] = $this->M_Membre->inscrire($data);
			$name = $this->M_Membre->recupererPseudoId($data['email']);
			$data = array('email'=> $this->input->post('email'), 'logged' => true , 'name' => $name[0]->pseudo);
			$this->session->set_userdata($data);

			$dataFiche['membres'] = $this->M_Membre->afficher();

			$dataLayout['titre'] = 'Share your links !';
       	 	$dataLayout['vue'] = $this->load->view('inscriptionOk',$dataFiche, TRUE);
        	$this->load->view('layout',$dataLayout); 			
		}

		public function disconnect()
		{
			//deconnecter
			
			$this->session->sess_destroy();
			redirect('membre/index');
		}
}

