<?php


namespace DanielSann\WebDasExcelCategorias\Controllers;


use App\Http\Controllers\Controller;
use DanielSann\WebDasExcelCategorias\Imports\CategoriasImports;
use DanielSann\WebDasExcelCategorias\Imports\CategoriasToContratosImport;
use Maatwebsite\Excel\Facades\Excel;

class CategoriasController extends Controller
{

    public function importarCategorias()
    {
        $path = dirname(__DIR__).'/uploads/CategoriasToAfiliado.xlsx'; // Archivo para importar
        $path1 = dirname(__DIR__).'/uploads/CategoriasToContratos_afiliado.xlsx'; // Archivo para importar

        //dd($path, $path1);

        //Excel::import(new CategoriasImports(), $path);
        Excel::import(new CategoriasToContratosImport(), $path1);
    }
    
}