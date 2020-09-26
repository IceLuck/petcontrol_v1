<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacinasFormRequest;
use App\Pet;
use App\Vacina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacinaController extends Controller
{
    //
    public function index(Request $request, $petId){
        $vacinas = Vacina::query()
            ->where('pet_id',$petId)
            ->orderByDesc('dataAplicacao')
            ->get();

        $pet = Pet::find($petId);

        $mensagem = $request->session()->get('mensagem');

        return view('vacinas.listar',[
            'vacinas'=>$vacinas,
            'petId'=>$petId,
            'petNome'=>$pet->nome,
            'mensagem' => $mensagem
        ]);
    }

    public function create($petId){
        $pet = Pet::find($petId);

        return view('vacinas.adicionar',[
            'petId'=>$petId,
            'pet'=>$pet,
            'petNome'=>$pet->nome]);
    }

    public function edit(Request $request, $petId, $id){
        $vacina = Vacina::find($id);
        $pet = Pet::find($petId);

        $request->session()
            ->flash(
                'mensagem',
                "Vacina atualizada com sucesso!"
            );

        return view('vacinas.editar',[
            'vacina'=>$vacina,
            'pet'=>$pet,
            'petId'=>$petId,
            'petNome'=>$pet->nome
            ]);
    }

    public function store(VacinasFormRequest $request, $petId){
        $request->validate([
            'nome' => 'required|min:2',
            'dataAplicacao' => 'required|min:10',
            'dataProximaAplicacao' => 'required|min:10'
        ]);

        DB::beginTransaction();
        $vacina = new Vacina($request->all());
        $pet = Pet::find($petId);
        $pet->vacinas()->save($vacina);
        DB::commit();

        $request->session()
            ->flash(
                'mensagem',
                "Vacina cadastrada com sucesso!"
            );

        return redirect()->route('listar_vacinas',[
            'petId'=>$petId
        ]);
    }

    public function destroy(Request $request, $petId, $id){
        $vacina = Vacina::find($id);
        var_dump($vacina);
        $vacina->delete();

        $request->session()
            ->flash(
                'mensagem',
                "Vacina apagada com sucesso!"
            );

        return redirect()->route('listar_vacinas',[
            'petId'=>$petId
        ]);
    }

    public function update(VacinasFormRequest $request,$petId, $id){
        $request->validate([
            'nome' => 'required|min:2',
            'dataAplicacao' => 'required|min:10',
            'dataProximaAplicacao' => 'required|min:10'
        ]);

        $vacina = Vacina::find($id);
        $vacina->tipo = $request->tipo;
        $vacina->rotulo = $request->rotulo;
        $vacina->dataAplicacao = $request->dataAplicacao;
        $vacina->dataProximaAplicacao = $request->dataProximaAplicacao;
        $vacina->save();

        $request->session()
            ->flash(
                'mensagem',
                "Vacina atualizada com sucesso!"
            );

        return redirect()->route('listar_vacinas',[
            'petId'=>$petId
        ]);

    }
}
