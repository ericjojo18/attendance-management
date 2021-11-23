<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index(){
        return view('');
    }
    public function create(Request $request){
        $request->validate([
            'partenaire_id'=>'required',
            'referentiel_id'=>'required',
            'type_formation'=>'required',
            'beginDate'=>'required',
            'endDate'=>'required',
        ]);
       
        $formation = new Formation(); 
        $formation->partenaire_id= $request->partenaire_id;
        $formation->referentiel_id = $request->referentiel_id;
        $formation->type_formation = $request->type_formation;
        $formation->beginDate = $request->beginDate;
        $formation->endDate = $request->endDate;
        $formation->save();
    
        session()->flash('success', 'Formation  crée avec succés');
        return redirect()->route('professionel.niveau.index');
    }
    public function udapte(Request $request, $id, Formation $formation){
        
       $request->validate([
            'partenaire_id'=>'required',
            'referentiel_id'=>'required',
            'type_formation'=>'required',
            'beginDate'=>'required',
            'endDate'=>'required',
       ]);
    //    dd('$niveau');
       $formation = Formation::findorFail($id);
       $formation->update([
            'partenaire_id' => $request->partenaire_id,
            'referentiel_id'=> $request->referentiel_id,
            'type_formation'=> $request->type_formation,
            'beginDate'=> $request->beginDate,
            'endDate'=> $request->endDate,
        ]);
        
        session()->flash('success', 'modifier  avec succés');
        return redirect()->route('');
    }
     public function Niveaudelete($id){
        $formation = Formation::find($id);
        $formation->delete();
        session()->flash('danger', 'supprimer avec succés');
        return redirect()->route('');
    }
}
