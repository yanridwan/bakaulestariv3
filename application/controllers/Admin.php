<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('role') != 'admin'){
			redirect('login');
		}
        $this->load->model('AdminModel');
        $this->load->model('AgendaModel');
    }
	public function home()
	{
        $data['terlaksana'] = $this->db->select()->from('agenda')->where('agenda_status = "sudah terlaksana"')->get()->num_rows();
        $data['terjadwal'] = $this->db->select()->from('agenda')->where('agenda_status = "terjadwal"')->get()->num_rows();
        $data['gallery'] = $this->db->select()->from('gallery')->get()->num_rows();
        $data['order'] = $this->db->from('order')
            ->order_by('order.tanggal_masuk', 'DESC')
            ->limit(5)
            ->get()
            ->result();
        $data['agenda'] = $this->db->from('agenda')
            ->order_by('agenda.agenda_id', 'DESC')
            ->limit(5)
            ->get()
            ->result();
		$this->load->view('admin/home', $data);
	}
    public function gallery()
	{
		$data['gallery'] = $this->db->from('gallery')->order_by('gallery_id', 'desc')->get()->result();
		// $data['gallery'] = $this->AdminModel->select('gallery');
		$this->load->view('admin/gallery',$data);
	}
    public function agenda()
	{
		$data['agenda'] = $this->db->from('agenda')->order_by('agenda_tanggal', 'desc')->get()->result();
		// $data['agenda'] = $this->AdminModel->select('agenda');
		$this->load->view('admin/agenda', $data);
	}
    public function user()
	{
		$data['user'] = $this->AdminModel->select('user');
		$this->load->view('admin/user', $data);
	}
	public function order()
	{
		$data['order'] = $this->db->from('order')->order_by('customer_id', 'desc')->get()->result();
		// $data['order'] = $this->AdminModel->select('order');
		$this->load->view('admin/order', $data);
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////

	public function agendaData()
	{
		$data['agenda'] = $this->db->from('agenda')->order_by('agenda_tanggal', 'desc')->get()->result();
		// $data['agenda'] = $this->AdminModel->select('agenda');
		$this->load->view('admin/agenda', $data);
	}

	public function agendaTerjadwal()
	{
		$data['agenda'] = $this->db->from('agenda')->where('agenda_status = "terjadwal"')->order_by('agenda_tanggal', 'desc')->get()->result();
		// $data['agenda'] = $this->AdminModel->select('agenda');
		$this->load->view('admin/agenda/agendaTerjadwal', $data);
	}

	public function agendaTerlaksana()
	{
		$data['agenda'] = $this->db->from('agenda')->where('agenda_status = "sudah terlaksana"')->order_by('agenda_tanggal', 'desc')->get()->result();
		// $data['agenda'] = $this->AdminModel->select('agenda');
		$this->load->view('admin/agenda/agendaTerlaksana', $data);
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////


    public function agendaGallery()
	{
		$data['agenda'] = $this->db->from('agenda')->order_by('agenda_tanggal', 'desc')->get()->result();
		// $data['agenda'] = $this->AdminModel->select('agenda');
		$this->load->view('admin/agenda/agendaGallery', $data);
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////


    public function agendaDetail($id)
	{
        $data['agenda'] = $this->AgendaModel->getAgenda($id);
        $data['agendaDetail'] = $this->AgendaModel->getAgendaDetail($id);
		// $data['agenda'] = $this->db->from('agenda')->order_by('agenda_tanggal', 'desc')->get()->result();
		// $data['agenda'] = $this->AdminModel->select('agenda');
		$this->load->view('admin/agenda/agendaDetail', $data);
	}
}