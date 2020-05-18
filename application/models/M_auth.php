<?php 

	class M_auth extends CI_Model{

		public function get_user($email){
			return $this->db->get_where('user', ['email_user' => $email])->row();
		}

	}

 ?>