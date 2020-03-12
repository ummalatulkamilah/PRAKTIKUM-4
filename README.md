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









###
  



