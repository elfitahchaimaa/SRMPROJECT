<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    // Affichage du formulaire de connexion
    public function loginForm() {
        return view('auth.login');
    }
   
    // Gestion de l'authentification
    public function login(Request $request) {
        // Validation des données de formulaire
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
       
        // Tentative d'authentification
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->has('remember'))) {
            // Régénération de la session pour éviter les attaques de fixation de session
            $request->session()->regenerate();
            
            // Redirection vers le dashboard ou la page prévue
            return redirect()->intended('dashboard')->with('message', 'Connexion réussie');
        }
       
        // Si l'authentification échoue
        return back()->withErrors(['email' => 'Identifiants incorrects'])->withInput(['email' => $request->email]);
    }

    // Page du dashboard
    public function dashboard() {
        // Vérification si l'utilisateur est connecté
        if (Auth::check()) {
            return view('dashboard.index'); // Assurez-vous du bon chemin de votre fichier Blade
        }
        return redirect()->route('login')->withErrors(['message' => 'Vous devez être connecté pour accéder au dashboard.']);
    }
   
    // Déconnexion
    public function logout(Request $request) {
        Auth::logout(); // Déconnexion de l'utilisateur
    
        $request->session()->invalidate(); // Invalider la session
        $request->session()->regenerateToken(); // Régénérer le token CSRF
    
        return redirect()->route('login'); // 🔥 Redirection vers la page de connexion
    }
    

    // Formulaire de réinitialisation de mot de passe
    public function forgotPasswordForm() {
        return view('auth.passwords.email');
    }
    

    // Envoi du lien de réinitialisation
    public function sendResetLink(Request $request) {
        $request->validate(['email' => 'required|email']);
        
        // Envoi du lien de réinitialisation
        $status = Password::sendResetLink($request->only('email'));
        
        // Retour avec message approprié
        return $status === Password::RESET_LINK_SENT
                    ? back()->with('status', 'Un lien de réinitialisation a été envoyé.')
                    : back()->withErrors(['email' => __($status)]);
    }
}