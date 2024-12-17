<?php

namespace App\Models;

class UserModel extends BaseModel
{
    protected $table            = 'tbl_user';
    protected $primaryKey       = 'id_user';
    
    public function getUserQuery(){
        return $this->builder()->select('id_user,nama_lengkap,username,role');
    }
}
