<?php 

	class Mahasiswa extends CI_Controller{

		public function __construct(){
			parent::__construct();
			if(!$this->session->userdata('email_user')){
				redirect('auth');
			}
		}

		public function index(){
			$data['judul'] = 'mahasiswa';
			$data['mahasiswa'] = $this->M_mahasiswa->get_mahasiswa($this->session->userdata('email_user'));
			$nim = '';
			$data['peminjaman'] = $this->M_mahasiswa->get_peminjaman($nim);	
			if($data['mahasiswa']){
				$nim = $data['mahasiswa']->nim;
				$data['denda'] = 1000;
				$data['tanggal_kembalian'] = date('d-m-Y');
				$data['peminjaman'] = $this->M_mahasiswa->get_peminjaman($nim);
			}
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('mahasiswa/index', $data);
			$this->load->view('templates/user_footer');
		}

		public function ubah_password(){
			$data['judul'] = 'ubah_password';
			$email = $this->session->userdata('email_user');
			$data['mahasiswa'] = $this->M_mahasiswa->get_user($email);
			$this->form_validation->set_rules('password', 'Password anda', 'trim|required|min_length[6]',
				[ 'min_length' => 'Minimal 6 karakter' ]);
			$this->form_validation->set_rules('password_baru', 'Password baru', 'trim|required|min_length[6]',
				[ 'min_length' => 'Minimal 6 karakter' ]);
			$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi password', 'trim|required|matches[password_baru]',
				[ 'matches' => 'Konfirmasi password salah' ]);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('mahasiswa/ubah_password', $data);
				$this->load->view('templates/user_footer');	
			}else{
				$pass = $data['mahasiswa']->password_user;
				$password = $this->input->post('password');
				$password_baru = $this->input->post('password_baru');
				$konfirmasi_password = password_hash($this->input->post('konfirmasi_password'), PASSWORD_DEFAULT);
				if(password_verify($password, $pass)){
					if($password_baru == $password){
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Password baru tidak boleh sama dengan password lama
															</div>');
						redirect('mahasiswa/ubah_password');
					}else{
						$this->M_mahasiswa->update_password($konfirmasi_password, $email);
						$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Password berhasil diubah
															</div>');
						redirect('mahasiswa/ubah_password');
					}
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Password anda salah
															</div>');
					redirect('mahasiswa/ubah_password');
				}
			}
		}
	}

 ?>