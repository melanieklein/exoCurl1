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
				$this->session->set_userdata('logged_in',false);
				redirect('membre/index');
			}
		}

		public function disconnect()
		{
			//deconnecter
			
			$this->session->sess_destroy();
			redirect('membre/index');
		}
}

