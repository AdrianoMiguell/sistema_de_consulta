<?php

namespace App\Http\Controllers;

use App\Models\Consult;
use App\Models\Doctor;
use App\Models\Especialidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required', 'unique',
            'especialidade_id' => 'required',
            'image' => 'nullable|image|max:12000'
        ],[
            'name.required' => 'Informe o nome do médico',
            'name.unique' => 'Este nome já está em uso',
            'image.max' => 'Esta foto ficou muito grande, tente mandar outra de menor tamanho',
        ]);

        $doctor = $request->except('_token');

        !empty($doctor['image'])
            ? $doctor['image'] = $request->image->store('images')
            : $doctor['image'] = "images/imagePerfil.png";

        Doctor::create($doctor);

        return back()
            ->with('status', 'Criado com sucesso!');
    }

    public function dashboardDoctor(Request $request)
    {
        $especialidades = Especialidade::all();
        $doctors = Doctor::paginate(6);
        $search = Request('search');

        if($request->search) {
            $doctors = Doctor::where('name', 'LIKE', "%" . $request->search . "%")->orWhere('especialidade_id', 'LIKE', "%" . $request->search . "%")->orderBy('name', 'asc')->paginate(6);

            foreach ($especialidades as $key => $especialidade){
                 if($request->search == $doctors['especialidade_id']) {
                    $doctors = Doctor::where('especialidade', $doctors['especialidade_id'])->orderBy('especialidade', 'asc')->paginate(6);
                break;
                }
            }
        }

// ->orWhere('especialidade->name', 'LIKE', "%" . $request->search . "%")
        return view('dashboardDoctor', compact('search', 'doctors', 'especialidades'));
    }

   public function viewEdit(Request $request)
    {
        $doctors = Doctor::findOrFail($request->id);
        // $doctor = $request->except('_token');
        $especialidades = Especialidade::all();
        return view('admin.edit_doctor', compact('doctors', 'especialidades'));
    }

    public function Edit(Request $request)
    {
        $request->validate([
            'name' => 'required', 'unique',
            'especialidade_id' => 'required',
            'image' => ['nullable', 'image'],
        ],[
            'name.required' => 'Informe o nome do médico',
            'name.unique' => 'Este nome já está em uso',
        ]);

        $doctors = Doctor::findOrFail($request->id);
        $doctors = $request->except('_token');

        if ($request->image) {
            Storage::delete($request->image);
            $doctor['image'] = $request->image->store('images');
        }
        Doctor::findOrFail($request->id)->update($doctors);

        return redirect()->route('dashboardDoctor')->with('status', 'Editado com sucesso!');
        // view('dashboardDoctor', compact('doctors'))->with('status', 'Editado com sucesso!');

    }

    public function delete($id)
    {
        $doctor = Doctor::find($id);
        Storage::delete($doctor->image);
        $doctor->delete();
        return back()->with('status', 'Deletado com sucesso!');
    }
}
