<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
   
    public function login()
    {
    if (Auth::check()) {
        return $this->redirectUser();
    }
    return view('auth.login');
    }

    public function authlogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();

            if ($user->etat === 'true') {
                return redirect()->route('changermotdepasse');
            }

            return $this->redirectUser();
        }
        return redirect()->back()->with('error', 'Veuillez entrer correctement votre email et mot de passe.');
    }

    public function logout()
    {
        Auth::logout(); 

        session()->flush();

        session()->regenerate();

        return redirect('/');
    }


    private function redirectUser()
    {
        $user = Auth::user();
        if ($user->usertype == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->usertype == 'enseignant') {
            return redirect()->route('enseignants.dashboard');
        } elseif ($user->usertype == 'etudiant') {
            return redirect()->route('etudiants.dashboard');
        }
    }



    //Partie mdp 
    public function motdepasseoublie()
    {
        return view('motdepasseoublie');
    }

    public function motdepasseoubliepost(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return back()->with('error', 'Aucun utilisateur trouvé avec cet email.');
        }
    
        $plainPassword = Str::random(8); 
        $user->password = bcrypt($plainPassword);
    
        $details = [
            'email' => $user->email,
            'password' => $plainPassword, // Utiliser le mot de passe non crypté dans l'e-mail
        ];
        \Mail::to($user->email)->send(new \App\Mail\MyTestMail2($details));
    
        $user->update();
        
        return redirect()->route('login');
    }
    




    public function changermotdepasse()
    {
        $user = Auth::user(); 

        if ($user->etat === 'true') {
            return view('changermotdepasse', compact('user'));
        }

        return redirect()->route('login'); 
    }
    
    public function changermotdepassepost(Request $request)
    {
        // Valider les données
        $request->validate([
            'email' => 'required|email',
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Trouver l'utilisateur par e-mail
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Aucun utilisateur trouvé avec cet e-mail.');
        }

        // Vérifier le mot de passe actuel
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Le mot de passe actuel est incorrect.');
        }

        $user->password = Hash::make($request->new_password);
        $user->etat =  'false';
        
        $user->update();

        return redirect()->route('login');
    }


    public function changermotdepasse2()
    {
        $user = Auth::user(); 

        return view("changermotdepasse2",compact('user'));
    }
    
    public function changermotdepassepost2(Request $request)
    {
        // Valider les données
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
        $user = Auth::user();

        // Vérifier le mot de passe actuel
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors('error', 'Le mot de passe actuel est incorrect.');
        }

        $user->password = Hash::make($request->new_password);
        $user->etat =  'false';
        
        $user->update();

        if ($user->usertype == 'enseignant') {
            return (new ProfileController())->profilens();
        } elseif ($user->usertype == 'etudiant') {
            return (new ProfileController())->profiletud();
        }      
    }
}