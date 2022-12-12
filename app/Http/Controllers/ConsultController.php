<?php

namespace App\Http\Controllers;

use App\Models\Consult;
use App\Http\Requests\StoreConsultRequest;
use App\Http\Requests\UpdateConsultRequest;
use App\Models\Doctor;
use App\Models\Especialidade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConsultController extends Controller
{

    public function create(Request $request)
    {
        $request->validate(
            [
                'title' => 'required | string',
                'description' => 'required | string',
                'date' => 'required | date',
                'hour' => 'required',
                'doctor_id' => 'required | numeric',
            ],
            [
                'title.required' => 'A consulta precisa ser titulada',
                'description.required' => 'Insira uma descrição sobre a consulta',
                'date.required' => 'Informe a data em que a consulta será realizada',
                'hour.required' => 'Informe a hora em que a consulta será realizada',
            ]
        );

        $consult = $request->except('_token');
        Consult::create($consult);

        return back()
            ->with('status', 'Criado com sucesso!');
    }

    public function dashboard(Request $request)
    {
        $doctors = Doctor::all();
        $especialidades = Especialidade::all();
        $search = Request('search');
        $consults = Consult::where('description', 'LIKE', "%" . $request->search . "%")->orWhere('title', 'LIKE', "%" . $request->search . "%")->orWhere('date', 'LIKE', "%" . $request->search . "%")->orWhere('hour', 'LIKE', "%" . $request->search . "%")->orderBy('date', 'asc')->paginate(6);

        return view('dashboard', compact('consults', 'search', 'doctors', 'especialidades'));
    }

    public function teste(Request $request)
    {
        $doctors = Doctor::all();
        $especialidades = Especialidade::all();
        $consults = Consult::all();

        return view('teste', compact('consults', 'doctors', 'especialidades'));
    }

    public function viewEdit(Request $request)
    {
        $consults = Consult::findOrFail($request->id);
        // $doctor = $request->except('_token');
        $doctors = Doctor::all();
        return view('admin.edit_consult', compact( 'consults', 'doctors'));
    }

    public function Edit(Request $request)
    {
        $request->validate(
            [
                'title' => 'required | string',
                'description' => 'required | string',
                'date' => 'required | date',
                'hour' => 'required',
                'doctor_id' => 'required | numeric',
            ],
            [
                'title.required' => 'A consulta precisa ser titulada',
                'description.required' => 'Insira uma descrição sobre a consulta',
                'date.required' => 'Informe a data em que a consulta será realizada',
                'hour.required' => 'Informe a hora em que a consulta será realizada',
            ]
        );

        $consults = Consult::findOrFail($request->id);
        $consults = $request->except('_token');
        Consult::findOrFail($request->id)->update($consults);
        
        return redirect()->route('dashboard')->with('status', 'Editado com sucesso!');
    }

    public function delete($id)
    {
        $consult = Consult::find($id);
        $consult->delete();
        return back()->with('status', 'Deletado com sucesso!');
    }
}
