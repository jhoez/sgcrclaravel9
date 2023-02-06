<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proyecto extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'sc.proyecto';

    /**
     * The primary key associated with the table.
     * @var string
     */
    protected $primaryKey = 'idpro';

    /** 
     * no utilizar los campos created_at y updated_at
    */
    public $timestamps = false;

    /** 
     * attributes
    */
    protected $fillable = [
        'nombpro',
        'creador',
        'colaboracion',
        'descripcion',
        'create_at',
        'update_at',
        'fkuser',
    ];

    public function relusuario()
    {
        return $this->belongsTo(User::class,'fkuser');
    }
}
