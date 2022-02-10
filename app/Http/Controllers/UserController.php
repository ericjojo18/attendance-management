<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use App\Actions\Fortify\PasswordValidationRules;

class UserController extends Controller
{
    use HasRoles;
    use PasswordValidationRules;
    public function index(){
        //  $users= DB::select('SELECT users.id,nom,prenom,date_naissance,niveau,type_formation,email
        // // FROM users,formations WHERE users.type_formation=formations.id ');
        //  dd($formations);
        $users = User::role('apprenant')->get(); // display all those who have the learning role in the table
        return view('apprenant.index',compact('users'));
    }
    public function creat(){

        return view('apprenant.create');
    }
    public function edit($id){
        $user = User::findOrFail($id);
        return view('apprenant.edit',compact('user'));
    }
    public function create(Request $request){
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'date_naissance'=>'required',
            'niveau'=>'required',
            'formation_id'=>'required',
            'email'=>'required',
            'password'=>$this->passwordRules(),
        ]);

        $user  = new User();
        $user->nom= $request->nom;
        $user->prenom = $request->prenom;
        $user->date_naissance = $request->date_naissance;
        $user->niveau = $request->niveau;
        $user->formation_id = $request->formation_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->assignRole('Apprenant');
        $user->save();
        // dd($request->all());
        session()->flash('success', 'Formation  crée avec succés');
        return redirect()->route('apprenant.index');
    }
    public function udapte(Request $request, $id, User $user){

        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'date_naissance'=>'required',
            'niveau'=>'required',
            'formation_id'=>'required',
            'email'=>'required',
            // 'password'=>$this->passwordRules(),
        ]);
    //    dd('$niveau');
       $user = User::findorFail($id);
       $user->update([
            'nom' => $request->nom,
            'prenom'=> $request->prenom,
            'date_naissance'=> $request->date_naissance,
            'formation_id'=> $request->formation_id,
            'email'=> $request->email,
            // 'password'=>  Hash::make($request->password),
        ]);

        session()->flash('success', 'Apprenant modifier  avec succés');
        return redirect()->route('apprenant.index');
    }
     public function delete($id){
        $user= User::find($id);
        $user->delete();
        session()->flash('danger', 'Apprenant supprimer avec succés');
        return redirect()->route('apprenant.index');
    }
}
