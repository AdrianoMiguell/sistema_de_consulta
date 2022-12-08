<?php

namespace App\Http\Controllers;

use App\Models\Consult;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function register(Request $request)
    {
        $doctor = $request->except('_token');

        if (!empty($doctor['image'])) {
            $doctor['image'] = $request->image->store('images');
        }
        else {
            $doctor['image'] = "imagePerfil.png";
        }


        $doctor['user_id'] = Auth::user()->id;
        Doctor::create($doctor);

        return redirect()->route('dashboard')
            ->with('status', 'Criado com sucesso!');
    }

}
