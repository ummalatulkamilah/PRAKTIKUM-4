# PRAKTIKUM-4 
# LANGKAH-LANGKAH MEMBUAT REST API MENGGUNAKAN CODEIGNITER


## Langkah 1 : Persiapan 
1.	Persiapkan web server xampp
2.	Persiapkan Text editor, bisa mengunakan sublime text, Visual Studio code atau lainnya
3.	Persiapkan Codeigniter 
4.	Codeigniter dan library REST server, dapat diunduh di https://github.com/chriskacerguis/codeigniter-restserver untuk versi terbaru,   versi yang digunakan disini adalah https://github.com/ardisaurus/ci-restserver.
5.	Download dan install Postman 

## Langkah 2 : Instalasi Codeigniter dan library REST server
1.	Extract atau unzip Codeigniter dan library REST server yang telah didownload.
2.	Kemudian Rename folder Codeigniter dan library REST server menjadi rest_ci
3.	Pindah folder rest_ci ke folder C:\xampp\htdocs. 
4.	Masukan http://localhost/rest_ci/ pada web address, jika muncul form REST server test maka instalasi berhasil.

## Langkah 3 : Konfigurasi Database
1.	Buat database dengan nama kontak. Dan buat tabel bernama telepon pada database tersebut dengan field id (int 11 AUTO_INCREMENT), nama (varchar 30), nomor (varchar 11):


    membuat database kontak di phpmyadmin
    
    ```CREATE DATABASE kontak;```


    membuat tabel telepon pada database kontak
    
```CREATE TABLE IF NOT EXISTS `telepon` 
(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nomor` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;```

     
   mengisi tabel telepon dengan data berikut
   
   
   ```USE kontak;
INSERT INTO `telepon` (`id`, `nama`, `nomor`) VALUES
(1, 'Orion', '08576666762'),
(2, 'Mars', '08576666770'),
(7, 'Alpha', '08576666765');
```

```

) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;
```


## Langkah 4 : Membuat Controler bernama kontak.php.

Buat file php baru di di rest_ci/application/controller dengan nama kontak.php```
```
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kontak extends REST_Controller {```

    ```function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $kontak = $this->db->get('telepon')->result();
        } else {
            $this->db->where('id', $id);
            $kontak = $this->db->get('telepon')->result();
        }
        $this->response($kontak, 200);
    }

    
//Mengirim atau menambah data kontak baru
    function index_post() {
        $data = array(
                    'id'           => $this->post('id'),
                    'nama'          => $this->post('nama'),
                    'nomor'    => $this->post('nomor'));
        $insert = $this->db->insert('telepon', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data kontak yang telah ada
    function index_put() {
        $id = $this->put('id');
        $data = array(
                    'id'       => $this->put('id'),
                    'nama'          => $this->put('nama'),
                    'nomor'    => $this->put('nomor'));
        $this->db->where('id', $id);
        $update = $this->db->update('telepon', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data kontak
    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('telepon');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>
```

## Langkah 5 : Pengujian menggunakan Plugin Postman.
1.	Pengujian pertama : melakukan request membaca data menggunakan metode GET.
Pada pengujian pertama ini fungsi index_get pada controller kontak.php yang digunakan. Untuk menguji code yang ada fungsi index_get, buka postman, pilih metode get masukkan  http://127.0.0.1/rest_ci/index.php/kontak, lalu send.

2.	Pengujian kedua : melakukan request untuk menambah data baru menggunakan metode GET.
Pada pengujian kedua ini fungsi index_post pada controller kontak.php yang digunakan. Untuk menguji code yang ada fungsi index_post, buka postman, pilih metode post masukkan  http://127.0.0.1/rest_ci/index.php/kontak, lalu send.

3.	Pengujian ketiga : melakukan request untuk update data menggunakan metode PUT.
Pada pengujian kedua ini fungsi index_put pada controller kontak.php yang digunakan. Untuk menguji code yang ada fungsi index_put, buka postman, pilih metode put masukkan  http://127.0.0.1/rest_ci/index.php/kontak, lalu send.

4.	Pengujian Keempat : melakukan request untuk hapus data menggunakan metode DELETE.
Pada pengujian kedua ini fungsi index_delete pada controller kontak.php yang digunakan. Untuk menguji code yang ada fungsi index_delete, buka postman, pilih metode DELETE masukkan  http://127.0.0.1/rest_ci/index.php/kontak, lalu send.




