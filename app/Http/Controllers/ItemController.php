<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemAuthors;
use App\ItemFile;
use App\ItemTags;
use App\Tags;
use App\Arquivo;
use App\ArquivoExtensao;
use App\Colecao;
use App\Papel;
use App\Curso;
use App\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\ExpectationFailedException;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colecoes = Colecao::all();
        $papeis = Papel::all();
        $cursos = Curso::all();
        $disciplinas = Disciplina::all();

        return view('crud.forms.livro',array('colecoes' => $colecoes,'cursos' => $cursos, 'papeis' => $papeis, 'disciplinas' => $disciplinas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colecoes = Colecao::all();
        $papeis = Papel::all();
        $cursos = Curso::all();
        $disciplinas = Disciplina::all();
        $usuarios = DB::table('usuario')
            ->join('informacao_pessoal', 'usuario.informacao_pessoal_id', '=', 'informacao_pessoal.id')
            ->join('categoria', 'usuario.categoria_id', '=', 'categoria.id')
            ->whereNull('usuario.deleted_at')
            ->whereIn('usuario.categoria_id',array(1,2,3))
            ->select( 'usuario.id')
            ->selectRaw('CONCAT(informacao_pessoal.sobrenome,\', \',informacao_pessoal.nome) as name')
            ->get()->pluck('name','id');
        $tags = Tags::all();

        return view('crud.forms.livro',array('colecoes' => $colecoes,'cursos' => $cursos, 'papeis' => $papeis, 'usuarios' => $usuarios, 'tags' => $tags , 'disciplinas' => $disciplinas));
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
            'colecao_id' => 'required',
            'curso_id' => 'required',
            'roles.*' => 'required',
            'tags.*' => 'required',
            'authors.*' => 'required',
            'resumo' => 'required|min:50',
            'arquivo' => 'required|file',
            'title' => 'min:2']);
        dd($request);
        DB::beginTransaction();
        try{

            $item = new Item();
            $item->colecao_id = $request->input('colecao_id');
            $item->titulo = $request->input('title');
            if ($request->filled('subtitle'))
                $item->subtitulo =  $request->input('subtitle');
            $item->resumo = $request->input('resumo');
            $item->curso_id = $request->input('curso_id');
             if($request->filled('disciplina_id')  )
                $item->disciplina_id = $request->input('disciplina_id');
            $item->situacao_id = 2;
            if ($request->has('nota') && $request->filled('nota'))
                $item->nota =  $request->input('nota');
            $item->colecao_id = $request->input('colecao_id');
            $item->colecao_id = $request->input('colecao_id');
            $item->created_at = now();
            $item->updated_at = now();
            if (!$item->save()){
                return redirect('compartilhar')->with('tipo','danger')->with('mensagem','Houve um erro no registro do usuário!');
            }

            if($request->hasFile('arquivo')){
                return redirect('compartilhar')->with('tipo','danger')->with('mensagem','Não foi possivel completar a operação!');
            }

            $file = new Arquivo();
            $arquivo = $request->file('file');
            $extensao = ArquivoExtensao::Where('slug','=',$arquivo->getClientOriginalExtension())->firstOrFail();
            if(!$extensao){
                return redirect('registrar')->with('tipo','danger')->with('mensagem','Houve um erro no registro do usuário!');
            }
            $file->nome = md5($item>id).".".$extensao->slug;
            $file->caminho = 'assets/itens/arquivos/';
            $file->arquivo_extensao_id = $extensao->id;
            $file->status = 1;
            $file->created_at = now();
            $file->updated_at = now();
            $request->file('file')->move(asset('assets/itens/arquivos/'), $file->nome);
            if (!$file->save()){
                return redirect('compartilhar')->with('tipo','danger')->with('mensagem','Houve um erro no registro do usuário!');
            }

            $item_has_file = new ItemFile();
            $item_has_file->item_id = $item->id;
            $item_has_file->arquivo_id = $file->id;
            $item_has_file->created_at = now();
            $item_has_file->updated_at = now();
            if (!$item_has_file->save()){
                return redirect('compartilhar')->with('tipo','danger')->with('mensagem','Houve um erro no registro do usuário!');
            }




            $autores = $request->input('authors');
            $papeis = $request->input('roles');
            for ($index = 0 ; $index < count($autores); $index ++) {
                $autor_item = new ItemAuthors();

                $autor_item->item_id = $item->id;
                $autor_item->usuario_id = $autores[$index];
                $autor_item->papel_id = $papeis[$index];
                $autor_item->status = 1;

                if (!$autor_item->save()){
                    return redirect('compartilhar')->with('tipo','danger')->with('mensagem','Houve um erro no registro da informação Pessoal!');
                }
            }

            foreach($request->input('tags') as $tag){
                $tag_item = new ItemTags();
                $tag_item->item_id = $item->id;
                $tag_item->tags_id = $tag;
                $tag_item->status = 1;
                if (!$tag_item->save()){
                    return redirect('compartilhar')->with('tipo','danger')->with('mensagem','Houve um erro no registro da informação Pessoal!');
                }
            }
            DB::commit();
            return redirect('compartilhar')->with('tipo','success')->with('mensagem','Seu artigo foi registrado, parabéns!');
        }
        catch (ExpectationFailedException $ex){
            DB::rollBack();
            console.log('fudeu');
            return redirect('compartilhar')->with('tipo','danger')->with('mensagem','Não foi possivel completar a operção!');
        }

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
