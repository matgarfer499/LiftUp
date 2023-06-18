<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clothe;
use App\Models\Image;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //Show the data of the clothes
    public function all()
    {
        $clothes = Clothe::paginate(7);
        return view('admin.adminControl', compact('clothes'));
    }

    public function create(Request $request)
    {
        $validarDatos = $request->validate([
            'type_product' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'discount' => 'required',
            'discount_rate' => 'required',
            'price' => 'required',
            'description' => 'required',
            'material' => 'required',
        ]);

        $clothe = new Clothe();
        $clothe->type_product = $validarDatos['type_product'];
        $clothe->name = $validarDatos['name'];
        $clothe->gender = $validarDatos['gender'];
        $clothe->discount = $validarDatos['discount'];
        $clothe->discount_rate = $validarDatos['discount_rate'];
        $clothe->price = $validarDatos['price'];
        $clothe->description = $validarDatos['description'];
        $clothe->material = $validarDatos['material'];
        $clothe->save();

        return redirect()->route('admin.all')->with('success', 'La ropa ha sido agregada exitosamente.');
    }

    public function delete($id)
    {
        $clothe = Clothe::findOrFail($id);
        $clothe->delete();
        return redirect()->back()->with('mensaje', 'El registro ha sido eliminado correctamente.');
    }

    public function edit(Request $request, $id)
    {
        $clothe = Clothe::findOrFail($id);

        $validarDatos = $request->validate([
            'type_product' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'discount' => 'required',
            'discount_rate' => 'required',
            'price' => 'required',
            'description' => 'required',
            'material' => 'required',
        ]);

        $clothe->type_product = $validarDatos['type_product'];
        $clothe->name = $validarDatos['name'];
        $clothe->gender = $validarDatos['gender'];
        $clothe->discount = $validarDatos['discount'];
        $clothe->discount_rate = $validarDatos['discount_rate'];
        $clothe->price = $validarDatos['price'];
        $clothe->description = $validarDatos['description'];
        $clothe->material = $validarDatos['material'];
        $clothe->save();

        return redirect()->route('admin.all');
    }

    //show the images of the clothes
    public function images()
    {
        $images = Clothe::with('images')->paginate(5);

        return view('admin.imagesControl', compact('images'));
    }

    public function createImg(Request $request)
    {
        $validarDatos = $request->validate([
            'idClo' => 'required',
            'url' => 'required',
            'name' => 'required',
        ]);
        $path = $request->file('url')->store('public/');
        $storage_path = Storage::url($path);

        $image = new Image();
        $image->idClo = $validarDatos['idClo'];
        $image->url = $storage_path;
        $image->save();

        return redirect()->route('admin.images');
    }


    public function deleteImg($id)
    {
        $image = Image::where('idImg', $id);
        $image->delete();
        return redirect()->back()->with('mensaje', 'El registro ha sido eliminado correctamente.');
    }

    public function sizesColors()
    {
        $sizesColors = Clothe::with('clothingColor')->with('clothingSize')->paginate(7);
        $adminColors = Color::get();
        $adminSizes = Size::get();
        $existingSizes = [];
        return view('admin.sizesColors', compact('sizesColors', 'adminColors', 'adminSizes', 'existingSizes'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $url = $request->input('url');

        $clothes = Clothe::where(function ($query) use ($search) {
            $query->where('type_product', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->orWhere('gender', 'like', '%' . $search . '%');
        });

        if ($url === "imagenes") {
            $clothes = $clothes->with('images');
        } else if ($url === "sizesColors") {
            $clothes = $clothes->with('clothingColor')->with('clothingSize');
        }
        $adminColors = Color::get();
        $adminSizes = Size::get();

        $clothes = $clothes->get();

        return view('admin.search', compact('clothes', 'url', 'adminColors', 'adminSizes'));
    }
}
