<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use HasUUID;
    use softDeletes;
    /*definimos la tabla, el primaryKey iindicamos el nombre de campo
    y el tipo de llave  */

    protected $table = "productos";
    protected $primaryKey = "id";
    protected $uuidFieldName = "id";
    protected $KeyType = "string";
}
