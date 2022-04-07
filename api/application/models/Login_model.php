<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_model
 *
 * @author wfpimentel
 */
class login_model extends CI_model {

    private $version = '1.0';

    public function __construct() {
        parent::__construct();

        if ($this->db->table_exists('indra_boletim_usuarios') === FALSE) {
            $query = "CREATE TABLE IF NOT EXISTS `indra_boletim_usuarios`(
                 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                 `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
                 `email` varchar(50) CHARACTER SET utf8 NOT NULL,
                 `senha` varchar(50) CHARACTER SET utf8 NOT NULL,
                 `created_at` datetime NOT NULL,
                 `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
                 PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE=utf8_general_ci;";
            if (!$this->db->query($query)) {
                die('Erro ao criar tabela');
            } else {
				$this->db->query("INSERT INTO indra_boletim_usuarios (nome, email, senha, created_at) VALUES ('admin', 'admin@admin.com','admin', NOW())");
			}
        }
		
		/*if($this->db->field_exists('','')){
			
			}*/
    }
    
    public function validar($data){
        $email = $data['email'];
        $senha = $data['senha'];
        
        $this->db->select('id, nome, email, senha');
        $this->db->from('indra_boletim_usuarios');
        $this->db->where('email',$email);
        $this->db->where('senha',$senha);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows()==1){
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function recover($email){
        $this->db->select('id, nome, email, senha');
        $this->db->from('indra_boletim_usuarios');
        $this->db->where('email',$email);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows()==1){
            return $query->result();
        } else {
            return false;
        }
    }
}
