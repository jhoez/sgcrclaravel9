<?php

namespace App\Models;

use App\Models\Imagen;
use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Multimedia extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'sc.multimedia';

    /**
     * The primary key associated with the table.
     * @var string
     */
    protected $primaryKey = 'idmult';

    /** 
     * no utilizar los campos created_at y updated_at
    */
    public $timestamps = false;

    /** 
     * attributes
    */
    protected $fillable = [
        'nombmult',
        'tipomult',
        'fkpro',
        'fkimag',
    ];

    /** 
     * relación con proyecto
    */
    public function relproyecto()
    {
        return $this->belongsTo(Proyecto::class, 'fkpro');
    }

    /** 
     * relación con imagen
    */
    public function relimagen()
    {
        return $this->belongsTo(Imagen::class, 'fkimag');
    }
}
