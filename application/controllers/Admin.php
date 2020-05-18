<?php 

	class Admin extends CI_Controller{

		public function __construct(){
			parent::__construct();
			if(!$this->session->userdata('email_user')){
				redirect('auth');
			}
			if($this->session->userdata('role_user') != 1){
				redirect('mahasiswa');
			}
		}

		public function index(){
			$data['judul'] = 'dashboard';
			$data['count_petugas'] = $this->M_admin->count_petugas();
			$data['count_buku'] = $this->M_admin->count_buku();
			$data['count_jurusan'] = $this->M_admin->count_jurusan();
			$data['count_riwayat'] = $this->M_admin->count_riwayat();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/index', $data);
			$this->load->view('templates/user_footer');
		}

		public function petugas(){
			$data['judul'] = 'pengguna';
			$data['petugas'] = $this->M_admin->get_petugas();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/petugas', $data);
			$this->load->view('templates/user_footer');
		}

		public function tambah_pengguna(){
			$data['judul'] = 'tambah pengguna';
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email_user]',
				['is_unique' => 'Email sudah terdaftar']);
			$this->form_validation->set_rules('role', 'Hak access', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',
				[ 'min_length' => 'Password minimal 6 karakter' ]);
			$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi password', 'trim|required|matches[password]',
				['matches' => 'Konfirmasi password salah']);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/tambah_petugas', $data);
				$this->load->view('templates/user_footer');	
			}else{
				$data = [
					'nama_user' => $this->input->post('nama'),
					'email_user' => $this->input->post('email'),
					'role_user' => $this->input->post('role'),
					'password_user' => password_hash($this->input->post('konfirmasi_password'), PASSWORD_DEFAULT)
				];
				$this->M_admin->tambah_petugas($data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Petugas berhasil ditambahkan
															</div>');
				redirect('admin/petugas');
			}
		}

		public function hapus_petugas($id){
			$this->M_admin->hapus_petugas($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Petugas berhasil dihapus
															</div>');
			redirect('admin/petugas');
		}

		public function buku(){
			$data['judul'] = 'buku';
			$data['buku'] = $this->M_admin->get_buku();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/buku', $data);
			$this->load->view('templates/user_footer');
		}

		public function detail_buku($id){
			$data['judul'] = 'detail buku';
			$data['buku'] = $this->M_admin->get_buku_id($id);
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/detail_buku', $data);
			$this->load->view('templates/user_footer');
		}

		public function tambah_buku(){
			$data['judul'] = 'tambah buku';
			$this->form_validation->set_rules('kode', 'Kode', 'trim|required|is_unique[buku.kode]',
				['is_unique' => 'Kode sudah terdaftar']);
			$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
			$this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required');
			$this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');
			$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|numeric',
				['numeric' => 'Data harus angka']);
			$this->form_validation->set_rules('isbn', 'ISBN', 'trim|required');
			$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric',
				['numeric' => 'Data harus angka']);
			$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/tambah_buku');
				$this->load->view('templates/user_footer');	
			}else{
				$foto = $_FILES['foto']['name'];
				if($foto){
					$config['upload_path']          = './assets/foto_buku/';
	                $config['allowed_types']        = 'gif|jpg|png|jpeg';
	                $config['max_size']             = 2048;
	                $this->load->library('upload', $config);
	                if($this->upload->do_upload('foto')){
	                	$this->upload->data('file_name');
	                	$data = [
	                		'foto' => $_FILES['foto']['name'],
							'kode' => $this->input->post('kode'),
							'judul' => $this->input->post('judul'),
							'pengarang' => $this->input->post('pengarang'),
							'penerbit' => $this->input->post('penerbit'),
							'tahun' => $this->input->post('tahun'),
							'isbn' => $this->input->post('isbn'),
							'jumlah' => $this->input->post('jumlah'),
							'lokasi' => $this->input->post('lokasi')
						];
	                	$this->M_admin->tambah_buku($data);
						$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Buku berhasil ditambahkan
															</div>');
						redirect('admin/buku');
	                }else{
	                	$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Ukuran foto terlalu besar (MAX 2MB)
															</div>');
						redirect('admin/tambah_buku');
	                }	
				}
			}
		}

		public function ubah_buku($id){
			$data['judul'] = 'ubah buku';
			$data['buku'] = $this->M_admin->get_buku_id($id);
			$data['lokasi'] = $data['buku']->lokasi;
			$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
			$this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required');
			$this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');
			$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|numeric',
				['numeric' => 'Data harus angka']);
			$this->form_validation->set_rules('isbn', 'ISBN', 'trim|required');
			$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric',
				['numeric' => 'Data harus angka']);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/ubah_buku', $data);
				$this->load->view('templates/user_footer');	
			}else{
				$id = $this->input->post('id');
				$foto = $_FILES['foto']['name'];
				if($foto){
					$config['upload_path']          = './assets/foto_buku/';
	                $config['allowed_types']        = 'gif|jpg|png|jpeg';
	                $config['max_size']             = 2048;
	                $this->load->library('upload', $config);
	                if($this->upload->do_upload('foto')){
	                	$foto_lama = $data['buku']->foto;
	                	if($foto_lama){
	                		unlink(FCPATH.'assets/foto_buku/'.$foto_lama);
	                	}
	                	$this->upload->data('file_name');
	                	$data = [
	                		'foto' => $_FILES['foto']['name'],
							'judul' => $this->input->post('judul'),
							'pengarang' => $this->input->post('pengarang'),
							'penerbit' => $this->input->post('penerbit'),
							'tahun' => $this->input->post('tahun'),
							'isbn' => $this->input->post('isbn'),
							'jumlah' => $this->input->post('jumlah'),
							'lokasi' => $this->input->post('lokasi')
						];
	                	$this->M_admin->ubah_buku($data, $id);
						$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Buku berhasil diubah
															</div>');
						redirect('admin/buku');
	                }else{
	                	$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Ukuran foto yang ingin diganti terlalu besar (MAX 2MB)
															</div>');
						redirect('admin/ubah_buku/'.$id);
	                }	
				}else{
					$data = [
						'judul' => $this->input->post('judul'),
						'pengarang' => $this->input->post('pengarang'),
						'penerbit' => $this->input->post('penerbit'),
						'tahun' => $this->input->post('tahun'),
						'isbn' => $this->input->post('isbn'),
						'jumlah' => $this->input->post('jumlah'),
						'lokasi' => $this->input->post('lokasi')
					];
                	$this->M_admin->ubah_buku($data, $id);
                	$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
														  Buku berhasil diubah
														</div>');
					redirect('admin/buku');
				}
			}
		}

		public function hapus_buku($id){
			$buku = $this->M_admin->get_buku_id($id);
			$foto_lama = $buku->foto;
			if($foto_lama){
				unlink(FCPATH.'assets/foto_buku/'.$foto_lama);
			}
			$this->M_admin->hapus_buku($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
														  Buku berhasil dihapus
														</div>');
			redirect('admin/buku');
		}

		public function jurusan(){
			$data['judul'] = 'jurusan';
			$data['jurusan'] = $this->M_admin->get_jurusan();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/jurusan', $data);
			$this->load->view('templates/user_footer');
		}

		public function tambah_jurusan(){
			$data['judul'] = 'tambah jurusan';
			$this->form_validation->set_rules('nama', 'Nama jurusan', 'trim|required|is_unique[jurusan.nama_jurusan]', ['is_unique' => 'Jurusan sudah terdaftar']);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/tambah_jurusan');
				$this->load->view('templates/user_footer');	
			}else{
				$data = [
					'nama_jurusan' => $this->input->post('nama')
				];
				$this->M_admin->tambah_jurusan($data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
														  Jurusan berhasil ditambahkan
														</div>');
				redirect('admin/jurusan');
			}
		}

		public function hapus_jurusan($id){
			$this->M_admin->hapus_jurusan($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
														  Jurusan berhasil dihapus
														</div>');
			redirect('admin/jurusan');
		}

		public function riwayat_pengembalian(){
			$data['judul'] = 'riwayat pengembalian';
			$data['riwayat'] = $this->M_admin->get_riwayat();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/riwayat_pengembalian', $data);
			$this->load->view('templates/user_footer');
		}

		public function hapus_riwayat($id){
			$this->M_admin->hapus_riwayat($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
														  Riwayat pengembalian berhasil dihapus
														</div>');
			redirect('admin/riwayat_pengembalian');
		}
	}

 ?>