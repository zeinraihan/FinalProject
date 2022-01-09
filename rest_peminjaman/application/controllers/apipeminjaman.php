<?php

defined('BASEPATH') or exit('No direct script access allowed');

//require APPPATH . '/libraries/REST_Controller.php';
require('application/libraries/REST_Controller.php');
//use Restserver\Libraries\REST_Controller;

class Apipeminjaman extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data peminjaman
    function index_get()
    {
        $id = $this->get('idpeminjaman');
        if ($id == '') {
            $peminjaman = $this->db->query('select * from peminjaman')->result();
        } else {
            $peminjaman = $this->db->query('select * from peminjaman where idpeminjaman=' . $id)->result();
        }
        $this->response($peminjaman, 200);
        //$this->response(array("result"=>$peminjaman, 200));

    }

    //Mengirim atau menambah data peminjaman baru
    function index_post()
    {
        $id = $this->post('idpeminjaman');
        $nama = $this->post('namapeminjam');
        $barang = $this->post('namabarang');
        $unit = $this->post('unit');
        $jumlah = $this->post('jumlah');

        $peminjaman = $this->db->query(" insert into peminjaman (idpeminjaman,namapeminjam,namabarang,unit,jumlah) values ('" . $id . "','" . $nama . "','" . $barang . "','" . $unit . "','" . $jumlah . "') ");

        if ($peminjaman) {
            $this->response(array("result" => $peminjaman, 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data peminjaman yang telah ada
    function index_put()
    {
        $id = $this->put('idpeminjaman');
        $nama = $this->put('namapeminjam');
        $barang = $this->put('namabarang');
        $unit = $this->put('unit');
        $jumlah = $this->put('jumlah');



        $peminjaman = $this->db->query("update peminjaman set namapeminjam='" . $nama . "',namabarang='" . $barang . "',unit='" . $unit . "',jumlah='" . $jumlah . "' where idpeminjaman=" . $id);

        if ($peminjaman) {
            $this->response(array("result" => $peminjaman, 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data peminjaman
    function index_delete()
    {
        $id = $this->delete('idpeminjaman');
        $delete = $this->db->query('delete from peminjaman where idpeminjaman=' . $id);
        if ($delete) {
            $this->response(array('status' => 'success'), 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
}
