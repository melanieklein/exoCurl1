<?php 
	class M_Afficher extends CI_Model
	{
		
		function afficher()
		{
			$this->db->select('*');
			$this->db->from('liens');

			$query = $this->db->get();
			return $query->result();
		}

		function ajouter($data)
		{
			$this->db->insert('liens',$data);
		}

		function supprimer($data){
			$this->db->delete('liens', array('id'=>$data));
		}

		function modifier($data){
			$this->db->select('*');
			$this->db->from('liens');
			$this->db->where('id',$data);

			$query = $this->db->get();
			return $query->row();
		}

		function modifierDB($id,$data){
			$this->db->update('liens', $data, array('id'=>$id));
		}
	}