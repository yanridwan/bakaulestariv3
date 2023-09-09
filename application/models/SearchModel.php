<?php defined('BASEPATH') or exit('No direct script access allowed');

class SearchModel extends CI_Model
{
    public function SearchAll($query)
    {
        $this->db->like('agenda_nama', $query);
        $data['cari'] = $this->db->get('agenda')->result();
        return $data;
    }
}
