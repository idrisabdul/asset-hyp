<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
		$this->load->model('Kategori_m');
        if (!$this->session->userdata('user_id')) {
            redirect('Auth');
        }
	}
	public function index()
	{
		$data['all_kategori'] = $this->Kategori_m->All_kategori();
		$this->template->load('template', 'kategori/v_kategori', $data);
	}



	public function insert_kategori()
	{
		$data = [
			'type_kategori' => $this->input->post('type_kategori'),
			'nama_kategori' => $this->input->post('nama_kategori'),
		];
		$this->db->insert('kategori', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        Kategori Berhasil Ditambahkan
      </div>');
		redirect('Kategori');
	}
	
	public function EditVendor()
	{
		$id = $this->input->post('id');
		$data = [
			'nama_vendor' => $this->input->post('nama_vendor'),
			'keterangan' => $this->input->post('keterangan'),
		];
		$this->db->update('vendor', $data, ['vendor_id' => $id]);

		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        Vendor Berhasil Diedit
      </div>');
		redirect('Vendor');
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
		$this->db->delete('vendor', ['vendor_id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Vendor Berhasil Dihapus</div>');
		redirect('Vendor');
	}
	public function deleteUser($id)
	{
		$this->db->delete('penempatan', ['user_id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Lantai Berhasil Dihapus</div>');
		redirect('Penempatan');
	}
}
