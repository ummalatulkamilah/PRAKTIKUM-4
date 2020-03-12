<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//memanggil file Rest_controler menggunakam require APPATH
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Kontak extends REST_Controller {

// function contract pada controller kontak.php digunakan untuk memanggil atau mengaktifkan config databese.php yang sudah dikonfigurasi sesuai web server saya
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database(); // mengaktifkan database
    }

//function index_get berfungsi untuk menampilkan data dari database kontak
    function index_get() {
        $id = $this->get('id'); //memnangkap data id dari url
        
    //kondisi untuk menambahkan data 
        if ($id == '') {
            $kontak = $this->db->get('telepon')->result(); //menampilkan seluruh data pada tabel telepon (jika id tidak ditentukan)
        } else {
        $this->db->where('id', $id); //memanggil id yang sesuai dengan id dalam database yang tersimpan di variabel $id 
            $kontak = $this->db->get('telepon')->result(); //meneampilkan telepon yang tabel telepon sesuai id yang dipanggil
        }
        $this->response($kontak, 200); //jika pr paoses menampilkan data database kontak berhasil (tidak ada error) maka httpcode yang diberikan adalah 200(success) serta menampilkan data yang digunakan untuk melakukan request.
    }


////function index_post berfungsi untuk menambahkan data dari database kontak
    function index_post() {
        //menambahkan data dan menguabahnya menjadi array 
        $data = array(
                    'id'           => $this->post('id'),
                    'nama'          => $this->post('nama'),
                    'nomor'    => $this->post('nomor'));
        $insert = $this->db->insert('telepon', $data); //menambahkan data yang ada variabel $data ke tabel telepon
        if ($insert) {
        // jika insert pada database berhasil (tidak ada error) maka httpcode yang diberikan adalah 200(success) 
            $this->response($data, 200); 
        } else {
            //jika insert pada database gagal (terdapat error) maka menampilkan error dengan http code 502(internal server error
            $this->response(array('status' => 'fail', 502));
        }
    }

////function index_put berfungsi untuk melakukan perubahan data dari database kontak
    function index_put() {
        $id = $this->put('id'); //mengaktifkan method _PUT,dan parameternya diisi dengan id yang akan di update

        //melakukan perubahan data dan mengubah data yang dirubah menjadi array
        $data = array(
                    'id'       => $this->put('id'),
                    'nama'          => $this->put('nama'),
                    'nomor'    => $this->put('nomor'));
        $this->db->where('id', $id); //memanggil id yang sesuai dengan id dalam database yang tersimpan di variabel $id 
        $update = $this->db->update('telepon', $data); //melakukan update pada tabel telepon, parameter pertama berisi tabel yang akan di tuju, parameter kedua berisi data baru yang akan dimasukkan ke tabell
        if ($update) {
            //jika update pada database berhasil (tidak ada error) maka httpcode yang diberikan adalah 200(success) 
            $this->response($data, 200);
        } else {
         //jika update pada database gagal (terdapat error) maka menampilkan error dengan http code 502(internal server error
            $this->response(array('status' => 'fail', 502));
        }
    }

////function index_delete berfungsi untuk melakukan perubahan data dari database kontak
    function index_delete() {
        $id = $this->delete('id'); //mengaktifkan method _DELETE,dan parameternya diisi dengan id yang akan di update
        $this->db->where('id', $id); //memanggil id yang sesuai dengan id dalam database yang tersimpan di variabel $id 
        $delete = $this->db->delete('telepon'); //melakukan hapus pada tabel telepon, parameter berisi nama tabel yang akan di tuju
        if ($delete) {
            //jika delete data pada database berhasil (tidak ada error) maka httpcode yang diberikan adalah 201(success) 
            $this->response(array('status' => 'success'), 201);
        } else {
           //jika delete data pada database gagal (terdapat error) maka menampilkan error dengan http code 502(internal server error
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>