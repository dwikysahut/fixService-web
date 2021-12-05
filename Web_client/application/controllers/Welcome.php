<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('welcome_model');
	}

	public function index()
	{
		$data = array(
			'kategori' => $this->welcome_model->get_kategori(),
			'track' => $this->welcome_model->get_track_service(),
			// 'service' => $this->welcome_model->get_service()
		);
		$this->load->view('welcome_message', $data);
	}

	public function shop()
	{
		$data = array(
			'barang' => $this->welcome_model->get_barang()
		);
		$this->load->view('shop', $data);
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function proses_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$login = $this->welcome_model->login($username, $password);
		if($login){
			$sess = array(
				'id_member'=>$login->ID_member,
				'nama' => $login->nama_member,
				'email' => $login->email_member,
				'notelp' => $login->no_telpon_member,
			);
			
			$this->session->set_userdata($sess);
			
			redirect('');
		}
		else{
			redirect('welcome/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}

	public function member_daftar()
	{
		$data = array(
			'nama_member' => $this->input->post('name'),
			'no_telpon_member' => $this->input->post('nohp'),
			'email_member' => $this->input->post('email'),
			'password_member' => $this->input->post('password'),
		);

		$this->welcome_model->add_member($data);
		redirect('');
	}

	public function service_daftar()
	{
		$sts = '0';
		$data = array(
			'ID_order'  => $this->input->post(''),
			'nama_client' => $this->input->post('name'),
			'no_telpon_client' => $this->input->post('nohp'),
			'email_client' => $this->input->post('email'),
			'alamat_service' => $this->input->post('alamat'),
			'waktu_service' => $this->input->post('waktu'),
			'service' => $this->input->post('kategori'),
			'deskripsi' => $this->input->post('deskripsi'),
			'status' => ($sts),
			'pegawai' => (null)
		);

		$this->welcome_model->add_service($data);
		redirect('');	
	}

	public function hapus_order($id)
	{
		$this->welcome_model->delete_order($id);
		redirect('');
	}
}
