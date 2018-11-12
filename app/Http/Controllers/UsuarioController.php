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
   protected $fields_name = array('Nome','Sobrenome','Usuário','Email', 'Status','Cargo', ,'Apelido', 'Criado em', 'Atualizado em','Email verificado em' );
    protected $fields = array('nome','sobrenome','login', 'email','esta_ativo','categoria_id','codinome', 'created_at','updated_at', 'email_verified');
    protected $status = [ 0 => ['id' => '', 'nome' => 'Selecione'], 1 =>  ['id' => 1, 'nome' => 'Ativo'], 2 =>  ['id' => 0,'nome' => 'Inativo'] ];
    protected $crud = true;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itens = DB::table('usuario')
            ->join('informacao_pessoal', 'usuairo.informacao_pessoal_id', '=', 'informacao_pessoal.id')
            ->where('1 = 1')
            ->select( 'nome, sobrenome, login, email, codinome, usuario.created_at, categoria_id, usuario.updated_at, usuario.ativo')
            ->get();
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
            'last_position' => (new Situacao)->nextPosition(),'form' => $this->form) );
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
    public function show($id)
    {
        $itens = DB::table('usuario')
            ->join('informacao_pessoal', 'usuairo.informacao_pessoal_id', '=', 'informacao_pessoal.id')
            ->where('1 = 1')
            ->where('usuario.id = '.$id)
            ->select( 'nome, sobrenome, login, email, codinome, usuario.created_at, categoria_id, usuario.updated_at, usuario.ativo')
            ->get();
        return view('crud.show',array('item' => $item,
            'item_id' => $item['nome'],
            'title_show' => $this->title_show,
            'fields' => $this->fields,
            'fields_name' => $this->fields_name));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        $itens = DB::table('usuario')
            ->join('informacao_pessoal', 'usuairo.informacao_pessoal_id', '=', 'informacao_pessoal.id')
            ->where('1 = 1')
            ->where('usuario.id = '.$id)
            ->select( 'nome, sobrenome, login, email, codinome, usuario.created_at, categoria_id, usuario.updated_at, usuario.ativo')
            ->get();
        return view('crud.edit',compact('item','id'),array('title_edit' => $this->title_edit,
            'route_path' => $this->route,'status' => $this->status, 'form' => $this->form));
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
    public function destroy($id)
    {
        $item = Usuario::find($id);
        if($item->delete()){
            return redirect($this->route)->with('tipo','success')->with('mensagem','Item removido com sucesso!');
        }
        return redirect($this->route)->with('tipo','danger')->with('mensagem','Não foi possivel completar a operção!');
    }
}
