<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Annonce;


class AnnonceController extends Controller
{
    //PARTIE ensignant
    public function nvannonce()
    { 
        return view('enseignants.nvannonce');
    }


    public function nvannoncepost(Request $request)
    { 
        $annonce = new Annonce();

        $annonce->user_id = \Auth::user()->id;
        $annonce->date = \Carbon\Carbon::now(); 
        $annonce->titre = $request->titre;
        $annonce->contenu = $request->contenu;

        $auth_user = \Auth::user();

        $users = \App\Models\User::all(); // Récupérer tous les utilisateurs

        foreach ($users as $user) {
            $details = [
                'name' => $auth_user->name,
                'titre' => $request->titre,
                'contenu' => $request->contenu,
            ];

            \Mail::to($user->email)->send(new \App\Mail\MyTestMail3($details));
        }

        $annonce->save();

        return redirect()->back();
    }

    public function hisannonce()
    { 
        $annonces = Annonce::orderBy('date', 'desc')->where('user_id', \Auth::user()->id)->get();

        return view('enseignants.hisannonce',compact('annonces'));
    }

    //partie admin
    public function adminnvannonce()
    { 
        return view('admin.environnement.adminnvannonce');
    }


    public function adminnvannoncepost(Request $request)
    { 
        $annonce = new Annonce();

        $annonce->user_id = \Auth::user()->id;
        $annonce->date = \Carbon\Carbon::now(); 
        $annonce->titre = $request->titre;
        $annonce->contenu = $request->contenu;

        $auth_user = \Auth::user();

        $users = \App\Models\User::all(); // Récupérer tous les utilisateurs

        foreach ($users as $user) {
            $details = [
                'name' => $auth_user->name,
                'titre' => $request->titre,
                'contenu' => $request->contenu,
            ];

            \Mail::to($user->email)->send(new \App\Mail\MyTestMail3($details));
        }


        $annonce->save();

        return redirect()->back();
    }

    public function adminhisannonce()
    { 
        $annonces = Annonce::orderBy('date', 'desc')->get();

        return view('admin.environnement.adminhisannonce',compact('annonces'));
    }

    public function admideleteannonce($id)
    {
        $annonce = Annonce::find($id);

        $annonce->delete();
        return redirect()->back()->with('success', 'Annonce supprimée avec succès.');
    }


    public function adminannonce($id)
    { 
        $annonce = Annonce::where('id', $id)->first();
        return view('admin.environnement.annonce',compact('annonce'));
    }

    public function admineditannonce($id)
    { 
        $annonce = Annonce::where('id', $id)->first();
        return view('admin.environnement.modifannonce',compact('annonce'));
    }


    public function admineditannoncepost(Request $request)
    { 
        $annonce = Annonce::where('id', $request->id)->first();

        $annonce->date = \Carbon\Carbon::now(); 
        $annonce->titre = $request->titre;
        $annonce->contenu = $request->contenu;
  

        $annonce->update();

        return redirect()->back()->with('success', 'Annonce modifiée par Admin avec succès.');
    }
}
