<?php

namespace App\Http\Controllers;

use App\Models\Consult;
use App\Http\Requests\StoreConsultRequest;
use App\Http\Requests\UpdateConsultRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConsultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        Consult::create($consult);

        return redirect()->route('dashboard')
            ->with('status', 'Criado com sucesso!');
    }

    public function dashboard(Request $request)
    {
        $search = Request('search');
            $consults = Consult::where('user_id', Auth::user()->id)->where('especialidade', 'LIKE', "%".$request->search."%")->orWhere('name', 'LIKE', "%".$request->search."%")->orWhere('date', 'LIKE', "%".$request->search."%")->orWhere('hour', 'LIKE', "%".$request->search."%")->orderBy('date', 'asc')->paginate(6);

        return view('dashboard', compact('consults'),  compact('search'));
        // return view('home', compact('consults'));
    }

    public function home(Request $request) {
        $search = Request('search');
            $consults = Consult::where('user_id', Auth::user()->id)->where('especialidade', 'LIKE', "%".$request->search."%")->orWhere('name', 'LIKE', "%".$request->search."%")->orWhere('date', 'LIKE', "%".$request->search."%")->orWhere('hour', 'LIKE', "%".$request->search."%")->orderBy('date', 'asc')->paginate(6);

        return view('home', compact('consults'),  compact('search'));
    }

    public function delete(Request $request){
        $consult = Consult::findOrFail($request->id);
        Storage::delete($consult->image);
        $consult->delete();
        return back()->with('status', 'Deletado com sucesso!');
    }
}
