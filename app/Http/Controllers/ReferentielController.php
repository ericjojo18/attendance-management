<?php

namespace App\Http\Controllers;

use App\Models\Referentiel;
use Illuminate\Http\Request;

class ReferentielController extends Controller
{
    public function index(){
        $referentiels = Referentiel::all();
        return view('reference.index',compact('referentiels'));
    }
    public function creat()
    {
        return view('reference.create');
    }
    public function edit($id){
        $referentiel = Referentiel::findorFail($id);
        return view('reference.edit',compact('referentiel'));
    }
    public function create(Request $request){
        $request->validate([
            'label'=>'required',
            
        ]);
        $referentiel = new Referentiel(); 
        $referentiel->label = $request->label;
        $referentiel->save();
    
        session()->flash('success', 'Referent crée avec succés');
        return redirect()->route('reference.index');
    }
    public function udapte(Request $request, $id, Referentiel $referentiel ){
        
        $request->validate([
            'label'=>'required',
            
        ]);
    //    dd('$niveau');
       $referentiel  = Referentiel::findorFail($id);
       $referentiel->update([
            'label' => $request->label,
            
        ]);
        
        session()->flash('success', 'modifier  avec succés');
        return redirect()->route('reference.index');
    }
     public function delete($id){
        $referentiel = Referentiel::find($id);
        $referentiel->delete();
        session()->flash('danger', 'supprimer avec succés');
        return redirect()->route('reference.index');
    }
}
