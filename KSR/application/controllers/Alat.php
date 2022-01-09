<?php
class Alat extends CI_Controller
{

    var $API = "";

    function __construct()
    {
        parent::__construct();
        $this->API = "http://localhost/finalproject/rest_alat/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    // menampilkan data kontak
    function index()
    {
        $data['dataalat'] = json_decode($this->curl->simple_get($this->API . '/apialat'));
        $this->load->view('alat/list', $data);
    }

    // insert data kontak
    function create()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'idbarang'       =>  $this->input->post('idbarang'),
                'namabarang'      =>  $this->input->post('namabarang'),
                'jumlah' =>  $this->input->post('jumlah')
            );
            $insert =  $this->curl->simple_post($this->API . '/apialat', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($insert) {
                $this->session->set_flashdata('hasil', 'Insert Data Alat Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Insert Data Alat Gagal');
            }
            redirect('alat');
        } else {
            $this->load->view('alat/create');
        }
    }

    // edit data kontak
    function edit()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id'       =>  $this->input->post('id'),
                'nama'      =>  $this->input->post('nama'),
                'nomor' =>  $this->input->post('nomor')
            );
            $update =  $this->curl->simple_put($this->API . '/kontak', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                $this->session->set_flashdata('hasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Update Data Gagal');
            }
            redirect('kontak');
        } else {
            $params = array('id' =>  $this->uri->segment(3));
            $data['datakontak'] = json_decode($this->curl->simple_get($this->API . '/kontak', $params));
            $this->load->view('kontak/edit', $data);
        }
    }

    // delete data kontak
    function delete($id)
    {
        if (empty($id)) {
            redirect('kontak');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/kontak', array('id' => $id), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data Gagal');
            }
            redirect('kontak');
        }
    }
}
