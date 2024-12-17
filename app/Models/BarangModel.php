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
}
