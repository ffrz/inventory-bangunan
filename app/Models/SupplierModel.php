<?php

namespace App\Models;

class SupplierModel extends BaseModel
{
    protected $table            = 'tbl_supplier';
    protected $primaryKey       = 'id_supplier';

    public function getSupplierQuery(){
        return $this->builder()->select('id_supplier,nama_supplier,alamat,kategori');
    }
}
