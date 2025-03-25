<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    //
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    public function show($id)
    {
        $group = Group::find($id);
        return view('groups.show', compact('group'));
    }

    public function store (Request $request)
    {
        $group = new Group();
        $group->name = $request->name;
        $group->agencyId = $request->agencyId;
        $group->type = $request->type;
        $group->description = $request->description;
        $group->photo = $request->photo;
        $group->members = $request->members;
        $group->instagram = $request->instagram;
        $group->website = $request->website;
        $group->save();
        return redirect()->route('groups.index');
    }

    public function form($id = null)
    {
    $group = $id ? Group::find($id) : new Group(); // Jika ada ID, ambil data untuk edit, kalau tidak buat baru
    return view('groups.form', compact('group'));
    }


    public function update(Request $request, $id)
    {
        $group = Group::find($id);
        $group->name = $request->name;
        $group->agencyId = $request->agencyId;
        $group->type = $request->type;
        $group->description = $request->description;
        $group->photo = $request->photo;
        $group->members = $request->members;
        $group->instagram = $request->instagram;
        $group->website = $request->website;
        $group->save();
        return redirect()->route('groups.index');
    }

    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
        return redirect()->route('groups.index')->with('success', 'Data berhasil dihapus');
    }

}
