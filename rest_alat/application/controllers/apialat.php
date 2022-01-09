<?php

defined('BASEPATH') or exit('No direct script access allowed');

//require APPPATH . '/libraries/REST_Controller.php';
require('application/libraries/REST_Controller.php');
//use Restserver\Libraries\REST_Controller;

class Apialat extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get()
    {
        $id = $this->get('idbarang');
        if ($id == '') {
            $alat = $this->db->query('select * from alat')->result();
        } else {
            $alat = $this->db->query('select * from alat where idbarang=' . $id)->result();
        }
        $this->response($alat, 200);
        //$this->response(array("result"=>$kontak, 200));

    }

    //Mengirim atau menambah data kontak baru
    function index_post()
    {
        $id = $this->post('idbarang');
        $nama = $this->post('namabarang');
        $jumlah = $this->post('jumlah');


        $alat = $this->db->query(" insert into alat (idbarang,namabarang,jumlah) values ('" . $id . "','" . $nama . "','" . $jumlah . "') ");

        if ($alat) {
            $this->response(array("result" => $alat, 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data kontak yang telah ada
    function index_put()
    {
        $id = $this->put('id');
        $nama = $this->put('nama');
        $nomor = $this->put('nomor');


        $kontak = $this->db->query("update telepon set nama='" . $nama . "',nomor='" . $nomor . "' where id=" . $id);

        if ($kontak) {
            $this->response(array("result" => $kontak, 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data kontak
    function index_delete()
    {
        $id = $this->delete('id');
        $delete = $this->db->query('delete from telepon where id=' . $id);
        if ($delete) {
            $this->response(array('status' => 'success'), 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
}
