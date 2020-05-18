<?php 

	class M_mahasiswa extends CI_Model{

		public function get_mahasiswa($email){
			return $this->db->get_where('mahasiswa', ['email_mahasiswa' => $email])->row();
		}

		public function get_peminjaman($nim){
			$query = "SELECT * FROM peminjaman
					JOIN buku ON peminjaman.kode_buku=buku.kode
					WHERE peminjaman.nim_peminjam='$nim'";
			return $this->db->query($query)->result();
		}

		public function get_user($email){
			return $this->db->get_where('user', ['email_user' => $email])->row();
		}

		public function update_password($konfirmasi_password, $email){
			$this->db->set('password_user', $konfirmasi_password);
			$this->db->where('email_user', $email);
			return $this->db->update('user');
		}

	}

 ?>