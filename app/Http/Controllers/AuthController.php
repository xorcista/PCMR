<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\CentroSalud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tipo' => ['required', 'in:paciente,medico,centro'],
            'telefono' => ['required', 'string', 'max:15'],
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipo' => $request->tipo,
            'telefono' => $request->telefono,
        ];

        $user = User::create($userData);

        if ($request->tipo === 'paciente') {
            $request->validate([
                'fecha_nacimiento' => ['required', 'date'],
                'genero' => ['required', 'in:masculino,femenino,otro'],
            ]);

            $paciente = Paciente::create([
                'user_id' => $user->id,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'genero' => $request->genero,
            ]);
            $user->paciente_id = $paciente->id;
        } 
        elseif ($request->tipo === 'medico') {
            $request->validate([
                'especialidad_id' => ['required', 'exists:especialidades,id'],
                'centro_salud_id' => ['required', 'exists:centros_salud,id'],
                'numero_colegiado' => ['required', 'string', 'unique:medicos'],
            ]);
            
            $medico = Medico::create([
                'user_id' => $user->id,
                'especialidad_id' => $request->especialidad_id,
                'centro_salud_id' => $request->centro_salud_id,
                'numero_colegiado' => $request->numero_colegiado,
                'biografia' => $request->biografia,
            ]);
            $user->medico_id = $medico->id;
        }

        $user->save();

        event(new Registered($user));

        auth()->login($user);

        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($request->only('email', 'password'), $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}