<?php

namespace App\Models;

class BarangSupplierModel extends BaseModel
{
    protected $table            = 'tbl_barang_supplier';
    protected $primaryKey       = 'id_barang_supplier';

    public function getBarangById($id_barang_supplier)
    {
        return $this->where('id_barang_supplier', $id_barang_supplier)->first();
    }
}
