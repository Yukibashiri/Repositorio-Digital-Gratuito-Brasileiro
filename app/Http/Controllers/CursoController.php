<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CursoController extends Controller
{
    protected $title = 'Curso';
    protected $form = 'curso';
    protected $controller = 'CursoController';
    protected $title_create = 'Novo item para curso';
    protected $title_edit = 'editar item para curso';
    protected $title_show = 'Detalhes do curso';
    protected $plural_name = 'Cursos';
    protected $route = 'dashboard/curso';
    protected $fields_name = array('Nome','Descrição','Criado em', 'Atualizado em');
    protected $fields = array('nome','desc','created_at','updated_at');


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('crud.index',array('title' => $this->title,
                                             'route_path' => $this->route,
                                             'controller' => $this->controller,
                                             'fields' => $this->fields,
                                             'fields_name' => $this->fields_name,
                                             'crud_name' => $this->plural_name,
                                             'form' => $this->form,
                                             'itens' => $cursos));
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
            'nome' => 'required|bail|unique:curso|min:5',
            'desc' => 'min:5']);

        $item = new Curso();
        $item->nome = $request->input('nome');
        $item->desc = $request->input('desc');

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
        $item= Curso::find($id);
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
        $item= Curso::find($id);
        return view('crud.edit',compact('item','id'),array('title_edit' => $this->title_edit,
                                                                            'route_path' => $this->route, 'form' => $this->form));
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
        $item = Curso::find($id);
        $this->validate($request,[
            'nome' => 'required|bail|min:5',Rule::unique('curso')->ignore($id),
            'desc' => 'min:5']);

        $item->nome = $request->input('nome');
        $item->desc = $request->input('desc');

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
        $item = Curso::find($id);
        if($item->delete()){
            return redirect($this->route)->with('tipo','success')->with('mensagem','Item removido com sucesso!');
        }
        return redirect($this->route)->with('tipo','danger')->with('mensagem','Não foi possivel completar a operção!');
    }

}
