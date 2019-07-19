<?php


namespace DanielSann\WebDasExcelCategorias\Imports;


use DanielSann\WebDasExcelCategorias\Models\LegAfiliados;
use DanielSann\WebDasExcelCategorias\Models\LegAfiliadosContratos;
use DanielSann\WebDasExcelCategorias\Models\LegCategoriasAfiliados;

use DanielSann\WebDasExcelCategorias\Models\Residuo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoriasToContratosImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        $afiliado = LegAfiliados::where('site_domain', $row['subdomain'])->first();

        if ($afiliado) {
            $afiliado_id = $afiliado->id;
            // Guardar las categorias
            $categoria = LegCategoriasAfiliados::where('id_afiliado', $afiliado_id)
                ->where('name_categorie','like','%'.$row['clasificacion_carol'].'%')->first();

            if ($categoria) {
                // Buscar todos los contratos por su serial_key en el excel
                $serial_key1 = $row['serial_key'];
                $contrato = LegAfiliadosContratos::with('contrato')
                    ->where('afiliado_id', $afiliado_id)
                    ->whereHas('contrato',
                        function ($query) use ($serial_key1) {
                            $query->where('serial_key', $serial_key1);
                        }
                    )
                    ->first();

                if ($contrato) {
                    // .- Add array to contrato .-

                    $contrato->categorie_id = json_encode(["$categoria->id_categorie"]);
                    $contrato->save();
                }
            }



        }

        return new Residuo();
    }
}