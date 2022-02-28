<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cek_m');
        $this->load->model('Asset_m');
        $this->load->model('Status_cek_m');
        $this->load->model('Penempatan_m');
        if (!$this->session->userdata('user_id')) {
            redirect('Auth');
        }
    }

    public function add_cek($id_asset)
    {
        $data['asset'] = $this->Asset_m->AssetId($id_asset);
        $data['kondisi'] = $this->Cek_m->AllKondisi($id_asset);
        $data['status'] = $this->Status_cek_m->Status();
        $data['users'] = $this->Penempatan_m->AllUsers();
        $this->template->load('template', 'cek/v_add_cek', $data);
    }

    public function edit_cek($kondisi_id)
    {
        $data['kondisi'] = $this->Cek_m->KondisiId($kondisi_id);
        $data['status'] = $this->Status_cek_m->Status();
        $this->template->load('template', 'cek/v_edit_cek', $data);
    }

    public function insert_cek()
    {
        $id = $this->input->post('id_asset');
        $data = [
            'id_asset' => $id,
            'nama_pengecek' => $this->input->post('nama_pengecek'),
            'ex_user' => $this->input->post('ex_user'),
            'tgl_pengecekkan' => $this->input->post('tgl_pengecekkan'),
            'fisik' => $this->input->post('fisik'),
            'harddrive' => $this->input->post('harddrive'),
            'lcd' => $this->input->post('lcd'),
            'keyboard' => $this->input->post('keyboard'),
            'speaker' => $this->input->post('speaker'),
            'port' => $this->input->post('port'),
            'baterai' => $this->input->post('baterai'),
            'touchpad' => $this->input->post('touchpad'),
            'charger' => $this->input->post('charger'),
            'status' => $this->input->post('status'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        $data_upd = [
            'status_kondisi' => $this->input->post('status'),
        ];

        $this->db->update('assets', $data_upd, ['asset_id' => $id]);
        $this->db->insert('kondisi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
        Input Cek Berhasil Ditambahkan
      </div>');
        redirect('Cek/add_cek/' . $id);
    }

    public function update_cek()
    {
        $id = $this->input->post('kondisi_id');
        $id_asset = $this->input->post('id_asset');
        $data = [
            'nama_pengecek' => $this->input->post('nama_pengecek'),
            'tgl_pengecekkan' => $this->input->post('tgl_pengecekkan'),
            'fisik' => $this->input->post('fisik'),
            'harddrive' => $this->input->post('harddrive'),
            'lcd' => $this->input->post('lcd'),
            'keyboard' => $this->input->post('keyboard'),
            'speaker' => $this->input->post('speaker'),
            'port' => $this->input->post('port'),
            'baterai' => $this->input->post('baterai'),
            'touchpad' => $this->input->post('touchpad'),
            'charger' => $this->input->post('charger'),
            'status' => $this->input->post('status'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        $data_upd = [
            'status_kondisi' => $this->input->post('status'),
        ];

        // $this->db->update('assets', $data_upd, ['asset_id' => $id]);
        $this->db->update('kondisi', $data, ['kondisi_id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
        Input Cek Berhasil Diubah
      </div>');
        redirect('Cek/add_cek/' . $id_asset);
    }
    public function update_status()
    {
        $id = $this->input->post('id_asset');
       
        $data_upd = [
            'status_kondisi' => $this->input->post('status'),
        ];

        // $this->db->update('assets', $data_upd, ['asset_id' => $id]);
        $this->db->update('assets', $data_upd, ['asset_id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
        Input Cek Berhasil Diubah
      </div>');
        redirect('Cek/add_cek/' . $id);
    }

    public function delete()
    {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Danger!</h5>
		Pengecekkan Berhasil Dihapus
	  </div>');
        $id_kondisi = $this->input->post('kondisi_id');
        $id_asset = $this->input->post('id_asset');
        // $sql = $this->db->query("SELECT * FROM kondisi WHERE id_asset = $id ORDER BY kondisi_id DESC LIMIT 1")->row();
        $this->db->delete('penempatan', ['kondisi_id' => $id_kondisi]);
        redirect('Cek/add_cek/' . $id_asset);
    }
}
