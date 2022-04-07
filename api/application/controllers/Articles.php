<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Articles extends CI_Controller {
	public function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('logged_in')) {
            redirect('/', 'refresh');
        }
    }

	public function index()
	{
		$this->load->model("Articles_model");

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$db["edicao"] 		= $this->input->post("edicao");
			$db["mes"] 			= $this->input->post("mes");
			$db["titulo"] 		= $this->input->post("titulo");
			$db["link"]			= $this->input->post("link");
			$db["imagem"] 		= $this->input->post("url-imagem");
			$db["descricao"] 	= $this->input->post("descricao");
			$db["tipo"] 		= $this->input->post("tipo");
			$db["created_at"]	= date('Y-m-d');


			if(!$this->Articles_model->addArticle($db)){
				echo "erro";
			}
		}

		// ARTICLES
		$articles = $this->Articles_model->listAll();
		$data['articles'] = $articles;

		// EDITIONS
		$editions = $this->Articles_model->listAllEditions();
		$data['editions'] = $editions;

		// BANNER
		$destaque = $this->Articles_model->listLastBanner();
		$data['destaque'] = $destaque;

		// DISCLAIMER
		$disclaimer = $this->Articles_model->listLastDisclaimer();
		$data['disclaimer'] = $disclaimer;

		$this->load->view('header');
		$this->load->view('articles',$data);
		$this->load->view('footer');

	}

	public function apagar($id){
		$this->load->model("Articles_model");
		if($query = $this->Articles_model->delete($id)){
			redirect('/articles');
		}
	}

	public function preview(){

		$html = "";
		$this->load->model("Articles_model");

		// BANNER
		$destaque = $this->Articles_model->listLastBanner();
		$data['destaque'] = $destaque;

		// DISCLAIMER
		$disclaimer = $this->Articles_model->listLastDisclaimer();
		$data['disclaimer'] = $disclaimer;

		// EDITIONS
		$editions = $this->Articles_model->listAllEditions();
		$data['editions'] = $editions;


		if($data['articles'] = $this->Articles_model->listAll()){
			$this->load->view('preview',$data);
		} else {
			redirect('/articles');
		}
	}
	
}
