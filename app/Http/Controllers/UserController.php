<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function reg(){
        if(!Auth::check()){
            return view('reg');
        } else{
            return view('profil');
        }

    }

    public function regData(Request $req){
        if(!Auth::check()){
            $req->validate([
                'nev'   => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => ['required', 'confirmed', Password::min(8)->numbers()->letters()->mixedCase()],
                'password_confirmation'             => 'required'
            ],[
                'nev.required' => 'Kérem adja meg a nevét!',
                'email.required' => 'Kérem adja meg az email címét!',
                'email.email' => 'Kérem hiteles email címet adjon meg',
                'password.required' => 'Kérem adjon meg egy jelszót!',
                'password.confirmed' => 'A két jelszó nem egyezik!',
                'password.min'  => 'A jelszó minimum 8 karakter legyen!',
                'password.numbers' => 'A jelszóban szerepeljenek számok a fokozott biztonság érdekében!',
                'password.letters' => 'A jelszóban szerepeljenek betűk a fokozott biztonság érdekében!',
                'password.mixedCase' => 'A jelszóban szerepeljenek kis- és nagybetűk a fokozott biztonság érdekében!',
                'password_confrimation.required' => 'A jelszót kötelező mégegyszer megadni!'
            ]);
            $data = new User;
            $data->username = $req->nev;
            $data->Email = $req->email;
            $data->password = Hash::make($req->password);
            $data->Save();
            return redirect('/')->with('success', 'Sikeres regisztráció!');
        } else{
            return view('profil');
        }

    }

    public function Login(){
        if(!Auth::check()){
            return view('login');
        } else {
            return redirect ('/profil');
        }
    }

    public function LoginData(Request $req)
{
    if(!Auth::check()) {
        $req->validate([
            'credentials' => 'required',
            'password'    => 'required',
        ], [
            'credentials.required' => 'Kötelező megadni!',
            'password.required'    => 'Kötelező megadni!',
        ]);

        if (Auth::attempt(['username' => $req->credentials, 'password' => $req->password])) {
            return redirect('/')->with('success', 'Üdvözöljük az oldalunkon!');
        } else if (Auth::attempt(['email' => $req->credentials, 'password' => $req->password])) {
            return redirect('/')->with('success', 'Üdvözöljük az oldalunkon!');
        } else {
            return redirect('/login')->with('error', 'Próbáld meg újra kérlek!');
        }
    } else {
        return redirect('/profil');
    }
}

    public function Profil(){
        if(Auth::check()){
            return view('profil');
        } else{
            return redirect('/login', [
                'sv' => "Kérem lépjen be!"
            ]);
        }
    }

    public function Logout(){
        Auth::logout();
        return redirect('/')->with('success', 'Kilépés sikeres volt!');
    }


    public function Newpass(){
        if(Auth::check()){
            return view('newpass');
        } else {
            return redirect('/login');
        }
    }

    public function NewpassData(Request $req){
        if(Auth::check()){
            $req->validate([
                'oldpassword'                          => 'required',
                'newpassword'                          => ['required', 'confirmed', Password::min(8)->numbers()->letters()->mixedCase()],
                'newpassword_confirmation'             => 'required'
            ],[
                'oldpassword.required'                 => 'Kötelező megadni a régi jelszót!',
                'newpassword.required'                 => 'Kérem adjon meg egy jelszót!',
                'newpassword.mixedCase'                 => 'Kis- és nagybetűket is alkalmazzon a jelszó választásánál!',
                'newpassword.numbers'                  => 'A jelszavában alkalmazzon számokat is!',
                'newpassword.letters'                  => 'A jelszavában alkalmazzon betűket is!',
                'newpassword.confirmed'                => 'A két jelszó nem egyezik!',
                'newpassword.min'                      => 'A jelszó minimum 8 karakter legyen!',
                'newpassword_confirmation_required.'   => 'Kérem adja meg a jelszót mégegyszer!'
            ]);

            if(Hash::check($req->oldpassword, Auth::user()->password)){
                $data                      = User::find(Auth::user()->User_id);
                $data->password            = Hash::make($req->newpassword);
                $data->Save();
                return redirect('/profil')->with('success', 'Sikeresen módosítottad a jelszavadat!');
            } else {
                return redirect('/login')->with('error', 'A profil megtekintéséhez előszőr jelentkezz be, vagy ha nincs fiókod regisztrálj!');
            }
        } else{
            return view('login');
        }

    }

}
