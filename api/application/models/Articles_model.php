<?php
class Articles_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function addArticle($data){
		if($this->db->insert('conectesearticles', $data)){
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function addBanner($data){
		if($this->db->insert('conectesearticles', $data)){
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function delete($id){
		$this->db->where('idArticle',$id);
		$query = $this->db->delete('conectesearticles');

		if($query){
			return true;
		} else {
			return false;
		}
	}

	public function listAll(){
		$this->db->where('tipo',"noticia");
		$this->db->where('created_at',date('Y-m-d'));
		$this->db->order_by('idArticle desc');
		$query = $this->db->get('conectesearticles');
		return $query->result();
	}

	public function listAllEditions(){
		$this->db->select('idArticle, edicao, mes');
		$this->db->order_by('idArticle desc');
		$this->db->limit('1');
		$query = $this->db->get('conectesearticles');

		return $query->result();
	}

	public function listLastBanner(){
		$this->db->where('tipo',"destaque");
		$this->db->where('created_at',date('Y-m-d'));
		$this->db->order_by('idArticle desc');
		$this->db->limit('1');
		$query = $this->db->get('conectesearticles');
		return $query->result();
	}

	public function listLastDisclaimer(){
		$this->db->where('tipo',"disclaimer");
		$this->db->where('created_at',date('Y-m-d'));
		$this->db->order_by('idArticle desc');
		$this->db->limit('1');
		$query = $this->db->get('conectesearticles');
		return $query->result();
	}

}