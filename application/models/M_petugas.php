<?php 

	class M_petugas extends CI_Model{

		public function get_mahasiswa(){
			return $this->db->get('mahasiswa')->result();
		}

		public function tambah_mahasiswa($data){
			return $this->db->insert('mahasiswa', $data);
		}

		public function tambah_user($user){
			return $this->db->insert('user', $user);
		}

		public function get_mahasiswa_id($id){
			return $this->db->get_where('mahasiswa', ['id_mahasiswa' => $id])->row();
		}

		public function ubah_mahasiswa($data, $id){
			$this->db->where('id_mahasiswa', $id);
			return $this->db->update('mahasiswa', $data);
		}

		public function ubah_user($user, $email){
			$this->db->where('email_user', $email);
			return $this->db->update('user', $user);
		}

		public function hapus_mahasiswa($id){
			return $this->db->delete('mahasiswa', ['id_mahasiswa' => $id]);
		}

		public function hapus_user($email){
			return $this->db->delete('user', ['email_user' => $email]);
		}

		public function get_buku(){
			$query = "SELECT * FROM buku ORDER BY judul ASC";
			return $this->db->query($query)->result();
		}

		public function get_peminjam(){
			$query = "SELECT * FROM mahasiswa ORDER BY nama_mahasiswa ASC";
			return $this->db->query($query)->result();
		}

		public function tambah_peminjaman($data){
			return $this->db->insert('peminjaman', $data);
		}

		public function kurang_buku($buku){
			$query = "UPDATE buku SET jumlah=(jumlah-1) WHERE kode='$buku'";
			return $this->db->query($query);
		}

		public function get_peminjaman(){
			return $this->db->get_where('peminjaman', ['status' => 1])->result();
		}

		public function get_peminjaman_id($kode){
			$query = "SELECT * FROM peminjaman 
					JOIN mahasiswa ON peminjaman.nim_peminjam=mahasiswa.nim
					JOIN buku ON peminjaman.kode_buku=buku.kode 
					WHERE peminjaman.kode_peminjaman='$kode'";
			return $this->db->query($query)->row();
		}

		public function kembalikan_buku($id){
			$this->db->set('status', 2);
			$this->db->where('id_peminjaman', $id);
			return $this->db->update('peminjaman');
		}

		public function update_jumlah($kode){
			$query = "UPDATE buku SET jumlah=(jumlah+1) WHERE kode='$kode'";
			return $this->db->query($query);
		}

		public function perpanjangan_buku($id, $tanggal_pinjam, $tanggal_kembali){
			$this->db->set('tanggal_kembali', $tanggal_kembali);
			$this->db->set('tanggal_pinjam', $tanggal_pinjam);
			$this->db->where('id_peminjaman', $id);
			return $this->db->update('peminjaman');
		}

	}

 ?>