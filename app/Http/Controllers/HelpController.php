<?php

namespace App\Http\Controllers;

use App\Models\Help;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index(){
        $helps = Help::all();
        return view('admin.help.index', compact('helps'));
    }

    public function post(Request $request){
        Help::create($request->all());
        return redirect()->back()->with(['success' => "Bantuan telah ditambahkan"]);
    }

    public function edit($id){
        $help = Help::findOrFail($id);
        return view('admin.help.edit', compact('help'));
    }

    public function update(Request $request, $id){
        $help = Help::findOrFail($id);
        $help->update($request->all());
        return redirect()->route('admin.help.index')->with(['success' => "Bantuan telah diperbarui"]);
    }

    public function delete($id){
        Help::findOrFail($id)->delete();
        return redirect()->route('admin.help.index')->with(['success' => "Bantuan telah dihapus"]);
    }
}
