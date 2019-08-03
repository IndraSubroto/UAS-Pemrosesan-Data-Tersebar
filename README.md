# UAS Pemrosesan Data Tersebar

Aplikasi Pembelian dan Penjualan dengan database Oracle, dengan System Administrator menggunakan PHP CI dan Interface di Mobile Apps (Android). Komunikasi data antar Aplikasi menggunakan Restfull API di oracle.

## Requirements

- [Virtual Box](https://www.virtualbox.org/wiki/Downloads) (Virtual Server)
- [Oracle Developer Day 11g](https://www.oracle.com/technetwork/database/enterprise-edition/databaseappdev-vm-161299.html) (Database)
- [Android Studio](https://developer.android.com/studio) (Android IDE)
- [CodeIgniter 3.1.10+](https://www.codeigniter.com/) (Framework PHP)

## Tutorial

### Database

Pertama kali yang harus kita buat adalah Tabel terlebih dahulu. Disini saya menggunakan  7 tabel. 5 tabel untuk mengisikan data yang diinputkan, dan 2 tabel view.:

1. [Customer](#table-customer)
2. [Barang](#table-barang)
3. [Supplier](#table-supplier)
4. [Pembelian](#table-pembelian)
5. [Penjualan](#table-penjualan)
6. [View Penjualan](#table-penjualan)
7. [View Pembelian](#table-pembelian)

#### Table Customer
```sql
CREATE TABLE  "UAS_CUSTOMER"
(  "KD_CUSTOMER" NUMBER(5,0),
	"USERNAME" VARCHAR2(15),
	"PASSWORD" VARCHAR2(255),
	"ALAMAT" VARCHAR2(20),
	"NO_TLP" CHAR(13),
	CONSTRAINT "UAS_CUSTOMER_PK" PRIMARY KEY ("KD_CUSTOMER") ENABLE
)
```

#### Table Barang
```sql
CREATE TABLE  "UAS_BARANG"
(  "KD_BARANG" NUMBER(5,0),
"NM_BARANG" VARCHAR2(25),
"JML_BARANG" NUMBER(7,0),
"HARGA" FLOAT(2),
CONSTRAINT "UAS_BARANG_PK" PRIMARY KEY ("KD_BARANG") ENABLE
)
```
#### Table Supplier
```sql
CREATE TABLE  "UAS_SUPPLIER"
(  "ID_SUPPLIER" NUMBER(5,0),
	"NM_SUPPLIER" VARCHAR2(25),
	"ALAMAT" VARCHAR2(50),
	"NO_TLP" CHAR(13),
	CONSTRAINT "UAS_SUPPLIER_PK" PRIMARY KEY ("ID_SUPPLIER") ENABLE
)
```
#### Table Pembelian
```sql
CREATE TABLE  "UAS_PEMBELIAN"
(  "KD_TRANSAKSI" NUMBER(5,0),
	"KD_BARANG" NUMBER(5,0),
	"KD_SUPPLIER" NUMBER(5,0),
	"TGL" DATE,
	"JML" NUMBER(7,0),
	"HARGA" FLOAT(2),
	CONSTRAINT "UAS_PEMBELIAN_PK" PRIMARY KEY ("KD_TRANSAKSI") ENABLE
)
```
#### Table Penjualan
```sql
CREATE TABLE  "UAS_PENJUALAN"
(  "KD_TRANSAKSI" NUMBER(5,0),
	"KD_BARANG" NUMBER(5,0),
	"KD_CUSTOMER" NUMBER(5,0),
	"TGL" DATE,
	"JML" NUMBER(7,0),
	"HARGA" FLOAT(126),
	CONSTRAINT "UAS_PENJUALAN_PK" PRIMARY KEY ("KD_TRANSAKSI") ENABLE
)
```
#### Table View Pembelian
```sql


CREATE OR REPLACE FORCE VIEW  "UAS_VW_PEMBELIAN" 
	("KD_TRANSAKSI", "NM_BARANG", "NM_SUPPLIER", "TGL", "JML", "HARGA") 
	AS SELECT A.KD_TRANSAKSI, B.NM_BARANG, C.NM_SUPPLIER, A.TGL, A.JML, A.HARGA
	FROM UAS_PEMBELIAN A, UAS_SUPPLIER C, UAS_BARANG B
	WHERE A.KD_BARANG=B.KD_BARANG
	AND A.KD_SUPPLIER=C.ID_SUPPLIER
```
#### Table View Penjualan
```sql
CREATE OR REPLACE FORCE VIEW  "UAS_VW_PENJUALAN" 
("KD_TRANSAKSI", "NM_BARANG", "USERNAME", "TGL", "JML", "HARGA") AS SELECT A.KD_TRANSAKSI, B.NM_BARANG, C.USERNAME, A.TGL,A.JML, A.HARGA
FROM UAS_PENJUALAN A, UAS_CUSTOMER C, UAS_BARANG B
WHERE A.KD_BARANG=B.KD_BARANG
AND A.KD_CUSTOMER=C.KD_CUSTOMER
```

Setelah selesai membuat tabel selanjutnya adalah membuat Sequence di tiap – tiap tabel. Jalankan query nya di SQL Comannds.

| Tabel | Query |
| ------ | ------ |
| **Barang** |CREATE SEQUENCE  "UAS_BARANG_SEQ" MINVALUE 1 MAXVALUE 999999999999999999999999999 INCREMENT BY 1 START WITH 21 CACHE 20; |
| **Customer** | CREATE SEQUENCE  "UAS_CUSTOMER_SEQ" MINVALUE 1  MAXVALUE 999999999999999999999999999 INCREMENT BY 1 START WITH 21 CACHE 20; |
| **Supplier** | CREATE SEQUENCE  "UAS_SUPPLIER_SEQ" MINVALUE 1  MAXVALUE 999999999999999999999999999 INCREMENT BY 1 START WITH 21  CACHE 20; |
| **Pembelian** |CREATE SEQUENCE  "UAS_PEMBELIAN_SEQ" MINVALUE 1  MAXVALUE 999999999999999999999999999 INCREMENT BY 1 START WITH 21  CACHE 20;|
| **Penjualan** |CREATE SEQUENCE  "UAS_PENJUALAN_SEQ" MINVALUE 1  MAXVALUE 999999999999999999999999999 INCREMENT BY 1 START WITH 21  CACHE 20;|

### *RESTful Services*

Selanjutnya membuat Restfull Services di Oracle.
1. Masuk ke Restfull Service
![RESTful Button](./picture/restful-button.png)

2. Setelah masuk, buat Restfull Service Module dengan cara klik “Create ”
3. Selanjutnnya isi form nya
![Form RESTful Module](./picture/form-restful-module.png)
4. Isi “Name Box” (saya akan membuatnya dengan nama module “UAS”)
5. Isi “URI Template” (isi sesuai tabel yang digunakan)
6. Pilih “Method : GET”
7. Isi “Source” dengan query sql untuk menampilkan data
8. Klik “Create Module”  
   
 Dalam Restfull ini saya menggunakan 4 method:  
| Method | Description |
| ------ | ------ |
| **GET** | menyediakan hanya akses baca pada _resource_ |
| **POST** | digunakan untuk menciptakan _resource_ baru |
| **PUT** | digunakan untuk memperbarui _resource_ yang ada atau membuat _resource_ baru |
| **DELETE** | digunakan untuk menghapus _resource_ |
  
Jika ingin menambahkan  template cukup ikuti langkah berikut.

1. Klik “+Create Template”

![Create Template](./picture/create-template.png)

Create Template

2. Isi “URI Template “ sesuai nama tabel

![URI Template](./picture/uri-template.png)

3. Klik “Create”

<![endif]-->

Jika ingin membuat Handler GET, POST, PUT, dan Delete ikuti langkah berikut.

1. Klik “+Create Handler”

![Create Handler](./picture/Create-Handler.png)

2. Pilih “Method : POST”
3. Pilih “Source Type : PL/SQL”
4. Isi “MIME Types Allowed “ dengan “application/json”
5. Ubah “Requires Secure Access” menjadi “No”.
6. Isi “Source” dengan query POST, sesuai dengan tabel yang ingin digunakan
7. Klik “Create”
![Form Handler](./picture/Form-Handler.png)

Jika Ingin memasukkan method PUT cukup ubah langkah 1 menjadi “Method : PUT” dan isi “Source” dengan query PUT, begitu juga GET dan Delete (GET dan Delete tidak perlu menambah kan “application/json”).

Ulangi langkah diatas sampai terbentuk seperti ini:
![RESTful Services](./picture/all-module-restfull.png)
PUT dan DELETE menggunakan {id} untuk mengidentifikasi data yang akan dieksekusi. 

*Resource Handler* & *Query* dapat dilihat pada gambar dibawah ini.

#### Query Yang Dibutuhkan

- **GET Barang**  
```sql
SELECT * FROM uas_barang
```
- **POST Barang**  
```sql
DECLARE
	id uas_barang.kd_barang%TYPE;
BEGIN
	id := uas_barang_seq.nextval;
INSERT INTO uas_barang
		(kd_barang, nm_barang, jml_barang, harga)
	VALUES
		(id, :nm_barang, :jml_barang, :harga);
	:uas_barang := id;
END;
```
- **PUT Barang**  
```sql
BEGIN
	UPDATE uas_barang SET nm_barang = :nm_barang, jml_barang = :jml_barang, harga = :harga
	WHERE kd_barang = :id;
	:location := :id;
	:STATUS := 200;
END;
```
- **DELETE Barang**  
```sql
BEGIN
	DELETE uas_barang WHERE kd_barang = :id;
	COMMIT;
END;
```

- **GET Customer**  
```sql
SELECT * FROM uas_customer
```
- **POST Customer**  
```sql
DECLARE
	id uas_customer.kd_customer%TYPE;
BEGIN
	id := uas_customer_seq.nextval;
INSERT INTO uas_customer
	(kd_customer, username, alamat, no_tlp, password)
		VALUES
	(id, :username, :alamat, :no_tlp, :password);
	:uas_customer := id;
END;
```
- **PUT Customer**  
```sql
BEGIN
	UPDATE uas_customer SET username = :username, alamat = :alamat, no_tlp = :no_tlp, password = :pasword
	WHERE kd_customer = :id;
		:location := :id;
		:STATUS := 200;
	END;
```
- **DELETE Customer**  
```sql
BEGIN
	DELETE uas_customer WHERE kd_customer = :id;
	COMMIT;
END;
```
- **GET Penjualan**  
```sql
SELECT * FROM uas_vw_penjualan
```
- **POST Penjualan**  
```sql
DECLARE
	id uas_penjualan.kd_transaksi%TYPE;
BEGIN
	id := uas_penjualan_seq.nextval;
INSERT INTO uas_penjualan
	(kd_transaksi, kd_barang, kd_customer, tgl, jml, harga)
VALUES
	(id, :kd_barang, :kd_customer, TO_DATE(:tgl, 'yyyy/mm/dd'), :jml, :harga);
:uas_penjualan := id;
END;
```
- **GET Pembelian**  
```sql
SELECT * FROM uas_vw_pembelian
```
- **POST Pembelian**  
```sql
DECLARE
	id uas_pembelian.kd_transaksi%TYPE;
BEGIN
	id := uas_pembelian_seq.nextval;
INSERT INTO uas_pembelian
	(kd_transaksi, kd_barang, kd_supplier, tgl, jml, harga)
	VALUES
	(id, :kd_barang, :kd_supplier, TO_DATE(:tgl, 'yyyy/mm/dd'), :jml, :harga);
:uas_pembelian := id;
END;
```
- **GET Supplier**  
```sql
SELECT * FROM uas_supplier
```
- **POST Supplier**  
```sql
DECLARE
	id uas_supplier.kd_supplier%TYPE;
BEGIN
	id := uas_supplier_seq.nextval;
INSERT INTO uas_supplier
	(id_supplier, nm_supplier, alamat, no_tlp)
VALUES
	(id, :nm_supplier, :alamat, :no_tlp);
	:uas_supplier := id;
END;
```
- **PUT Supplier**  
```sql
BEGIN
	UPDATE t_supplier SET nm_supplier = :nm_supplier, alamat = :alamat, no_tlp = :no_tlp
	WHERE id_supplier = :id;
		:location := :id;
		:STATUS := 200;
END;
```
- **DELETE Supplier**  
```sql
BEGIN
	DELETE t_supplier WHERE id_supplier = :id;
	COMMIT;
END;
```

 

### CodeIgniter

[Script](./oracle-uas/application/libraries/Api.php) dibawah ini merupakan script php yang digunakan untuk mengakses *RESTful Services* dari Oracle menggunakan library [Goutte](https://github.com/FriendsOfPHP/Goutte).

```php
use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');

class Api
{
    private $client;

    public function __construct()
    {
        // base url yang digunakan untuk mengakses RESTful API
        $this->client = new Client(['base_uri' => 'http://192.168.43.75:8888/apex/obe/']);
    }

    public function request($method, $uri, $data = [])
    {
        // data di convert menjadi data JSON
        $options['json'] = $data;

        // jika metode HTTP nya adalah DELETE maka response yang diberikan adalah status code nya
        if ($method == 'delete') {
            $request = $this->client->request($method, $uri);
            return $request->getStatusCode();
        }

        $request = $this->client->request($method, $uri, $options);

        // response yang diberikan berupa content nya
        return $request->getBody()->getContents();
    }
}
```

#### Tampilan Web

- Barang
![List Barang](./picture/admin-1.png)

- Customer
![List Customer](./picture/admin-2.png)

- Supplier
![List Supplier](./picture/admin-3.png)

- Penjualan
![List Penjualan](./picture/admin-4.png)

- Pembelian
![List Pembelian](./picture/admin-5.png)


#### Tampilan Mobile Apps

![Gambar Android](./picture/android.png)

### License

Copyright © 2019, [IndraSubroto](https://github.com/IndraSubroto).
Released under the [MIT License](LICENSE).
