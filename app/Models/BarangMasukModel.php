<?php

namespace App\Models;

class BarangMasukModel extends BaseModel
{
    protected $table            = 'tbl_barang_masuk';
    protected $primaryKey       = 'id_barang_masuk';

    public function getBarangMasukQuery() {
        return $this->builder('tbl_barang_masuk') // Builder untuk tabel barang_masuk
            ->join('tbl_pesanan', 'tbl_barang_masuk.id_pesanan = tbl_pesanan.id_pesanan') // Bergabung dengan tabel tbl_pesanan
            ->join('tbl_supplier', 'tbl_pesanan.id_supplier = tbl_supplier.id_supplier') // Bergabung dengan tabel tbl_supplier
            ->select('tbl_barang_masuk.id_barang_masuk, tbl_pesanan.nama_barang, tbl_pesanan.total, tbl_supplier.nama_supplier, tbl_barang_masuk.tanggal_masuk') // Kolom yang akan dipilih
            ->orderBy('tbl_barang_masuk.tanggal_masuk', 'ASC'); // Mengurutkan berdasarkan tanggal_masuk
    }
}
