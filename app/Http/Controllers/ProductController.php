<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = ProductModel::paginate();

        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new ProductModel();
        return view('product.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*  // Validación de los datos
        $request->validate([
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:1|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_unique' => 'nullable|boolean',
        ]);

        // Para depuración
        // dd($request->all()); // Descomentar para ver los datos que se envían

        // Manejo de la carga de la imagen
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Crear el nuevo producto
        ProductModel::create([
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
            'is_unique' => $request->is_unique ? true : false,
        ]);

        return redirect()->route('products.index')->with('success', 'Producto creado con éxito.');*/
        $product = new ProductModel();
        $product->name = $request->name;
        $product->price = $request->price;
        $unique = $request->is_unique ? true : false;
        $product->is_unique = $unique;
        $product->stock = $request->stock;
        // Mover la imagen a la carpeta public->images
        $imageName = $request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);
        $product->image = $imageName;

        $product->save();
        return redirect()->route('products.index')->with('success', 'Producto creado con éxito.');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = ProductModel::find($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = ProductModel::find($id);

        return view('product.edit', compact('product'));
    }

    /**
     * Destroy the specified resource in storage.
     */
    public function destroy($id)
    {
        ProductModel::find($id)->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado con éxito.');
    }

    public function update(Request $request, $id)
    {
        $product = ProductModel::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $unique = $request->is_unique == '1' ? true : false;
        $product->is_unique = $unique;
        $product->stock = $request->stock;

        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect('/products');
    }
}
