<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'sc.catalogo';

    /**
     * The primary key associated with the table.
     * @var string
     */
    protected $primaryKey = 'idcata';

    /**
     * Indicates if the model should be timestamped.
     * @var bool
     */
    public $timestamps = false;

    /**
     * The model's default values for attributes.
     * @var array
     */
    protected $attributes = [];
}
