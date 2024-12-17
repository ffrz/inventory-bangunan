<?php

namespace App\Models;

class BarangKeluarModel extends BaseModel
{
    protected $table            = 'tbl_barang_keluar';
    protected $primaryKey       = 'id_barang_keluar';

    public function getBarangKeluarQuery() {
        return $this->builder('tbl_barang_keluar') // Builder untuk tabel barang_keluar
            ->join('tbl_penjualan', 'tbl_penjualan.id_penjualan = tbl_barang_keluar.id_penjualan') // Bergabung dengan tabel tbl_penjualan
            ->join('tbl_barang', 'tbl_barang.id_barang = tbl_penjualan.id_barang') // Bergabung dengan tabel tbl_barang
            ->select('tbl_barang_keluar.id_barang_keluar, tbl_barang.nama_barang, tbl_penjualan.qty, tbl_penjualan.total, tbl_barang_keluar.tanggal_keluar') // Kolom yang akan dipilih
            ->orderBy('tbl_barang_keluar.tanggal_keluar', 'ASC'); // Mengurutkan berdasarkan tanggal_keluar
    }    
}
