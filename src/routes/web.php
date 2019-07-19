<?php
Route::get('/categoriasToAfiliado')
    ->uses('DanielSann\WebDasExcelCategorias\Controllers\CategoriasController@importarCategorias');