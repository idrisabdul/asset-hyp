<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qc extends CI_Controller
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
		$sql = "SELECT * FROM kondisi INNER JOIN assets ON kondisi.id_asset=assets.asset_id JOIN penempatan ON kondisi.ex_user=penempatan.user_id WHERE kondisi_id IN ( SELECT MAX(kondisi_id) FROM kondisi GROUP BY id_asset) ";
		$data['qc'] = $this->db->query($sql)->result();

		$sql_perlu_qc = "SELECT * FROM assets WHERE status_kondisi = 5 AND kategori_id = 1";
		$data['perlu_qc'] = $this->db->query($sql_perlu_qc)->result();
		$this->template->load('template', 'qc/v_qc', $data);
	}
}
