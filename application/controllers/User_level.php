<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_level extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_level_m');
		// $this->load->model('Asset_m');
		if (!$this->session->userdata('user_id')) {
            redirect('Auth');
        } else if ($this->session->userdata('user_role') != 1) {
			$this->load->view('err_404');  
		}
	}

	public function index()
	{
		$data['user_level'] = $this->User_level_m->All_user_level();
		$this->template->load('template', 'user_level/v_user_level', $data);
	}

	public function add_userrole()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user_role = $this->input->post('password');
		
		$data = [
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'user_role' => $this->input->post('user_role'),
		];

		$this->db->insert('user_level', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
        User Role ditambahkan
      </div>');
		redirect('User_level');
	}

	public function edit_userrole()
	{
		$id = $this->input->post('user_id');
		$data = [
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'user_role' => $this->input->post('user_role'),
		];
		$this->db->update('user_level', $data, ['user_id' => $id]);

		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        User Role Berhasil Diedit
      </div>');
		redirect('User_level');
	}

	public function delete_userrole($id)
	{
		$this->db->delete('User_level', ['user_id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User Role Berhasil Dihapus</div>');
		redirect('User_level');
	}
}
