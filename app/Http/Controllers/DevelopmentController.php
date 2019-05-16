<?php

namespace App\Http\Controllers;

use App\ActivitiesModel;
use App\AttachmentsModel;
use App\DevelopmentModel;
use App\RequirementsModel;
use Illuminate\Http\Request;

class DevelopmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developments =  DevelopmentModel::all();
        return view('development.dev_list', compact('developments'));
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

    public function new()
    {
        return view('development.dev_new');
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
        $developmentData = $request->all();
        $development = new DevelopmentModel();
        $development->create($developmentData);
        flash('Novo Desenvolvimento p/ Gerenciamento!')->success();
        return redirect()->route('development.index');
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
        $development = DevelopmentModel::findOrFail($id);
        return view('development.dev_edit', compact('development'));
        //
    }

    public function view($id)
    {
        $development = DevelopmentModel::findOrFail($id);
        return view('development.dev_view', compact('development'));

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $developmentData = $request->all();
        $development = DevelopmentModel::findOrFail($id);
        $development->update($developmentData);
        flash('Desenvolvimento Atualizado!')->success();
        return redirect()->route('development.view',['id'=> $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $development = DevelopmentModel::findOrFail($id);

        $act = ActivitiesModel::all()->where('id_dev', $id);
        $req = RequirementsModel::all()->where('id_dev', $id);
        $ane = AttachmentsModel::all()->where('id_dev', $id);


        if($act=='[]' && $req=='[]' && $ane=='[]'){
            $development->delete();
            flash('Desenvolvimento Excluído!')->success();
            return redirect()->route('development.index');
        }else{
            flash('Existem Atividades, Anexos e/ou Requisitos, Revoma-os e tente novamente')->warning();
            return redirect()->route('development.view',['id'=> $id]);
        }



    }
}
