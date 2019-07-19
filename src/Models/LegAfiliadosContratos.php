<?php


namespace DanielSann\WebDasExcelCategorias\Models;


use Illuminate\Database\Eloquent\Model;

class LegAfiliadosContratos extends Model
{

    protected $table = 'leg_afiliados_contratos';
    protected $fillable =[
      'categorie_id'
    ];

    public $timestamps = false;

    public function contrato()
    {
        return $this->hasOne(LegProductos::class,'id','contrato_id');
    }
}