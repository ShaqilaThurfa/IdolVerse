<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agency;

class AgencyController extends Controller
{
    //
    public function index()
    {
        $agencies = Agency::all();
        return view('agencies.index', compact('agencies'));
    }

    public function show($id)
    {
        $agency = Agency::find($id);
        return view('agencies.show', compact('agency'));
    }

    public function create()
    {
        return view('agencies.create');
    }

    public function store (Request $request)
    {
        $agency = new Agency();
        $agency->name = $request->name;
        $agency->CEO = $request->CEO;
        $agency->logo = $request->logo;
        $agency->website = $request->website;
        $agency->save();
        return redirect()->route('agencies.index');
    }

    public function edit($id)
    {
        $agency = Agency::find($id);
        return view('agencies.edit', compact('agency'));
    }

    public function update(Request $request, $id)
    {
        $agency = Agency::find($id);
        $agency->name = $request->name;
        $agency->CEO = $request->CEO;
        $agency->logo = $request->logo;
        $agency->website = $request->website;
        $agency->save();
        return redirect()->route('agencies.index');
    }

    public function destroy($id)
    {
        $agency = Agency::find($id);
        $agency->delete();
        return redirect()->route('agencies.index');
    }

}
