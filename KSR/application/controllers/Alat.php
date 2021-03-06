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

    // menampilkan data alat
    function index()
    {
        $data['dataalat'] = json_decode($this->curl->simple_get($this->API . '/apialat'));
        $this->load->view('alat/list', $data);
    }

    // insert data alat
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

    // edit data alat
    function edit()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'idbarang'       =>  $this->input->post('idbarang'),
                'namabarang'      =>  $this->input->post('namabarang'),
                'jumlah' =>  $this->input->post('jumlah')
            );
            $update =  $this->curl->simple_put($this->API . '/apialat', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                $this->session->set_flashdata('hasil', 'Update Data alat Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Update Data alat Gagal');
            }
            redirect('alat');
        } else {
            $params = array('idbarang' =>  $this->uri->segment(3));
            $data['dataalat'] = json_decode($this->curl->simple_get($this->API . '/apialat', $params));
            $this->load->view('alat/edit', $data);
        }
    }

    // delete data alat
    function delete($id)
    {
        if (empty($id)) {
            redirect('alat');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/apialat', array('idbarang' => $id), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Delete Data alat Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data alat Gagal');
            }
            redirect('alat');
        }
    }
}
