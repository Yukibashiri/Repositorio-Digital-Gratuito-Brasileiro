<?php

namespace App\Http\Controllers;

use App\GlobalConfig;
use Illuminate\Http\Request;


class GlobalConfigController extends Controller
{
     protected $title = 'Configurações do Sistema';
    protected $form = 'configuracao_sistema';
    protected $controller = 'GlobalConfigController';
    protected $title_create = 'Nova configuração global';
    protected $title_edit = 'Nova configuração global';
    protected $title_show = 'Detalhes da configuração';
    protected $plural_name = 'Configurações do Sistema';
    protected $route = 'dashboard/configuracao_sistema';
    protected $fields_name = array('Nome','Descrição','Valor','Criado em', 'Atualizado em');
    protected $fields = array('nome','desc','valor','created_at','updated_at');


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configuracao_sistemas = GlobalConfig::all();
        return view('crud.index',array('title' => $this->title,
                                             'route_path' => $this->route,
                                             'controller' => $this->controller,
                                             'fields' => $this->fields,
                                             'fields_name' => $this->fields_name,
                                             'crud_name' => $this->plural_name,
                                             'form' => $this->form,
                                             'itens' => $configuracao_sistemas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create', array('title' => $this->title,'title_create' => $this->title_create,
            'route_path' => $this->route,'form' => $this->form) );
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
            'nome' => 'required|bail|unique:configuracao_sistema|min:5',
            'valor' => 'required',
            'desc' => 'min:5']);

        $item = new GlobalConfig();
        $item->nome = $request->input('nome');
        $item->desc = $request->input('desc');
        $item->valor = $request->input('valor');
        $item->created_at = now();

        if($item->save()){
            return redirect($this->route.'/create')->with('tipo','success')->with('mensagem','Item registrado com sucesso!');
        }
        return redirect($this->route.'/create')->with('tipo','danger')->with('mensagem','Não foi possivel completar a operção!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item= GlobalConfig::find($id);
        return view('crud.show',array('item' => $item,
                                            'item_id' => $item['nome'],
                                            'title_show' => $this->title_show,
                                            'fields' => $this->fields,
                                            'fields_name' => $this->fields_name));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item= GlobalConfig::find($id);
        return view('crud.edit',compact('item','id'),array('title_edit' => $this->title_edit,
                                                                            'route_path' => $this->route,
                                                                            'form' => $this->form));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $item = GlobalConfig::find($id);
        $this->validate($request,[
            'valor' => 'required',
            'desc' => 'min:5']);

        //$item->nome = $request->input('nome'); Não pode né pai kk
        $item->desc = $request->input('desc');
        $item->valor = $request->input('valor');
        $item->updated_at = now();

        if($item->save()){
            return redirect($this->route.'/'.$id.'/edit')->with('tipo','success')->with('mensagem','Item atualizado com sucesso!');
        }
        return redirect($this->route.'/'.$id.'/edit')->with('tipo','danger')->with('mensagem','Não foi possivel completar a operção!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // TO-DO
    {
        return redirect($this->route)->with('tipo','danger')->with('mensagem','Configurações globais não podem ser removidas!');
    }
}
