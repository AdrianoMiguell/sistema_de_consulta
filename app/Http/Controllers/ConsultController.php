<?php

namespace App\Http\Controllers;

use App\Models\Consult;
use App\Http\Requests\StoreConsultRequest;
use App\Http\Requests\UpdateConsultRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        $request->validate([
            'name' => 'required',
            'especialidade' => 'required',
            'date' => 'required',
            'hour' => 'required',
            'image' => ['nullable', 'image']
        ], [
            'content.required' => 'O campo :attibute é obrigatório!'
        ]);

        if ($request['image'] != null) {
            $request['image'] = $request->image->store('images');
        }
        $consult = $request->except('_token');
        // $consult['image'] = $request->image->store('images');
        $consult['user_id'] = Auth::user()->id;
        Consult::create($consult);
        return back();
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



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreConsultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsultRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consult  $consult
     * @return \Illuminate\Http\Response
     */
    public function show(Consult $consult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consult  $consult
     * @return \Illuminate\Http\Response
     */
    public function edit(Consult $consult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConsultRequest  $request
     * @param  \App\Models\Consult  $consult
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsultRequest $request, Consult $consult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consult  $consult
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consult $consult)
    {
        //
    }
}
