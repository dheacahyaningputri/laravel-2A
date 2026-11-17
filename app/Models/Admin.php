<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //nama tabel
    protected $table = 'admins';

    //primary key bukan id, jadi harus didefinisikan
    protected $primaryKey = 'id_admin';

    //primary key diisi manual (tidak auto increment)
    public $incrementing = false;

    //tipe primary key
    protected $keyType = 'int';

    //kolom yang boleh diisi
    protected $fillable = ['id_admin', 'username', 'password'];
}