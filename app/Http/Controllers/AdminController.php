<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clothe;
use App\Models\Image;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Mostrar datos de la ropa
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
        ]);

        $clothe = new Clothe();
        $clothe->type_product = $validarDatos['type_product'];
        $clothe->name = $validarDatos['name'];
        $clothe->gender = $validarDatos['gender'];
        $clothe->discount = $validarDatos['discount'];
        $clothe->discount_rate = $validarDatos['discount_rate'];
        $clothe->price = $validarDatos['price'];
        $clothe->description = $validarDatos['description'];
        $clothe->save();

        return redirect()->route('admin.all')->with('success', 'La ropa ha sido agregada exitosamente.');
    }

    public function delete($id){
        $clothe = Clothe::findOrFail($id);
        $clothe->delete();
        return redirect()->back()->with('mensaje', 'El registro ha sido eliminado correctamente.');
    }

    public function edit(Request $request, $id){
        $clothe = Clothe::findOrFail($id);
        
        $validarDatos = $request->validate([
            'type_product' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'discount' => 'required',
            'discount_rate' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $clothe->type_product = $validarDatos['type_product'];
        $clothe->name = $validarDatos['name'];
        $clothe->gender = $validarDatos['gender'];
        $clothe->discount = $validarDatos['discount'];
        $clothe->discount_rate = $validarDatos['discount_rate'];
        $clothe->price = $validarDatos['price'];
        $clothe->description = $validarDatos['description'];
        $clothe->save();

        return redirect()->route('admin.all');
    }

    //Mostrar datos de las imagenes
    public function images()
    {
        $images = Clothe::with('images')->groupBy('clothes.id', 'clothes.type_product', 'clothes.name', 'clothes.gender', 'clothes.discount',
                'clothes.discount_rate', 'clothes.price', 'clothes.description')->paginate(5);

        return view('admin.imagesControl', compact('images'));
    }

    public function createImg(Request $request)
    {
        $validarDatos = $request->validate([
            'idClo' => 'required',
            'url' => 'required',
        ]);

        $image = new Image();
        $image->idClo = $validarDatos['idClo'];
        $image->url = $validarDatos['url'];
        $image->save();

        return redirect()->route('admin.images');
    }

    public function deleteImg($id)
    {
        $image = Image::where('idImg', $id);
        $image->delete();
        return redirect()->back()->with('mensaje', 'El registro ha sido eliminado correctamente.');
    }
}
