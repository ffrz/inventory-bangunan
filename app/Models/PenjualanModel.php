<?php

namespace App\Models;

class PenjualanModel extends BaseModel
{
    protected $table            = 'tbl_penjualan';
    protected $primaryKey       = 'id_penjualan';

    public function getTotalPenjualan($id_barang)
    {
        $builder = $this->db->table($this->table);
        $builder->selectSum('qty', 'total_qty'); // Menggunakan alias untuk kejelasan
        $builder->where('id_barang', $id_barang);
        $query = $builder->get();

        $row = $query->getRow();
        return $row && isset($row->total_qty) ? (int)$row->total_qty : 0;
    }
    public function getTotalPenjualanByMonth($id_barang, $month, $year)
    {
        return $this->where('id_barang', $id_barang)
                    ->where('MONTH(tanggal_penjualan)', $month)
                    ->where('YEAR(tanggal_penjualan)', $year)
                    ->selectSum('qty')  // Menjumlahkan jumlah barang yang terjual
                    ->first()['qty'] ?? 0; // Mengambil nilai qty atau 0 jika tidak ada penjualan
    }
    public function getPenjualanQuery() {
        return $this->builder()
            ->join('tbl_barang', 'tbl_barang.id_barang = tbl_penjualan.id_barang')
            ->select('tbl_penjualan.id_penjualan, tbl_barang.nama_barang, tbl_barang.harga, tbl_penjualan.qty, tbl_penjualan.total');
    }  
    public function getPenjualanTerbanyak()
    {
        return $this->select('tbl_barang.nama_barang, SUM(tbl_penjualan.qty) as stok_terjual')
                    ->join('tbl_barang', 'tbl_barang.id_barang = tbl_penjualan.id_barang')
                    ->groupBy('tbl_penjualan.id_barang')
                    ->orderBy('stok_terjual', 'DESC')
                    ->findAll();
    } 
}