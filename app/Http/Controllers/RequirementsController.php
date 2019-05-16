<?php

namespace App\Http\Controllers;

use App\RequirementsModel;
use Illuminate\Http\Request;

class RequirementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $Data = $request->all();
        $model = new RequirementsModel();
        $model->create($Data);
        flash('Novo Requisito Cadastrad!')->success();
        return redirect()->route('development.view',['id'=> $request->id_dev]);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function resolvido($id){
        $cc = RequirementsModel::findOrFail($id);
        $cc->status=1;
        $idd = $cc->id_dev;
        $cc->save();
        flash('Requisito Concluído')->success();
        return redirect()->route('development.view',['id'=> $idd]);
    }

    public function remover($id){
        $cc = RequirementsModel::findOrFail($id);
        $idd = $cc->id_dev;
        $cc->delete();
        flash('Requisito Removido')->warning();
        return redirect()->route('development.view',['id'=> $idd]);

    }
}
