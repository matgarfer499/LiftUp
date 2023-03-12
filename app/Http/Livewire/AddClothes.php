<?php

namespace App\Http\Livewire;

use Livewire\Component;
use app\Models\Clothe;

class AddClothes extends Component
{   
    public $type_product;
    
    public $name;

    public $gender;

    public $discount;

    public $discount_rate;

    public $price;

    public $description;

    public function render()
    {
        return view('livewire.add-clothes');
    }

    public function save()
    {
        $validarDatos = $this->validate([
            'type_product' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'discount' => 'required',
            'discount_rate' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

            Clothe::create($validarDatos);

            //$this->reset(['type_product', 'name', 'gender', 'discount', 'discount_rate', 'price', 'description']);

            session()->flash('message', 'Ropa añadida correctamente');
            $this->reset();

    }
}
