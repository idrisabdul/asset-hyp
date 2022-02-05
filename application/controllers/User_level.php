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
	}

	public function index()
	{
		$data['user_level'] = $this->User_level_m->All_user_level();
		$this->template->load('template', 'user_level/v_user_level', $data);
	}

	public function AddHistory()
	{
		$id = $this->input->post('id_asset');
		$id_users = $this->input->post('id_users');
		$data_upd = [
			'id_user' => $id_users,
		];
		$data = [
			'id_asset' => $this->input->post('id_asset'),
			'id_users' => $id_users,
			'ip_address' => $this->input->post('ip_address'),
			'tgl' => $this->input->post('tgl'),
		];

		$this->db->update('assets', $data_upd, ['asset_id' => $id]);
		$this->db->insert('history', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
        Asset berpindah ke user
      </div>');
		redirect('asset');
	}
}
