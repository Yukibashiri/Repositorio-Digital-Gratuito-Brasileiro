<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\InformacaoPessoal;
use Illuminate\Http\Request;
use PHPUnit\Framework\ExpectationFailedException;

class UsuarioController extends Controller
{

    protected $title = 'Usuario';
    protected $form = 'usuario';
    protected $controller = 'UsuarioController';
    protected $title_create = 'Novo item para usuario';
    protected $title_edit = 'editar item para curso';
    protected $title_show = 'Detalhes do curso';
    protected $plural_name = 'Usuarios';
    protected $route = 'dashboard/usuario';
    protected $fields_name = array('Nome','Descrição','Status','Criado em', 'Atualizado em');
    protected $fields = array('nome','desc','status','created_at','updated_at');
    protected $status = [ 0 => ['id' => '', 'nome' => 'Selecione'], 1 =>  ['id' => 1, 'nome' => 'Ativo'], 2 =>  ['id' => 0,'nome' => 'Inativo'] ];
    protected $crud = true;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('crud.forms.usuario');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.forms.usuario', array('title' => $this->title,'title_create' => $this->title_create,
            'route_path' => $this->route, 'form' => $this->form) );
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
            'name' => 'required|bail|min:1',
            'lastname' => 'required|bail|min:1',
            'email' => 'required|bail|unique:usuario|min:6',
            'login' => 'required|bail|unique:usuario|min:4',
            'nickname' => 'required|bail|min:6',
            'password' => 'required|bail|min:6']);
        //try{
           // DB::beginTransaction();
            $subitem = new InformacaoPessoal();
            $subitem->nome = $request->input('name');
            $subitem->sobrenome = $request->input('lastname');
            $subitem->create_at = now();
            $subitem->updated_at = now();

            $item = new Usuario();
            $item->login = $request->input('login');
            $item->email = $request->input('email');
            $item->password = bcrypt($request->input('status'));
            $item->codinome = $request->input('nickname');
            $item->informacao_pessoal_id = $subitem->id;
            $item->categoria_id = 3;
            $item->esta_ativo = 1;
            $item->create_at = now();
            $item->updated_at = now();

       // }
        //catch (ExpectationFailedException $ex){
          //  DB::rollBack();
            return "foi";
       // }
      //  finally{
      //      DB::commit();
            return "não foi";
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
