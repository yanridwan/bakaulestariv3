<?php
class AdminModel extends CI_Model
{
    public function select($tabel)
    {
        $select = $this->db->get($tabel);
        return $select->result();
    }

    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function update($tabel, $where, $data)
    {
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    public function delete($tabel, $id)
    {
        $this->db->where($id);
        $this->db->delete($tabel);
    }
    public function uploadGambar()
    {
        $config['upload_path'] = './upload/Agenda/';
        $config['allowed_types']  = 'jpg|png|jpeg';
        $config['max_size'] = '15360';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('gambar')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    public function uploadGalleryAgenda()
    {
        $config['upload_path'] = './upload/Agenda/';
        $config['allowed_types']  = 'jpg|png|jpeg';
        $config['max_size'] = '15360';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('gambar')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    public function uploadGallery()
    {
        $config['upload_path'] = './upload/Gallery/';
        $config['allowed_types']  = 'jpg|png|jpeg|mp4|3gp|flv';
        $config['max_size'] = '15360';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('gambar')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    public function uploadAgendaGallery()
    {
        $config['upload_path'] = './upload/AgendaGallery/';
        $config['allowed_types']  = 'jpg|png|jpeg';
        $config['max_size'] = '15360';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('gambar')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
}
