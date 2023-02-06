<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'sc.imagen';

    /**
     * The primary key associated with the table.
     * @var string
     */
    protected $primaryKey = 'idimag';

    /** 
     * si solo quieres utilizar created_at debes asignarle a updated_at el valor de null
    */
    //const UPDATED_AT = null;

    /** 
     * no utilizar los campos created_at y updated_at
    */
    public $timestamps = false;

    /** 
     * campos de almacenamiento masivo
    */
    protected $fillable = [
        'idimag',
        'nombimg',
        'tipoimg',
        'fkuser',
    ];
}
