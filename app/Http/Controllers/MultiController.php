<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class MultiController extends Controller
{
    public function index($table) {
        $table = Crypt::decryptString($table);
        $data = DB::table($table)->get();
        return view('index', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function create($table) {
        $table = Crypt::decryptString($table);
        return view('create', [
            'table' => $table,
        ]);
    }

    public function store($table, Request $request) {
        $request->validate([
            'name' => 'required|string',
        ], [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
        ]);
        DB::table(Crypt::decryptString($table))->insert([['name' => $request->name]]);
        return redirect()->route('index', $table)->with('success', 'created');
    }

    public function edit($table, $id) {
        $table = Crypt::decryptString($table);
        $data = DB::table($table)->find(Crypt::decryptString($id));
        if (!$data) return back()->withErrors('data not found');
        return view('edit', [
            'data' => $data,
            'table' => $table,
        ]);
    }

    public function update($table, $id, Request $request) {
        $data = DB::table(Crypt::decryptString($table))->find(Crypt::decryptString($id));
        if (!$data) return back()->withErrors('data not found');
        $request->validate([
            'name' => 'required|string',
        ], [

            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
        ]);
        DB::table(Crypt::decryptString($table))->update(['id' => Crypt::decryptString($id), 'name' => $request->name]);
        return redirect()->route('index', $table)->with('success', 'updated');
    }

    public function destroy($table, $id) {
        $data = DB::table(Crypt::decryptString($table))->find(Crypt::decryptString($id));
        if (!$data) return back()->withErrors('data not found');
        $data = DB::table(Crypt::decryptString($table))->delete(Crypt::decryptString($id));
        // dd($data);
        return redirect()->route('index', $table)->with('success', 'deleted');
    }
}
