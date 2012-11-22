<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lien extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/lien
	 *	- or -  
	 * 		http://example.com/index.php/lien/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/lien/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('logged_in'))
		{
			redirect('membre');
		}	
	}

	public function index()
	{
		$this->load->helper('form');
		$this->ajouter();
	}

	public function ajouter() {
		$dataLayout['titre'] = 'Share your links';
		$dataLayout['vue'] = $this->load->view('ajouter', array(), TRUE);
		$this->load->view('layout', $dataLayout);
	}

	public function choisir() {

		$this->load->helper('form');
		$ch = curl_init();

            curl_setopt($ch,CURLOPT_HEADER,0);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_URL, $this->input->post('champ'));
            curl_setopt($ch,CURLOPT_FOLLOWLOCATION, 1);

            $html = curl_exec($ch);

            curl_close($ch);
            
            $html = utf8_decode($html);
            $dom = new DOMDocument();
            @$dom->loadHTML($html);
            
            $dataLayout['url'] = $this->input->post('champ');
            
            $nodes = $dom->getElementsByTagName("title");
            $dataLayout['titreSite'] = $nodes->item(0)->nodeValue;
          

            $nodes = $dom->getElementsByTagName("meta");
            
         

            foreach($nodes as $node){
                if(strtolower($node->getAttribute("name"))=="description")
                {
                    $dataLayout['description'] =  $node->getAttribute("content");
                break;
                }               
                else 
                {
                	$dataLayout['description'] = 'Description indisponible';	
               }
            }

            $nodes = $dom->getElementsByTagName("img");
            foreach($nodes as $node){
                $dataLayout['lienImg'][] = $node->getAttribute("src");
            }

            $dataLayout['titre'] = "Share your links";
            $dataLayout['vue'] = $this->load->view('choisir',$dataLayout, TRUE);
            $this->load->view('layout',$dataLayout);   
	}

	public function ajouterDB() {
	$this->load->model('M_Afficher');

	$data = array(
		         		'titre' => $this->input->post('titre'),
						'description' => $this->input->post('description'),
						'url' => $this->input->post('url'),
						'url_img' => $this->input->post('img')
         			);

	$this->M_Afficher->ajouter($data);
	redirect('lien/afficher');
	}

	public function afficher() {
		
		$this->load->model('M_Afficher');

		$dataFiche['liens'] = $this->M_Afficher->afficher();

		$dataLayout['titre'] = "Share your links";
        $dataLayout['vue'] = $this->load->view('afficher',$dataFiche, TRUE);
        $this->load->view('layout',$dataLayout); 	
	}

	public function supprimer(){

		$this->load->model('M_Afficher');

		$this->M_Afficher->supprimer($this->uri->segment(3));

		$this->afficher();
	}

	public function modifier()
	{
		$this->load->model('M_Afficher');
		$this->load->helper('form');

		

		$dataList['unLien'] = $this->M_Afficher->modifier($this->uri->segment(3));
		
		$dataLayout['titre'] = "Share your links";
        $dataLayout['vue'] = $this->load->view('modifier',$dataList, TRUE);
        $this->load->view('layout',$dataLayout); 
	}

	public function modifierDB(){
		$this->load->model('M_Afficher');

		$data = array(
		         		'titre' => $this->input->post('titre'),
						'description' => $this->input->post('description'),
						'url' => $this->input->post('url'),
						'url_img' => $this->input->post('img')
         			);
		$id = $this->input->post('id');

		$this->M_Afficher->modifierDB($id,$data);
		redirect('lien/afficher');
	}
}

/* End of file lien.php */
/* Location: ./application/controllers/lien.php */