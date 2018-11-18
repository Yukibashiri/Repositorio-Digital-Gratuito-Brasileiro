<?php

namespace App\Http\Controllers\Auth;

use App\Usuario;
use App\InformacaoPessoal;
use App\GlobalConfig;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'min:4'],
            'lastname' => ['required', 'string', 'max:255', 'min:4'],
            'nickname' => ['required', 'string', 'max:255', 'min:4'],
            'login' => ['required', 'string', 'max:255', 'min:4'],
            'email' => ['required', 'string', 'email', 'max:255', 'min:4', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function create(Request $request)
    {
        file_put_contents('debugzudo.txt','Cheguei aqui!');
        $this->validate($request,[
            'name' => 'required|bail|min:1',
            'lastname' => 'required|bail|min:1',
            'email' => 'bail|unique:usuario|min:6',
            'login' => 'bail|unique:usuario|min:4',
            'nickname' => 'required|bail|min:6',
            'password' => 'min:6']);

        try{
            DB::beginTransaction();
            $subitem = new InformacaoPessoal();
            $subitem->nome = $request->input('name');
            $subitem->sobrenome = $request->input('lastname');
            $subitem->created_at = now();
            $subitem->updated_at = now();

            if (!$subitem->save()){
                return redirect('/create')->with('tipo','danger')->with('mensagem','Houve um erro no registro da informação Pessoal!');
            }

            $item = new Usuario();
            $item->login = $request->input('login');
            $item->email = $request->input('email');
            $item->password = $request->input('password') ? bcrypt($request->input('password')) : '';
            $item->codinome = $request->input('nickname');
            $item->informacao_pessoal_id = $subitem->id;
            $item->categoria_id =  ConfigGlobal::find('5'); // ID do default user
            $item->esta_ativo = 1;
            $item->created_at = now();
            $item->updated_at = now();

            if (!$item->save()){
                return redirect('/create')->with('tipo','danger')->with('mensagem','Houve um erro no registro do usuário!');
            }
        }
        catch (ExpectationFailedException $ex){
            DB::rollBack();
            return redirect('/create')->with('tipo','danger')->with('mensagem','Não foi possivel completar a operção!');
        }
        finally{
            DB::commit();
            return redirect('/create')->with('tipo','success')->with('mensagem','Item registrado com sucesso!');

        }
    }
}
