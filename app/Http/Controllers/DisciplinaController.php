<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $title = 'Disciplina';
    protected $form = 'disciplina';
    protected $controller = 'DisciplinaController';
    protected $title_create = 'Novo item para Disciplina';
    protected $title_edit = 'Editar item para Disciplina';
    protected $title_show = 'Detalhes da Disciplina';
    protected $plural_name = 'Disciplinas';
    protected $order_column = ''; // 1
    protected $order_type = ''; // ASC
    protected $route = 'dashboard/disciplina';
    protected $fields_name = array('Nome','Descrição','Curso', 'Status', 'Criado em', 'Atualizado em' );
    protected $fields = array('nome','desc','curso_id','status','created_at','updated_at');
    protected $status = [ 0 => ['id' => '', 'nome' => 'Selecione'], 1 =>  ['id' => 1, 'nome' => 'Ativo'], 2 =>  ['id' => 0,'nome' => 'Inativo'] ];

    public function index()
    {
        $itens = Disciplina::all();
        return view('crud.index',array('title' => $this->title,
            'route_path' => $this->route,
            'controller' => $this->controller,
            'fields' => $this->fields,
            '$this->order_column' => $this->order_column,
            '$this->order_type' => $this->order_type,
            'fields_name' => $this->fields_name,
            'crud_name' => $this->plural_name,
            'form' => $this->form,
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
            'route_path' => $this->route,'status' => $this->status,
            'cursos' => (new Curso)->getCursosDisponiveis(),
            'form' => $this->form) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nome' => 'required|bail|unique:disciplina|min:2',
            'status' => 'required',
            'curso_id' => 'required|bail|min:1']);

        $item = new Disciplina();
        $item->nome = $request->input('nome');
        $item->desc = $request->input('desc');
        $item->curso_id = $request->input('curso_id');
        $item->status = $request->input('status');
        $item->updated_at = $item->created_at = now();

        if($item->save()){
            return redirect($this->route.'/create')->with('tipo','success')->with('mensagem','Item registrado com sucesso!');
        }
        return redirect($this->route.'/create')->with('tipo','danger')->with('mensagem','Não foi possivel completar a operção!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item= Disciplina::find($id);
        return view('crud.show',array('item' => $item,
            'item_id' => $item['nome'],
            'title_show' => $this->title_show,
            'fields' => $this->fields,
            'fields_name' => $this->fields_name));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item= Disciplina::find($id);
        return view('crud.edit',compact('item','id'),array('title_edit' => $this->title_edit,
            'route_path' => $this->route,'status' => $this->status,
            'cursos' => (new Curso)->getCursosDisponiveis(),
            'form' => $this->form));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Disciplina::find($id);
        $this->validate($request,[
            'nome' => 'required|bail|min:2',Rule::unique('disciplina')->ignore($id),
            'status' => 'required',
            'curso_id' => 'required|bail|min:1']);

        $item->nome = $request->input('nome');
        $item->desc = $request->input('desc');
        $item->curso_id = $request->input('curso_id');
        $item->status = $request->input('status');
        $item->updated_at =  now();


        if($item->save()){
            return redirect($this->route.'/'.$id.'/edit')->with('tipo','success')->with('mensagem','Item atualizado com sucesso!');
        }
        return redirect($this->route.'/'.$id.'/edit')->with('tipo','danger')->with('mensagem','Não foi possivel completar a operção!');
    }

    public function preUpdate(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */



    public function destroy($id)
    {
        $item = Disciplina::find($id);
        if($item->delete()){
            return redirect($this->route)->with('tipo','success')->with('mensagem','Item removido com sucesso!');
        }
        return redirect($this->route)->with('tipo','danger')->with('mensagem','Não foi possivel completar a operção!');
    }
}
