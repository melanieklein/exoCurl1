<?php
	class M_Membre extends CI_Model
	{

		public function verifier($data)
		{
			$query = $this->db->get_where('membres',
				array(
					'email' => $data['email'],
					'mdp' => $data['mdp'],
					
					)
				);
			return $query->num_rows();
		}

		public function inscrire($data){		

			$value = array(
				'email' => $data['email'],
				'pseudo' => $data['pseudo'],
				'mdp' => $data['mdp']/*,
				'avatar' => $data['avatar']*/			
				);
			
			$this->db->insert('membres',$value);
		}

		public function recupererPseudoId($email) {
			$this->db->select('pseudo,membre_id');
			$this->db->from('membres');
			$this->db->where('email',$email);

			$query = $this->db->get();
			return $query->result();
		}

		public function afficher($data)
		{
			$this->db->select('*');
			$this->db->from('membres');
			$query = $this->db->get();
			return $query->result();
		}

	}
	