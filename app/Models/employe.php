<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    //definisikan nama tabel jika namanya tidak dalam bentuk jamak Model, semisal tb_employe maka harus didefinikasi
    protected $table = 'employes';

    //definiskan primary key jika fieldnya bukan id
    protected $primaryKey = 'id';

    //jika primary ke bukan integer semisal string
    protected $keyTipe = 'integer';
}
