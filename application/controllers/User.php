<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
		$this->load->model('AdminModel');
		$this->load->model('AgendaModel');
		$this->load->model('SearchModel');
    }
	public function home()
	{
		$data['news'] = $this->UserModel->getNews();
		$data['asd'] = $this->UserModel->terlaksana();
		$data['sch'] = $this->UserModel->terjadwal();
		// $data['gallery'] = $this->db->get('gallery')->result();
		$this->load->view('user/homepage', $data);
	}

    public function agenda() {
		$data['news'] = $this->UserModel->getNews();
		$data['asd'] = $this->UserModel->terlaksana();
		$data['sch'] = $this->UserModel->terjadwal();
		$data['model'] = $this->AgendaModel->paginationAgenda();
		// $data['agenda']=$this->db->get('agenda')->result();
        $this->load->view('user/agenda', $data);
    }

    public function profile()
	{
		$this->load->view('user/profile');
	}
    public function gallery()
	{
        $kategori = $this->input->get('kategori');
        if ($kategori && !empty($kategori)) {
            $this->session->set_userdata('kategori', $kategori);
        } else {
            $kategori = $this->session->userdata('kategori');
        }

        if ($kategori == 'all') {
            $kategori = null;
            $this->session->unset_userdata('kategori');
        }
        $data['kategori'] = $kategori;


		$data['aaa'] = $this->UserModel->coba($kategori);




        
        // var_dump($data);
        // die;
		// $data['bakaulestari'] = $this->db->from('gallery')->where('gallery_status = "Bakau Lestari"')->get()->result();
		// $data['satwa'] = $this->db->from('gallery')->where('gallery_status = "Satwa"')->get()->result();
		// $data['gallery'] = $this->db->get('gallery')->result();
		$this->load->view('user/gallery', $data);
	}
    public function contact()
	{
		$this->load->view('user/contact');
	}
	public function detailAgenda($id)
	{
		$data['terjadwal'] = $this->UserModel->getTerjadwal($id);
		$data['terlaksana'] = $this->UserModel->getTerlaksana($id);
		$data['relate'] = $this->UserModel->getTerlaksana($id);
		$data['agenda'] = $this->UserModel->getAgenda($id);
		$this->load->view('user/detail-Agenda', $data);
	}
	// public function order()
	// {
    //     $data = array(
    //         'customer_nama' => $this->input->post('nama'),
    //         'customer_email' => $this->input->post('email'),
    //         'customer_phone' => $this->input->post('phone'),
    //         'customer_subject' => $this->input->post('subject'),
    //         'customer_order' => $this->input->post('pesan'),
    //     );

    //     $this->AdminModel->insert('order', $data);
    //     redirect('User/contact');
    // }
	public function pesan()
	{
        $data = array(
            'customer_nama' => $this->input->post('nama'),
            'customer_email' => $this->input->post('email'),
            'customer_phone' => $this->input->post('phone'),
            'customer_subject' => $this->input->post('subject'),
            'customer_order' => $this->input->post('pesan'),
			'customer_status' => "baru",
        );

        if ($this->db->insert('order', $data)) {
            $return = array('true');
        } else {
            $return = array('false');
        }
        echo json_encode($return);
    }

	public function orderCustomer()
    {
        $data = array(
            'customer_nama' => $this->input->post('nama'),
            'customer_email' => $this->input->post('email'),
            'customer_phone' => $this->input->post('phone'),
            'customer_subject' => $this->input->post('subject'),
            'customer_order' => $this->input->post('pesan'),
			'customer_status' => "baru",
        );

        $this->session->set_flashdata('sucess', 'Terimakasih Telah Mengisi Form');
        $this->AdminModel->insert('order', $data);
        redirect('user/contact');
    }

    public function search()
    {
		$data['model'] = $this->AgendaModel->paginationAgenda();
		$data['news']=$this->UserModel->getNews();
		$data['asd']=$this->UserModel->terlaksana();
		$data['sch']=$this->UserModel->terjadwal();
		$data['agenda']=$this->db->get('agenda')->result();

		 
        $post = $this->input->post();
        if (isset($post["search"])) {
            $query = $post["search"];
            $data["datasearch"] = $this->SearchModel->SearchAll($query);
            // var_dump($data["datasearch"]);
        }

        $this->load->view('user/search.php', $data);
    }
}
