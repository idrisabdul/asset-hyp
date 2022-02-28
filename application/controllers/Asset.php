<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asset extends CI_Controller
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
		$this->load->model('Asset_m');
		$this->load->model('Status_cek_m');

		if (!$this->session->userdata('user_id')) {
            redirect('Auth');
        }
	}
	public function index()
	{
		$data['allasset'] = $this->Asset_m->AllAsset();
		$data['allkategori'] = $this->Asset_m->AllKategori();
		$this->template->load('template', 'asset/v_asset', $data);
	}

	public function filter($kategori_id)
	{
		$data['allkategori'] = $this->Asset_m->AllKategori();

		$data['allasset'] = $this->Asset_m->AssetOnCategory($kategori_id);
		$this->template->load('template', 'asset/v_asset', $data);
	}

	public function add_asset()
	{
		$data['allkategori'] = $this->Asset_m->AllKategori();
		$data['allvendor'] = $this->Asset_m->AllVendor();
		$data['status'] = $this->Status_cek_m->Status();
		$this->template->load('template', 'asset/v_add_asset', $data);
	}
	
	public function editAsset($id_asset)
	{
		$data['asset'] = $this->Asset_m->AssetId($id_asset);
		$data['allvendor'] = $this->Asset_m->AllVendor();
		$data['status'] = $this->Status_cek_m->Status();
		$this->template->load('template', 'asset/v_edit_asset', $data);
	}

	public function InsertAsset()
	{
		$data = [
			'kategori_id' => $this->input->post('kategori_id'),
			'merk' => $this->input->post('merk'),
			'type' => $this->input->post('type'),
			'processor' => $this->input->post('processor'),
			'tipe_network' => $this->input->post('tipe_network'),
			'ttl_port' => $this->input->post('ttl_port'),
			'transmisi' => $this->input->post('transmisi'),
			'serial_number' => $this->input->post('serial_number'),
			'ram' => $this->input->post('ram'),
			'type_penyimpanan' => $this->input->post('type_penyimpanan'),
			'kepemilikan' => $this->input->post('kepemilikan'),
			'id_user' => 1,
			'status_kondisi' => $this->input->post('status_kondisi'),
		];
		$this->db->insert('assets', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
        Asset Berhasil Ditambahkan
      </div>');
		redirect('Asset');
	}

	public function UpdateAsset()
	{
		$id = $this->input->post('id');
		$data = [
			'merk' => $this->input->post('merk'),
			'type' => $this->input->post('type'),
			'processor' => $this->input->post('processor'),
			'tipe_network' => $this->input->post('tipe_network'),
			'ttl_port' => $this->input->post('ttl_port'),
			'transmisi' => $this->input->post('transmisi'),
			'serial_number' => $this->input->post('serial_number'),
			'ram' => $this->input->post('ram'),
			'type_penyimpanan' => $this->input->post('type_penyimpanan'),
			'kepemilikan' => $this->input->post('kepemilikan'),

		];
		$this->db->update('assets', $data, ['asset_id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
        Asset Berhasil Diubah
      </div>');
		redirect('Asset');
	}

	public function delete($id)
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Danger!</h5>
		Asset Berhasil Dihapus
	  </div>');
		$this->db->delete('assets', ['asset_id' => $id]);
		redirect('Asset');
	}
}
