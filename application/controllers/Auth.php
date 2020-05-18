<?php 

	class Auth extends CI_Controller{

		public function index(){
			$data['judul'] = 'login';
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',
				[ 'min_length' => 'Password minimal 6 karakter' ]);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/auth_header', $data);
				$this->load->view('auth/index');
				$this->load->view('templates/auth_footer');	
			}else{
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$user = $this->M_auth->get_user($email);
				if($user){
					if(password_verify($password, $user->password_user)){
						$data = [
							'nama_user' => $user->nama_user,
							'email_user' => $user->email_user,
							'role_user' => $user->role_user
						];
						$this->session->set_userdata($data);
						if($this->session->userdata('role_user') == 1){
							redirect('admin');
						}elseif($this->session->userdata('role_user') == 2){
							redirect('petugas');
						}else{
							redirect('mahasiswa');
						}
					}else{
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Password salah
															</div>');
						redirect('auth');
					}
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Email tidak terdaftar
															</div>');
					redirect('auth');
				}
			}
		}

		public function logout(){
			$this->session->unset_userdata('nama_user');
			$this->session->unset_userdata('email_user');
			$this->session->unset_userdata('role_user');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Anda telah keluar
															</div>');
			redirect('auth');
		}

	}

 ?>