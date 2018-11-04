<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagsController extends Controller
{

    protected $title = 'Tags';
    protected $form = 'tags';
    protected $title_create = 'Novo item para tags';
    protected $title_edit = 'editar item para tags';
    protected $title_show = 'Detalhes do tags';
    protected $plural_name = 'Tags';
    protected $route = 'dashboard/tags';
    protected $fields_name = array('Nome','Criado em', 'Atualizado em');
    protected $fields = array('texto','created_at','updated_at');

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itens = Tags::all();
        return view('crud.index',array('title' => $this->title,
            'route_path' => $this->route,
            'fields' => $this->fields,
            'fields_name' => $this->fields_name,
            'crud_name' => $this->plural_name,
            'itens' => $itens));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create', array('title' => $this->title,'title_create' => $this->title_create,
            'route_path' => $this->route, 'form' => $this->form) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'texto' => 'required|bail|unique:tags|min:2']);

        $item = new Tags();
        $item->texto = $request->input('texto');

        if($item->save()){
            return redirect($this->route.'/create')->with('tipo','success')->with('mensagem','Item registrado com sucesso!');
        }
        return redirect($this->route.'/create')->with('tipo','danger')->with('mensagem','Não foi possivel completar a operção!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item= Tags::find($id);
        return view('crud.show',array('item' => $item,
            'item_id' => $item['texto'],
            'title_show' => $this->title_show,
            'fields' => $this->fields,
            'fields_name' => $this->fields_name));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $item= Tags::find($id);
        return view('crud.edit',compact('item','id'),array('title_edit' => $this->title_edit,
            'route_path' => $this->route, 'form' => $this->form));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\int  $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request,$id)
    {
        $item = Tags::find($id);
        $this->validate($request,[
            'texto' => 'required|bail|min:2',Rule::unique('tags')->ignore($id)]);

        $item->texto = $request->input('texto');
        $item->updated_at = now();

        if($item->save()){
            return redirect($this->route.'/'.$id.'/edit')->with('tipo','success')->with('mensagem','Item atualizado com sucesso!');
        }
        return redirect($this->route.'/'.$id.'/edit')->with('tipo','danger')->with('mensagem','Não foi possivel completar a operção!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Tags::find($id);
        $item->deleted_at = now();
        if($item->save()){
            return $this->index();
        }
        return $this->index();
    }
}
