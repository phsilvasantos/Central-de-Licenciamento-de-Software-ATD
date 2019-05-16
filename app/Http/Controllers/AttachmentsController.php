<?php

namespace App\Http\Controllers;

use App\AttachmentsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentsController extends Controller
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
    public function new($id)
    {
        return view('development.attachments_new', ['id'=>$id]);
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
    }

    public function upload(Request $request)
    {
        /*
        * O campo do form com o arquivo tinha o atributo name="file".
        */
        $file = $request->file('arquivo');
        $productA = new AttachmentsModel();
        $productA->size = $this->formatBytes($file->getSize());
        $newName = str_replace('.'.$file->getClientOriginalExtension() , '' , strtolower( preg_replace('/[ -]+/' , '_' , strtr(utf8_decode(trim($file->getClientOriginalName())), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")) )).'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('attachments'), $newName);
        $productA->name = $request->get('name');
        $productA->link = $newName;
        $productA->id_dev = $request->get('id_dev');
        $productA->save();
        flash('Novo Anexo Disponível')->success();
        return redirect()->route('development.view', ['id'=> $request->get('id_dev')]);
    }

    public function getDownload($id) {
        $file= public_path().'/attachments/'.$id;
        flash('Download iniciado...')->success();
        return response()->download($file);
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

    function formatBytes($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffixes = array('Bytes', 'KB', 'MB', 'GB', 'TB');

        return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
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

    }

    public function remove($id){
        $cc = AttachmentsModel::findOrFail($id);
        unlink(public_path('attachments/'.$cc->link));
        $idd = $cc->id_dev;
        $cc->delete();
        flash('Anexo Excluído')->success();
        return redirect()->route('development.view', ['id'=> $idd]);

    }
}
