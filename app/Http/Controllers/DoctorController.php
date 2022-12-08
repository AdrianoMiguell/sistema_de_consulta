<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function create(Request $request)
    {
        $consult = $request->except('_token');

        if (!empty($consult['image'])) {
            $consult['image'] = $request->image->store('images');
        }
        else {
            $consult['image'] = "imagePerfil.png";
        }

        $consult['user_id'] = Auth::user()->id;
        Doctor::create($consult);

        return redirect()->route('dashboard')
            ->with('status', 'Criado com sucesso!');
    }

    public function dashboard(Request $request) {
        $search = Request('search');
            $doctor = Doctor::where('user_id', Auth::user()->id)->where('especialidade', 'LIKE', "%".$request->search."%")->orWhere('name', 'LIKE', "%".$request->search."%")->orderBy('nome', 'asc')->paginate(6);

        return view('dashboard', compact('doctor'),  compact('search'));
    }
}
