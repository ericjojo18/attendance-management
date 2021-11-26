<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Http\Request;

class PaternaireController extends Controller
{
    public function index(){
        $paternaires = Partenaire::all();
        return view('paternaire.index',compact('paternaires'));
    }
    public function creat(){
        return view('paternaire.create');
    }
    public function edit($id){
        $paternaire = Partenaire::findorFail($id);
        return view ('paternaire.edit',compact('paternaire'));
    }
    public function create(Request $request){
        $request->validate([
            'name'=>'required',
            'activity_domain'=>'required',
            'address'=>'required',
            'contact'=>'required',
        ]);
        $paternaire = new Partenaire(); 
        $paternaire->name = $request->name;
        $paternaire->activity_domain = $request->activity_domain;
        $paternaire->address = $request->address;
        $paternaire->contact = $request->contact;
        $paternaire->save();
    
        session()->flash('success', 'Partenaire crée avec succés');
        return redirect()->route('paternaire.index');
    }
    public function udapte(Request $request, $id, Partenaire $paternaire){
        
        $request->validate([
            'name'=>'required',
            'activity_domain'=>'required',
            'address'=>'required',
            'contact'=>'required',
        ]);
    //    dd('$niveau');
       $paternaire  = Partenaire::findorFail($id);
       $paternaire->update([
            'name' => $request->name,
            'activity_domain'=> $request->activity_domain,
            'address'=> $request->address,
            'contact'=> $request->contact,
        ]);
        
        session()->flash('success', 'modifier  avec succés');
        return redirect()->route('paternaire.index');
    }
     public function Niveaudelete($id){
        $paternaire = Partenaire::find($id);
        $paternaire->delete();
        session()->flash('danger', 'supprimer avec succés');
        return redirect()->route('paternaire.index');
    }
}
