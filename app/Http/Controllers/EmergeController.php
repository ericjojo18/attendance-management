<?php

namespace App\Http\Controllers;

use App\Models\Emerge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class EmergeController extends Controller
{

    public function index(){
        $user = User::find(Auth::user()->id);
        return view('emerge.index',compact('user'));
    }
    public function create(Request $request)
    {
        $reponse = Http::get('ipinfo.io/'.$request->ip_address.'?token='.env('IP_TOKEN'));
       
        $data = $reponse->json();
        //  dd($data);
        $request->request->add(['region'=>$data['region']]);
         $request->request->add(['country'=>$data['country']]);

        $validated = $request->validate([
            'email' =>'required|email|exists:users,email',
            'ip_address' => 'required|ip|exists:routers,ip_address',
            'region' => 'string|exists:routers,region',
            'ville' => 'string|exists:routers,country',
        ]);
        // dd($request->all());
        if(Auth::id() != null)
        {
           $emerge= Emerge::select('id','user_id','date_day','date_coming','departure_date')
                               ->where('user_id',Auth::id())
                               ->where('date_day',date('Y-m-d'))
                               ->first();
            if($emerge === null)
            {
                // Create new day appointment
                $newEmerge = new Emerge();
                $newEmerge->user_id = Auth::id();
                $newEmerge->date_day = date('Y-m-d');
                $newEmerge->date_coming = date('H:i:s');
                $newEmerge->save();
                session()->flash('success', 'modifier  avec succés');
                session()->flash('success', 'Pointage du matin effectuer avec succès');
                return redirect('emargement');
                with('date_coming','Pointage du matin effectuer avec succès !');
            }elseif($emerge->date_coming !==null && $emerge->departure_date !== null)
            {
                session()->flash('success', 'Vous avez déjà pointer 2 fois au cour de cette journnée !');
                return redirect('emargement');

            }else
            {
               $updateEmerge = Emerge::find($emerge->id);
               $updateEmerge->departure_date = date('H:i:s');
               $updateEmerge->save();
               session()->flash('success','Pointage du soir effectuer avec succès !');
               return redirect('emargement');
            }
        }
    }
    
    public function presence()
    {
        $emerges = Emerge::where('user_id',Auth::id())->get();
        return view('presence.index',compact('emerges'));
    }
}
