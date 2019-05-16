<?php

namespace App\Http\Controllers;

use App\ClientsModel;
use App\DevelopmentModel;
use App\User;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $clients =  ClientsModel::all();
        return view('clients.cli_list', compact('clients'));

    }

    public function users()
    {
        //
        $clients =  User::all();
        return view('clients.users_list', compact('clients'));

    }

    public function new()
    {
        return view('clients.cli_new');
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
        $client = new ClientsModel();
        $client->create($clientData);
        flash('Novo Cliente Cadastrado!')->success();
        return redirect()->route('clients.index');

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
    public function edit($client)
    {
        $cliente = ClientsModel::findOrFail($client);
        return view('clients.cli_edit', compact('cliente'));
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $clientModel){
        $clientData = $request->all();
        $client = ClientsModel::findOrFail($clientModel);
        $client->update($clientData);

        flash('Cliente Atualizado!')->success();
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ClientsModel::findOrFail($id);
        $product->delete();
        flash('Cliente Excluído!')->success();
        return redirect()->route('clients.index');

    }

    public function destroy_user($id)
    {
        $product = User::findOrFail($id);
        $dev = DevelopmentModel::all()->where('id_manager', $id);
        if($dev=='[]'){
            $product->delete();
            if(auth()->id()==$id){
                return redirect()->route('logout');
            }else{
                flash('Usuário Excluído!')->success();
                return redirect()->route('user.index');
            }
        }else{
            flash('Usuário vinculado a projetos!')->warning();
            return redirect()->route('user.index');
        }



    }
}
