<?php


namespace DanielSann\WebDasExcelCategorias\Models;


use Illuminate\Database\Eloquent\Model;

class LegCategoriasAfiliados extends Model
{
    protected $table = 'leg_categorias_afiliados';

    public $timestamps = false;

    protected $fillable = [
        'name_categorie','slug_categorie',
        'parent_id','order','id_afiliado'
    ];

}