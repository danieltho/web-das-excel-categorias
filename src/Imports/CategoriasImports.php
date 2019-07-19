<?php


namespace DanielSann\WebDasExcelCategorias\Imports;


use DanielSann\WebDasExcelCategorias\Models\LegAfiliados;
use DanielSann\WebDasExcelCategorias\Models\LegAfiliadosContratos;
use DanielSann\WebDasExcelCategorias\Models\LegCategoriasAfiliados;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoriasImports implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        $data = LegAfiliados::where('site_domain', $row['subdomain'])->firstOrFail();
        $afiliado_id = $data->id;


        // Guardar las categorias
        return new LegCategoriasAfiliados([
            'name_categorie' => $row['clasificacion_carol'],
            'slug_categorie' => Str::slug($row['clasificacion_carol']),
            'parent_id' => 0,
            'order' => 0,
            'id_afiliado' => $afiliado_id,
        ]);


    }

}