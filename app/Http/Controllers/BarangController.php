<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Barang;

class BarangController extends Controller
{
    
    public function index()
    {
        $allBarang = Barang::all();
        return view('layouts.app_admin.all_barang', compact('allBarang'));
    }

    public function create()
    {
        return view('layouts.app_admin.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'nama_barang' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect('barang/create')
            ->withErrors($validator)
            ->withInput();
        }

        // upload image
        $gambar = $request->file('gambar')->store('storage');
        Storage::putFile('public', $request->file('gambar'));

        Barang::create([
            'nama_barang' => $request->nama_barang, 
            'harga' => $request->harga, 
            'keterangan' => $request->keterangan, 
            'gambar' => $gambar
        ]);

        return redirect()->route('barang.index')->with(['message' => 'Barang added successfully!', 'status' => 'success']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $barang = Barang::FindOrFail($id);
        return view('layouts.app_admin.edit', compact('barang'));
    }


    public function update(Request $request, $id)
    {
        $barang = Barang::FindOrFail($id);
        $validator = Validator::make($request->all(), [ 
            'nama_barang' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect('barang/create')
            ->withErrors($validator)
            ->withInput();
        }

        if ($request->hasFile('gambar')) {
            //delete old image
            $destination = $barang->gambar;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            // upload new image
            $newImage = $request->file('gambar')->store('storage');
            Storage::putFile('public', $request->file('gambar'));

            $barang->update([
                'nama_barang' => $request->nama_barang, 
                'harga' => $request->harga, 
                'keterangan' => $request->keterangan, 
                'gambar' => $newImage
            ]);
        } else {
            // update product without image
            $barang->update([
                'nama_barang' => $request->nama_barang, 
                'harga' => $request->harga, 
                'keterangan' => $request->keterangan, 
            ]);
        }
        return redirect()->route('barang.index')->with(['message' => 'Product updated successfully!', 'status' => 'success']);
    }


    public function destroy($id)
    {
        $barang = Barang::find($id);
        File::delete($barang->gambar);

        Barang::where('id', $id)->delete();
        return redirect()->route('barang.index')->with(['message' => 'Barang deleted successfully!', 'status' => 'success']);
    }
}
