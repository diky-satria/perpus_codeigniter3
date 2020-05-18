<?php 

	class Petugas extends CI_Controller{

		public function __construct(){
			parent::__construct();
			if(!$this->session->userdata('email_user')){
				redirect('auth');
			}
			if($this->session->userdata('role_user') == 3){
				redirect('mahasiswa');
			}
		}

		public function index(){
			$data['judul'] = 'peminjaman';
			$data['tanggal_kembalian'] = date('d-m-Y');
			$data['denda'] = 1000;
			$data['peminjaman'] = $this->M_petugas->get_peminjaman();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('petugas/index', $data);
			$this->load->view('templates/user_footer');
		}

		public function detail_peminjaman(){
			$kode = $this->input->get('kode');
			$data['denda'] = $this->input->get('denda');
			$data['hari'] = $this->input->get('hari');
			$data['judul'] = 'detail peminjaman';
			$data['pj'] = $this->M_petugas->get_peminjaman_id($kode);
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('petugas/detail_peminjaman', $data);
			$this->load->view('templates/user_footer');
		}

		public function tambah_peminjaman(){
			$data['judul'] = 'tambah peminjaman';
			$data['kode'] = $this->input->get('kode');
			$data['tgl_pinjam'] = date('d-m-Y');
			$data['tgl_kembali'] = date('d-m-Y', time()+60*60*24*7);
			$data['buku'] = $this->M_petugas->get_buku();
			$data['peminjam'] = $this->M_petugas->get_peminjam();
			$this->form_validation->set_rules('kode', 'Kode', 'trim|required');
			$this->form_validation->set_rules('buku', 'Buku', 'trim|required');
			$this->form_validation->set_rules('nim', 'Peminjam', 'trim|required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('petugas/tambah_peminjaman', $data);
				$this->load->view('templates/user_footer');	
			}else{
				$buku = $this->input->post('buku');
				$data = [
					'kode_peminjaman' => $this->input->post('kode'),
					'nim_peminjam' => $this->input->post('nim'),
					'kode_buku' => $this->input->post('buku'),
					'tanggal_pinjam' => $this->input->post('tgl_pinjam'),
					'tanggal_kembali' => $this->input->post('tgl_kembali'),
					'petugas' => $this->session->userdata('nama_user'),
					'status' => 1
				];
				$this->M_petugas->tambah_peminjaman($data);
				$this->M_petugas->kurang_buku($buku);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Peminjaman berhasil ditambahkan
															</div>');
				redirect('petugas');
			}
		}

		public function kembalikan_buku(){
			$id = $this->input->get('id');
			$kode = $this->input->get('kode');
			$this->M_petugas->kembalikan_buku($id);
			$this->M_petugas->update_jumlah($kode);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Buku berhasil dikembalikan
															</div>');
			redirect('petugas');
		}

		public function perpanjangan_buku(){
			$id = $this->input->get('id');
			$hari = $this->input->get('hari');
			if($hari > 0){
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Perpanjangan peminjaman tidak bisa dilakukan, kembalikan buku lalu pinjam lagi 
															</div>');
				redirect('petugas');
			}else{
				$tanggal_pinjam = date('d-m-Y');
				$tanggal_kembali = date('d-m-Y', time()+60*60*24*7);
				$this->M_petugas->perpanjangan_buku($id, $tanggal_pinjam, $tanggal_kembali);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Perpanjangan buku berhasil dilakukan 
															</div>');
				redirect('petugas');
			}
		}

		public function mahasiswa(){
			$data['judul'] = 'mahasiswa';
			$data['mahasiswa'] = $this->M_petugas->get_mahasiswa();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('petugas/mahasiswa', $data);
			$this->load->view('templates/user_footer');
		}

		public function tambah_mahasiswa(){
			$data['judul'] = 'tambah mahasiswa';
			$data['jurusan'] = $this->M_admin->get_jurusan();
			$this->form_validation->set_rules('nim', 'NIM', 'trim|required|is_unique[mahasiswa.nim]',
				[ 'is_unique' => 'NIM sudah terdaftar' ]);
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[mahasiswa.email_mahasiswa]',
				[ 'is_unique' => 'Email sudah terdaftar' ]);
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
			$this->form_validation->set_rules('semester', 'Semester', 'required');
			$this->form_validation->set_rules('kelas', 'Kelas', 'required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('petugas/tambah_mahasiswa', $data);
				$this->load->view('templates/user_footer');	
			}else{
				$data = [
					'nim' => $this->input->post('nim'),
					'nama_mahasiswa' => $this->input->post('nama'),
					'email_mahasiswa' => $this->input->post('email'),
					'jurusan_mahasiswa' => $this->input->post('jurusan'),
					'semester' => $this->input->post('semester'),
					'kelas' => $this->input->post('kelas')
				];
				$user = [
					'nama_user' => $this->input->post('nama'),
					'email_user' => $this->input->post('email'),
					'password_user' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'role_user' => 3
				];
				$this->M_petugas->tambah_mahasiswa($data);
				$this->M_petugas->tambah_user($user);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Mahasiswa/i berhasil ditambahkan
															</div>');
				redirect('petugas/mahasiswa');
			}
		}

		public function ubah_mahasiswa($id){
			$data['judul'] = 'ubah mahasiswa';
			$data['jurusan'] = $this->M_admin->get_jurusan();
			$data['mhs'] = $this->M_petugas->get_mahasiswa_id($id);
			$data['jurusan_id'] = $data['mhs']->jurusan_mahasiswa;
			$data['semester_id'] = $data['mhs']->semester;
			$data['kelas_id'] = $data['mhs']->kelas;
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('petugas/ubah_mahasiswa', $data);
				$this->load->view('templates/user_footer');	
			}else{
				$email = $this->input->post('email');
				$data = [
					'nama_mahasiswa' => $this->input->post('nama'),
					'jurusan_mahasiswa' => $this->input->post('jurusan'),
					'semester' => $this->input->post('semester'),
					'kelas' => $this->input->post('kelas')
				];
				$user = [
					'nama_user' => $this->input->post('nama')
				];
				$this->M_petugas->ubah_mahasiswa($data, $id);
				$this->M_petugas->ubah_user($user, $email);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Mahasiswa/i berhasil diubah
															</div>');
				redirect('petugas/mahasiswa');
			}
		}

		public function hapus_mahasiswa(){
			$id = $this->input->get('id');
			$email = $this->input->get('email');
			$this->M_petugas->hapus_mahasiswa($id);
			$this->M_petugas->hapus_user($email);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Mahasiswa/i berhasil dihapus
															</div>');
			redirect('petugas/mahasiswa');
		}
	}

 ?>