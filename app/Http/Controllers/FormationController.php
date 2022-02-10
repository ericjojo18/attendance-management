<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormationController extends Controller
{
    public function index(){
        // $formations= DB::select('SELECT formations.id,name,label,type_formation,beginDate,endDate
        // FROM partenaires,referentiels,formations WHERE formations.partenaire_id=partenaires.id AND formations.referentiel_id=referentiels.id ');
        //  dd($formations);

         $formations = Formation::all();
        return view('formation.index',compact('formations'));
    }
    public function creat(){

        return view('formation.create');
    }
    public function edit($id){
        $formation = Formation::findOrFail($id);
        return view('formation.edit',compact('formation'));
    }
    public function create(Request $request){
        $request->validate([
            'partenaire_id'=>'required',
            'referentiel_id'=>'required',
            'training'=>'required',
            'beginDate'=>'required',
            'endDate'=>'required',
        ]);

        $formation = new Formation();
        $formation->partenaire_id= $request->partenaire_id;
        $formation->referentiel_id = $request->referentiel_id;
        $formation->training = $request->training;
        $formation->beginDate = $request->beginDate;
        $formation->endDate = $request->endDate;
        $formation->save();
        // dd($request->all());
        session()->flash('success', 'Formation  crée avec succés');
        return redirect()->route('formation.index');
    }
    public function udapte(Request $request, $id, Formation $formation){

       $request->validate([
            'partenaire_id'=>'required',
            'referentiel_id'=>'required',
            'training'=>'required',
            'beginDate'=>'required',
            'endDate'=>'required',
       ]);
    //    dd('$niveau');
       $formation = Formation::findorFail($id);
       $formation->update([
            'partenaire_id' => $request->partenaire_id,
            'referentiel_id'=> $request->referentiel_id,
            'training'=> $request->training,
            'beginDate'=> $request->beginDate,
            'endDate'=> $request->endDate,
        ]);

        session()->flash('success', 'Formation modifier  avec succés');
        return redirect()->route('formation.index');
    }
     public function delete($id){
        $formation = Formation::find($id);
        $formation->delete();
        session()->flash('danger', 'Formation supprimer avec succés');
        return redirect()->route('formation.index');
    }
}
