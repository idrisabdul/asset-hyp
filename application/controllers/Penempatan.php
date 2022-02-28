<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penempatan extends CI_Controller
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
		$this->load->model('Penempatan_m');
		if (!$this->session->userdata('user_id')) {
            redirect('Auth');
        }
	}
	public function index()
	{
		$data['allusers'] = $this->Penempatan_m->AllUsers();
		$this->template->load('template', 'Penempatan/v_users', $data);
	}

	public function lantai()
	{
		$data['alllantai'] = $this->Penempatan_m->AllLantai();
		$this->template->load('template', 'Penempatan/v_lantai', $data);
	}

	public function add_Penempatan()
	{
		$data['allkategori'] = $this->Asset_m->AllKategori();
		$data['allvendor'] = $this->Asset_m->AllVendor();
		$this->template->load('template', 'asset/v_add_asset', $data);
	}

	public function InsertUsers()
	{
		$data = [
			'nama_or_lantai' => $this->input->post('nama_or_lantai'),
			'jenis' => 1,
			'nik' => $this->input->post('nik'),
			'status' => $this->input->post('status'),
			'email' => $this->input->post('email'),
			'departemen' => $this->input->post('departemen'),
		];
		$this->db->insert('penempatan', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        Penempatan Berhasil Ditambahkan
      </div>');
		redirect('Penempatan');
	}
	public function InsertPenempatan()
	{
		$data = [
			'nama_or_lantai' => $this->input->post('nama_or_lantai'),
			'jenis' => 2,
		];
		$this->db->insert('penempatan', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        Penempatan Berhasil Ditambahkan
      </div>');
		redirect('Penempatan/lantai');
	}
	
	public function EditPenempatan()
	{
		$id = $this->input->post('id');
		$data = [
			'nama_or_lantai' => $this->input->post('nama_lantai'),
		];
		$this->db->update('penempatan', $data, ['user_id' => $id]);

		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        Penempatan Berhasil Diedit
      </div>');
		redirect('Penempatan/lantai');
	}

	public function EditUser()
	{
		$id = $this->input->post('id');
		$data = [
			'nama_or_lantai' => $this->input->post('nama_lengkap'),
			'nik' => $this->input->post('nik'),
			'email' => $this->input->post('email'),
			'status' => $this->input->post('status'),
			'departemen' => $this->input->post('departemen'),
		];
		$this->db->update('penempatan', $data, ['user_id' => $id]);

		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        Penempatan Berhasil Diedit
      </div>');
		redirect('Penempatan');
	}
	public function delete($id)
	{
		$this->db->delete('penempatan', ['user_id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Lantai Berhasil Dihapus</div>');
		redirect('Penempatan/lantai');
	}
	public function deleteUser($id)
	{
		$this->db->delete('penempatan', ['user_id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Lantai Berhasil Dihapus</div>');
		redirect('Penempatan');
	}
}
