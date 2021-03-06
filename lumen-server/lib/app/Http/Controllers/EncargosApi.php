<?php

/**
 * Precificação
 * Essa API auxiliará na formação de preços dos mais variados produtos. Com cálculos de custo, de preço de venda e de margem de lucro.
 *
 * OpenAPI spec version: 1.0.0
 * Contact: fernando.junior@thorgus.com
 *
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen.git
 * Do not edit the class manually.
 */


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class EncargosApi extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
    }

    /**
     * Operation encargosGet
     *
     * Calcule os Encargos sobre o Preço de Venda do produto..
     *
     *
     * @return Http response
     */
    public function encargosGet()
    {
        $input = Request::all();

        //path params validation


        //not path params validation
        if (!isset($input['venda'])) {
            throw new \InvalidArgumentException('Missing the required parameter $venda when calling encargosGet');
        }
        $venda = $input['venda'];

        if (!isset($input['custo'])) {
            throw new \InvalidArgumentException('Missing the required parameter $custo when calling encargosGet');
        }
        $custo = $input['custo'];

        if (!isset($input['lucro'])) {
            throw new \InvalidArgumentException('Missing the required parameter $lucro when calling encargosGet');
        }
        $lucro = $input['lucro'];

        $valor = round(abs(
          $custo*(1+$lucro)-$venda
        ),2);

        $porcentagem = round(abs(
          $valor * 100 / $venda
        ),2);

        return response()->json(['valor' => $valor, 'porcentagem' => $porcentagem]);
    }
}
