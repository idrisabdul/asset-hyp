<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		if (!$this->session->userdata('user_id')) {
            redirect('Auth');
        }
	}

	public function index()
	{
		$data['ttl_laptop'] = $this->db->query("SELECT * FROM assets WHERE kategori_id = 1")->num_rows();
		$data['ttl_printer'] = $this->db->query("SELECT * FROM assets WHERE kategori_id = 2")->num_rows();
		$data['ttl_furniture'] = $this->db->query("SELECT * FROM assets WHERE kategori_id = 9")->num_rows();
		$data['ttl_lainnya'] = $this->db->query("SELECT * FROM assets WHERE kategori_id = 5")->num_rows();
		$data['kategori'] = $this->db->query("SELECT * FROM kategori WHERE type_kategori = 1")->result();
		$data['status_cek'] = $this->db->query("SELECT * FROM status_cek")->result();
		$data['allasset'] = $this->Asset_m->AllAsset();

		$sql_perlu_qc = "SELECT * FROM assets WHERE status_kondisi = 5 AND kategori_id = 1";
		$data['perlu_qc'] = $this->db->query($sql_perlu_qc)->result();
		// echo '<pre>';
		// echo var_dump($status_cek);
		// echo '</pre>';
		// $queri =  select count(*) status_kondisi from assets WHERE status_kondisi = 5;  $cek->status_cek_id

		$data['status'] = $this->db->query("SELECT status_kondisi, COUNT(status_kondisi) FROM assets WHERE kategori_id = 1 GROUP BY status_kondisi")->result_array();
		$data['statuss'] = $this->db->query("SELECT * FROM assets LEFT JOIN status_cek ON status_cek.status_cek_id = assets.status_kondisi WHERE kategori_id = 1 GROUP BY status_cek.nama_status")->result_array();
		// $data['label_status'] = $this->Asset_m->AssetWithCondition();
		// echo "<pre>";
		// var_dump($data['statuss']);
		// echo "</pre>";
		$this->template->load('template', 'v_dashboard', $data);
	}
}
