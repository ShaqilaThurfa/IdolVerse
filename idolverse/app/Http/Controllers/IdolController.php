<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idol;

class IdolController extends Controller
{
    //
    public function index()
    {
        $idols = Idol::all();
        return view('idols.index', compact('idols'));
    }

    public function show($id)
    {
        $idol = Idol::find($id);
        return view('idols.show', compact('idol'));
    }

    public function create()
    {
        return view('idols.create');
    }

    public function store (Request $request)
    {
        $idol = new Idol();
        $idol->name = $request->name;
        $idol->groupId = $request->groupId;
        $idol->agencyId = $request->agencyId;
        $idol->position = $request->position;
        $idol->photo = $request->photo;
        $idol->instagram = $request->instagram;
        $idol->save();
        return redirect()->route('idols.index');
    }

    public function edit($id)
    {
        $idol = Idol::find($id);
        return view('idols.edit', compact('idol'));
    }

    public function update(Request $request, $id)
    {
        $idol = Idol::find($id);
        $idol->name = $request->name;
        $idol->groupId = $request->groupId;
        $idol->agencyId = $request->agencyId;
        $idol->position = $request->position;
        $idol->photo = $request->photo;
        $idol->instagram = $request->instagram;
        $idol->save();
        return redirect()->route('idols.index');
    }

    public function destroy($id)
    {
        $idol = Idol::find($id);
        $idol->delete();
        return redirect()->route('idols.index');
    }

}
