<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Demande;
use App\Models\Salle;

class DemandeController extends Controller
{
    public function nvdemande()
    { 
        return view('enseignants.nvdemande');
    }
 

    public function nvdemandepost(Request $request)
    { 
        $demande = new Demande();

        $auth_user = \Auth::user();
        $demande->user_id = \Auth::user()->id;
        $demande->date = \Carbon\Carbon::now(); 
        $demande->message = $request->message;
        $demande->sujet = $request->sujet;
        $demande->etat = "En attente";

        $admin = \App\Models\User::where('usertype', 'admin')->first();

        $details = [
            'name' => $auth_user->name,
            'sujet' => $request->sujet,
            'message' => $request->message,
        ];

        \Mail::to($admin->email)->send(new \App\Mail\MyTestMail4($details));

        $demande->save();

        return redirect()->back();
    }


    public function hisdemande()
    { 
        $demandes = Demande::orderBy('date', 'desc')->get();

        return view('enseignants.hisdemande', compact('demandes'));
    }

    public function adminhisdemande()
    { 
        $demandes = Demande::orderBy('date', 'desc')->get();

        return view('admin.adminhisdemande', compact('demandes'));
    }

    public function adminreponsedemande($id)
    { 
        $demande = Demande::where('id', $id)->first();
        $salles = Salle::get();

        return view('admin.adminreponsedemande', compact('demande','salles'));
    }

    public function adminreponsedemandepost(Request $request)
    { 
        $demande = Demande::where('id', $request->id)->first();

        $demande->salle_id = $request->salle_id;
        $demande->etat = $request->etat;


        $demande->update();

        return redirect()->route('adminhisdemande');
    }
}
