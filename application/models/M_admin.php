<?php 

	class M_admin extends CI_Model{

		public function get_petugas(){
			$query = "SELECT * FROM user WHERE role_user!=3";
			return $this->db->query($query)->result();
		}

		public function tambah_petugas($data){
			return $this->db->insert('user', $data);
		}

		public function hapus_petugas($id){
			return $this->db->delete('user', ['id_user' => $id]);
		}

		public function count_petugas(){
			$query = "SELECT * FROM user WHERE role_user!=3";
			return $this->db->query($query)->num_rows();
		}

		public function tambah_buku($data){
			return $this->db->insert('buku', $data);
		}

		public function get_buku(){
			return $this->db->get('buku')->result();
		}

		public function get_buku_id($id){
			return $this->db->get_where('buku', ['id_buku' => $id])->row();
		}

		public function ubah_buku($data, $id){
			$this->db->where('id_buku', $id);
			return $this->db->update('buku', $data);
		}

		public function hapus_buku($id){
			return $this->db->delete('buku', ['id_buku' => $id]);
		}

		public function count_buku(){
			return $this->db->get('buku')->num_rows();
		}

		public function get_jurusan(){
			$query = "SELECT * FROM jurusan ORDER BY nama_jurusan ASC";
			return $this->db->query($query)->result();
		}

		public function tambah_jurusan($data){
			return $this->db->insert('jurusan', $data);
		}

		public function hapus_jurusan($id){
			return $this->db->delete('jurusan', ['id_jurusan' => $id]);
		}

		public function count_jurusan(){
			return $this->db->get('jurusan')->num_rows();
		}

	}

 ?>