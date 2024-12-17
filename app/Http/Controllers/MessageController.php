<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //Partie admin
    public function hismessage()
    { 
        $messages = Message::where('enseignant_id', \Auth::user()->id)->orderBy('date', 'desc')->get();

        return view('enseignants.hismessage', compact('messages'));
    }

    //Partie etudiant

    public function etudianthismessage()
    { 
        $messages = Message::where('etudiant_id', \Auth::user()->id)->orderBy('date', 'desc')->get();

        return view('etudiants.etudianthismessage', compact('messages'));
    }

    public function messageetudiant()
    { 
        $users = User::where('usertype', 'enseignant')->get();

        return view('etudiants.messageetudiant', compact('users'));
    }

    public function messageetudiantpost(Request $request)
    { 
        $message = new Message();

        $message->etudiant_id = \Auth::user()->id;
        $message->date = \Carbon\Carbon::now(); 
        $message->enseignant_id = $request->enseignant_id;
        $message->sujet = $request->sujet;
        $message->message = $request->message;

        $message->save();

        return redirect()->back();
    }

}
