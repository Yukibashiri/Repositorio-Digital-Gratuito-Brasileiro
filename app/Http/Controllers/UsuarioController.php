<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Categoria;
use App\InformacaoPessoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\ExpectationFailedException;
use Illuminate\Validation\Rule;


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
    protected $fields_name = array('Nome','Sobrenome','Usuário','Email', 'Status','Cargo','Apelido', 'Criado em', 'Atualizado em','Email verificado em' );
    protected $fields = array('nome','sobrenome','login', 'email','esta_ativo','categoria_id','codinome', 'created_at','updated_at', 'email_verified_at');
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
            ->join('informacao_pessoal', 'usuario.informacao_pessoal_id', '=', 'informacao_pessoal.id')
            ->join('categoria', 'usuario.categoria_id', '=', 'categoria.id')
            ->whereNull('usuario.deleted_at')
            ->select( 'usuario.id','informacao_pessoal.nome', 'informacao_pessoal.sobrenome', 'login', 'email', 'codinome', 'categoria.nome as categoria_id')
            ->selectRaw(' (CASE WHEN esta_ativo = 1 THEN \'Ativo\' ELSE \'Inativo\' END) AS esta_ativo,
                DATE_FORMAT(usuario.created_at, "%d/%m/%Y %H:%i:%s")as \'created_at\',
                DATE_FORMAT(email_verified_at, "%d/%m/%Y %H:%i:%s") as \'email_verified_at\',
                DATE_FORMAT(usuario.updated_at, "%d/%m/%Y %H:%i:%s") as \'updated_at\'')
            ->get();

        return view('crud.index',array('title' => $this->title,
            'route_path' => $this->route,
            'controller' => $this->controller,
            'fields' => $this->fields,
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
        $categorias = Categoria::all();
        return view('crud.create', array('title' => $this->title,'title_create' => $this->title_create,
            'route_path' => $this->route,'status' => $this->status,
            'categorias' => $categorias,
            'form' => $this->form) );
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
            'nome' => 'required|bail|min:1',
            'sobrenome' => 'required|bail|min:1',
            'email' => 'required|bail|unique:usuario|min:6',
            'login' => 'required|bail|unique:usuario|min:4',
            'codinome' => 'required|bail|min:6',
            'esta_ativo' => 'required',
            'categoria_id' => 'required',
            'password' => 'min:6']);
        try{
            DB::beginTransaction();
            $subitem = new InformacaoPessoal();
            $subitem->nome = $request->input('nome');
            $subitem->sobrenome = $request->input('sobrenome');
            $subitem->created_at = now();
            $subitem->updated_at = now();

            if (!$subitem->save()){
                return redirect($this->route.'/create')->with('tipo','danger')->with('mensagem','Houve um erro no registro da informação Pessoal!');
            }

            $item = new Usuario();
            $item->login = $request->input('login');
            $item->email = $request->input('email');
            $item->password = $request->input('password') ? bcrypt($request->input('password')) : '';
            $item->codinome = $request->input('codinome');
            $item->informacao_pessoal_id = $subitem->id;
            $item->categoria_id =  $request->input('categoria_id') != '' ? $request->input('categoria_id') : 3;
            $item->esta_ativo = 1;
            $item->created_at = now();
            $item->updated_at = now();

            if (!$item->save()){
                return redirect($this->route.'/create')->with('tipo','danger')->with('mensagem','Houve um erro no registro do usuário!');
            }
        }
        catch (ExpectationFailedException $ex){
            DB::rollBack();
            return redirect($this->route.'/create')->with('tipo','danger')->with('mensagem','Não foi possivel completar a operção!');
        }
        finally{
            DB::commit();
            return redirect($this->route.'/create')->with('tipo','success')->with('mensagem','Item registrado com sucesso!');

        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function registrar(Request $request)
    {

        $this->validate($request,[
            'firstname' => 'required|bail|min:2',
            'lastname' => 'required|bail|min:2',
            'email' => 'required|bail|unique:usuario|min:6',
            'login' => 'required|bail|unique:usuario|min:4',
            'nickname' => 'required|bail|min:6',
            'password' => 'min:6']);
        try{
            DB::beginTransaction();
            $subitem = new InformacaoPessoal();
            $subitem->nome = $request->input('firstname');
            $subitem->sobrenome = $request->input('lastname');
            $subitem->created_at = now();
            $subitem->updated_at = now();

            if (!$subitem->save()){
                return redirect('registrar')->with('tipo','danger')->with('mensagem','Houve um erro no registro da informação Pessoal!');
            }

            $item = new Usuario();
            $item->login = $request->input('login');
            $item->email = $request->input('email');
            $item->password = bcrypt($request->input('password'));
            $item->codinome = $request->input('nickname');
            $item->informacao_pessoal_id = $subitem->id;
            $item->categoria_id =  $request->input('categoria_id') != '' ? $request->input('categoria_id') : 3;
            $item->esta_ativo = 1;
            $item->created_at = now();
            $item->updated_at = now();

            if (!$item->save()){
                return redirect('registrar')->with('tipo','danger')->with('mensagem','Houve um erro no registro do usuário!');
            }
        }
        catch (ExpectationFailedException $ex){
            DB::rollBack();
            return redirect('registrar')->with('tipo','danger')->with('mensagem','Não foi possivel completar a operção!');
        }
        finally{
            DB::commit();
            return redirect('registrar')->with('tipo','success')->with('mensagem','Item registrado com sucesso!');

        }

    }


    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itens = DB::table('usuario')
            ->join('informacao_pessoal', 'usuario.informacao_pessoal_id', '=', 'informacao_pessoal.id')
            ->join('categoria', 'usuario.categoria_id', '=', 'categoria.id')
            ->where('usuario.id', '=', $id)
            ->select( 'usuario.id','informacao_pessoal.nome', 'informacao_pessoal.sobrenome', 'login', 'email', 'codinome', 'usuario.created_at', 'categoria.nome as categoria_id', 'usuario.updated_at', 'email_verified_at')
            ->selectRaw(' (CASE WHEN esta_ativo = 1 THEN \'Ativo\' ELSE \'Inativo\' END) AS esta_ativo')
            ->first();
        return view('crud.show',array('item' => $itens,
            'item_id' => $itens->nome,
            'title_show' => $this->title_show,
            'route_path' => $this->route,
            'fields' => $this->fields,
            'fields_name' => $this->fields_name));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Categoria::all();
        $item = DB::table('usuario')
            ->join('informacao_pessoal', 'usuario.informacao_pessoal_id', '=', 'informacao_pessoal.id')
            ->where('usuario.id', '=', $id)
            ->select( 'usuario.id','informacao_pessoal.nome', 'informacao_pessoal.sobrenome', 'login', 'email', 'codinome', 'usuario.created_at', 'categoria_id', 'usuario.esta_ativo')
            ->first();
        return view('crud.edit',compact('item','id'), array('title_edit' => $this->title_edit,
            'route_path' => $this->route,
            'status' => $this->status,
            'categorias' => $categorias,
            'form' => $this->form));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nome' => 'required|bail|min:1',
            'sobrenome' => 'required|bail|min:1',
            'email' => 'bail|min:6',Rule::unique('usuario')->ignore($id),
            'login' => 'bail|min:4',Rule::unique('usuario')->ignore($id),
            'codinome' => 'required|bail|min:6',
            'esta_ativo' => 'required',
            'categoria_id' => 'required']);

        DB::beginTransaction();
        try{

            $item = Usuario::find($id);
            if (!$item)
                return redirect($this->route.'/'.$id.'/edit')->with('tipo','danger')->with('mensagem','Não foi possivel completar a operação!');

            $subitem = InformacaoPessoal::find($item->informacao_pessoal_id);
            if (!$subitem)
                return redirect($this->route.'/'.$id.'/edit')->with('tipo','danger')->with('mensagem','Não foi possivel completar a operação!');

            $subitem->nome = $request->input('nome');
            $subitem->sobrenome = $request->input('sobrenome');
            $subitem->updated_at = now();

            if (!$subitem->save()){
                return redirect($this->route.'/'.$id.'/edit')->with('tipo','danger')->with('mensagem','Não foi possivel completar a operação!');
            }

            if(request()->has('login')){
                $item->login = $request->input('login');
            }

            if(request()->has('email')) {
                $item->email = $request->input('email');
            }

            if(request()->has('password')) {
                $item->password = bcrypt($request->input('password'));
            }

            if(request()->has('categoria_id') && Categoria::find($request->input('categoria_id'))) {
                $item->categoria_id =  $request->input('categoria_id');
            }

            if(request()->has('esta_ativo')) {
                $item->esta_ativo = $request->input('esta_ativo');
            }

            $item->codinome = $request->input('codinome');
            $item->updated_at = now();

            if (!$item->save()){
                return redirect($this->route.'/'.$id.'/edit')->with('tipo','danger')->with('mensagem','Não foi possivel completar a operação!');
            }
        }
        catch (ExpectationFailedException $ex){
            DB::rollBack();
            return redirect($this->route.'/'.$id.'/edit')->with('tipo','danger')->with('mensagem','Não foi possivel completar a operação!');
        }
        finally{
            DB::commit();
            return redirect($this->route.'/'.$id.'/edit')->with('tipo','success')->with('mensagem','Item atualizado com sucesso!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
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
