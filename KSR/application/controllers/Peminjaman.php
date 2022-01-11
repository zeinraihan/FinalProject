<?php
class Peminjaman extends CI_Controller
{

    var $API = "";

    function __construct()
    {
        parent::__construct();
        $this->API = "http://localhost/finalproject/rest_peminjaman/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    // menampilkan data alat
    function index()
    {
        $data['datapeminjaman'] = json_decode($this->curl->simple_get($this->API . '/apipeminjaman'));
        $this->load->view('peminjaman/list', $data);
    }
    function create()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'idpeminjaman' => $this->input->post('idpeminjaman'),
                'namapeminjam' => $this->input->post('namapeminjam'),
                'namabarang' => $this->input->post('namabarang'),
                'idunit' => $this->input->post('idunit'),
                'jumlah' => $this->input->post('jumlah')
            );
            $insert =  $this->curl->simple_post($this->API . '/apipeminjaman', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($insert) {
                $this->session->set_flashdata('hasil', 'Insert Data Alat Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Insert Data Alat Gagal');
            }
            redirect('peminjaman');
        } else {
            $this->load->view('peminjaman/create');
        }
    }

    // edit data alat
    function edit()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'idpeminjaman' => $this->input->post('idpeminjaman'),
                'namapeminjam' => $this->input->post('namapeminjam'),
                'namabarang' => $this->input->post('namabarang'),
                'idunit' => $this->input->post('idunit'),
                'jumlah' => $this->input->post('jumlah')
            );
            $insert =  $this->curl->simple_post($this->API
            );
            $update =  $this->curl->simple_put($this->API . '/apipeminjaman', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                $this->session->set_flashdata('hasil', 'Update Data alat Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Update Data alat Gagal');
            }
            redirect('peminjaman');
        } else {
            $params = array('idpeminjaman' =>  $this->uri->segment(3));
            $data['dataalat'] = json_decode($this->curl->simple_get($this->API . '/apipeminjaman', $params));
            $this->load->view('peminjaman/edit', $data);
        }
    }

    // delete data alat
    function delete($id)
    {
        if (empty($id)) {
            redirect('Peminjaman');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/apipeminjaman', array('idpeminjaman' => $id), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Delete Data alat Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data alat Gagal');
            }
            redirect('Peminjaman');
        }
    }
}
