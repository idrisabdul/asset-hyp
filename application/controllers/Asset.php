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
		$this->load->model('Ass_number_m');
		$this->load->library('Ciqrcode');

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
		$data['allsubkategori'] = $this->Asset_m->AllSubKategori(2);
		$data['allvendor'] = $this->Asset_m->AllVendor();
		$data['allasset_number'] = $this->Ass_number_m->asset_number();
		$data['status'] = $this->Status_cek_m->Status();
		$last_number_asset = $this->db->query("SELECT numbering FROM assets WHERE id_asset_number = 1  ORDER BY asset_id DESC LIMIT 1;")->row();

		$last_int_number = (int)$last_number_asset->numbering;

		$last_number = $last_int_number + 1;
		if ($last_number <= 9) {
			$URUT = "000" . $last_number;
		} elseif ($last_number >= 9 && $last_number < 99) {
			$URUT = "00" . $last_number;
		} elseif ($last_number >= 99 && $last_number < 999) {
			$URUT = "0" . $last_number;
		} elseif ($last_number >= 9999) {
			$URUT =  $last_number;
		}

		// $add_count = (int) $last_number + 1;
		// var_dump($last_number);
		// $data['urut'] = $asset_num_str . $URUT;
		$data['urut'] = $URUT;
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
		$ori_filename = $_FILES['images']['name'];
		$new_name = time() . "" . str_replace(' ', '-', $ori_filename);
		$config = array(
			'upload_path' => "./images/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'file_name' => $new_name,
		);
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('images')) {
			echo "gagal upload";
		} else {
			$prod_filename = $this->upload->data('file_name');
			$data = [
				'id_asset_number' => $this->input->post('id_asset_number'),
				'numbering' => $this->input->post('numbering'),
				'tgl_penambahan' => $this->input->post('tgl_penambahan'),
				'kondisi_label' => $this->input->post('kondisi_label'),
				'numbering' => $this->input->post('numbering'),
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
				'images' => $prod_filename
			];
			$result = $this->db->insert('assets', $data);
			if ($result) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h5><i class="icon fas fa-check"></i> Berhasil!</h5>
			Asset Berhasil Ditambahkan
		  </div>');
				redirect('Asset');
			} else {
				redirect('Asset');
			}
		}

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

	function get_lastid_asset_number()
	{
		$id_asset_number = $this->input->post('id', TRUE);
		$last_number_asset = $this->db->query("SELECT numbering FROM assets WHERE id_asset_number = $id_asset_number ORDER BY asset_id DESC LIMIT 1;")->row();


		if ($last_number_asset == null) {
			$data = "0001";
		} else {
			$last_int_number = (int)$last_number_asset->numbering;
			$last_number = $last_int_number + 1;
			if ($last_number <= 9) {
				$data = "000" . $last_number;
			} elseif ($last_number >= 9 && $last_number < 99) {
				$data = "00" . $last_number;
			} elseif ($last_number >= 99 && $last_number < 999) {
				$data = "0" . $last_number;
			} elseif ($last_number >= 9999) {
				$data =  $last_number;
			}
		}

		echo json_encode($data);
	}

	function qrcode($kode)
	{
		$url = "https://hipernet.bumenet.com/History/show_detail/" . $kode;
		QRcode::png(
			$url,
			$outfile = false,
			$level = QR_ECLEVEL_H,
			$size = 2,
			$margin = 2
		);
	}


	function qrcode_detail($kode)
	{
		QRcode::png(
			$kode,
			$outfile = false,
			$level = QR_ECLEVEL_H,
			$size = 7,
			$margin = 2
		);
	}
}
