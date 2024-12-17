<?php

namespace App\Models;

class BarangModel extends BaseModel
{
    protected $table            = 'tbl_barang';
    protected $primaryKey       = 'id_barang';

    public function getBarangById($id_barang)
    {
        return $this->where('id_barang', $id_barang)->first();
    }
    public function getBarangQuery() {
        return $this->builder()
            ->join('tbl_supplier', 'tbl_supplier.id_supplier = tbl_barang.id_supplier')
            ->select('tbl_barang.id_barang, tbl_barang.nama_barang, tbl_barang.stok, tbl_barang.harga, tbl_supplier.nama_supplier');
    }
    public function getStokHampirHabis() {
        $stokMinimum = 50; // Stok minimum yang ditetapkan dalam program
        return $this->builder()
            ->where('stok <=', $stokMinimum)
            ->select('nama_barang, stok')
            ->get()
            ->getResultArray();
    }  
}
