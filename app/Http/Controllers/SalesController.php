<?php

namespace App\Http\Controllers;

use App\SalesModel;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $sales =  SalesModel::all();
        return view('sales.sales_list', compact('sales'));

    }

    public function licensing()
    {
        //

        $sales =  SalesModel::all();
        return view('sales.licensing_list', compact('sales'));

    }

    public function new()
    {
        return view('sales.sales_new');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $clientData = $request->all();
        $client = new SalesModel();
        $client->create($clientData);
        flash('Nova Venda Registrada!')->success();
        return redirect()->route('sales.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($saleModel)
    {
        $sale = SalesModel::findOrFail($saleModel);
        return view('sales.sales_edit', compact('sale'));
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $saleModel){
        $saleData = $request->all();
        $sale = SalesModel::findOrFail($saleModel);
        $sale->update($saleData);

        flash('Venda Atualizada!')->success();
        return redirect()->route('sales.index');
    }

    public function licensing_update(Request $request, $licensing){
        $sale = SalesModel::findOrFail($licensing);
        $sale->licensing = $request->get('licensing');
        $sale->save();

        flash('Licença Renovada!')->success()->important();
        return redirect()->route('licensing.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = SalesModel::findOrFail($id);
        $product->delete();
        flash('Cliente Excluído!')->success();
        return redirect()->route('sales.index');

    }

    public function getLicensing($licensing)
    {
        $product = SalesModel::all()->where('url',$licensing);

        foreach ($product as $dado){
            if($dado->licensing >= date("Y-m-d")){
                return 'true';
            }
            return 'false';
        }
        return 'false';
    }
}
