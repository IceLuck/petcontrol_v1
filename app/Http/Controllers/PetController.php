<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetsFormRequest;
use App\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    public function index(Request $request){
        $pets = Pet::query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request->session()->get('mensagem');

        return view('pets.listar', [
            'pets' => $pets,
            'mensagem' => $mensagem
        ]);
    }

    public function create(){
        return view('pets.adicionar');
    }

    public function edit($id){
        $pet = Pet::find($id);
        return view('pets.editar',['pet'=>$pet]);
    }

    public function store(PetsFormRequest $request){
        $request->validate([
            'nome' => 'required|min:2'
        ]);
        DB::beginTransaction();
        Pet::create($request->all());
        DB::commit();

        $request->session()
            ->flash(
                'mensagem',
                "O Pet $request->nome foi cadastrado com sucesso!"
            );

        return redirect()->route('listar_pets');
    }

    public function destroy(Request $request, $id){
        DB::beginTransaction();
        $pet = Pet::find($id);
        $pet->delete();
        DB::commit();

        $request->session()
            ->flash(
                'mensagem',
                "Pet deletado com sucesso!"
            );

        return redirect()->route('listar_pets');
    }

    public function update(PetsFormRequest $request, $id){
        $request->validate([
            'nome' => 'required|min:2'
        ]);

        $pet = Pet::find($id);
        $pet->nome = $request->nome;
        $pet->tipo = $request->tipo;
        $pet->raca = $request->raca;
        $pet->cor = $request->cor;
        $pet->sexo = $request->sexo;
        $pet->dataNascimento = $request->dataNascimento;
        $pet->observacoes = $request->observacoes;
        $pet->save();

        $request->session()
            ->flash(
                'mensagem',
                "Dados do Pet $request->nome atualizados com sucesso!"
            );

        return redirect()->route('listar_pets');
    }
}
