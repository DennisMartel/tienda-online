<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Departamento;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Subcategoria;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function index()
    {
        return view('admin.productos.index');
    }

    public function create()
    {
        $departamentos = Departamento::all();
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        $marcas = Marca::all();
        return view('admin.productos.create', compact('departamentos', 'categorias','subcategorias', 'marcas'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'codigo' => 'required|string|unique:productos',
            'nombre'=>'required|string|unique:productos',
            'precio_venta'=>'required|numeric',
            'stock' => 'required|numeric',
            'descripcion_corta'=>'nullable|string',
            'descripcion_larga'=>'nullable|string',
            'departamento_id' => 'required',
            'categoria_id' => 'required',
            'subcategoria_id' => 'required',
            'marca_id' => 'required',
        ], [
            'codigo.required'=>'El campo es requerido',
            'codigo.string'=>'Los valores ingresados no son admitidos.',
            'codigo.unique'=>'Ya existe un producto con este código.',

            'nombre.required'=>'El campo es requerido',
            'nombre.string'=>'Los valores ingresados no son admitidos.',
            'nombre.unique'=>'Ya existe un producto con este nombre.',

            'precio_venta.required' => 'El campo es requerido.',
            'precio_venta.numeric' => 'El precio debe ser un numero.',

            'stock.required' => 'El campo es requerido.',
            'stock.numeric' => 'EL stock debe ser un numero entero.',

            'descripcion_corta.required' => 'Valores ingresados no son admitidos',

            'descripcion_larga.required' => 'Valores ingresados no son admitidos',

            'departamento_id.required' => 'El campo es requerido.',

            'categoria_id.required' => 'El campo es requerido.',

            'subcategoria_id.required' => 'El campo es requerido.',

            'marca_id.required' => 'El campo es requerido.',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $producto = Producto::create([
                "codigo" => $request->codigo,
                "nombre"=>$request->nombre,
                "slug"=>Str::slug($request->nombre, '-'),
                "precio_venta" => $request->precio_venta,
                "descripcion_larga" => $request->descripcion_larga,
                "descripcion_corta" => $request->descripcion_corta,
                "departamento_id" => $request->departamento_id,
                "categoria_id" => $request->categoria_id,
                "subcategoria_id" => $request->subcategoria_id,
                "marca_id" => $request->marca_id,
                'created_at'=>Carbon::now('America/El_Salvador'),
                'updated_at'=>Carbon::now('America/El_Salvador'),
            ]);
            
            if($request->hasFile('imagenes')) 
            {
                $imagenes = $request->imagenes;
                foreach($imagenes as $imagen) 
                {
                    $file = $imagen;
                    $extension = $imagen->extension();
                    $file_name = time().'_'.uniqid().'.'.$extension;
                    $upload = $file->storeAs("producto_images", $file_name, 'public');

                    DB::table('productos_imagenes')->insert([
                        'imagenes' => $upload,
                        'producto_id' => $producto->id,
                        'created_at'=>Carbon::now('America/El_Salvador'),
                        'updated_at'=>Carbon::now('America/El_Salvador'),
                    ]);
                }

            }
            return response()->json(['code'=>1, 'msg'=>'Producto registrado correctamente']);
        }
    }

    public function getSliders(Request $request) {
        $productos = Producto::orderBy('id', 'DESC')->orWhere('nombre', 'LIKE', '%'.$request->search.'%')->paginate(10);
        $data = view('partials.admin.productos.getData', compact('productos'))->render();
        return response()->json(['code'=>1, 'result'=>$data, 'links'=>$productos->links()->render()]);
    }

    public function delete(Request $request) {
        $producto = Producto::find($request->producto_id);

        if ($producto->imagen != null && \Storage::disk('public')->exists($producto->imagen)) {
            \Storage::disk('public')->delete($producto->imagen);
        }

        $delete = $producto->delete();

        if($delete) {
            return response()->json(['code'=>1, 'msg'=>'Producto eliminado correctamente']);
        } else {
            return response()->json(['code'=>0, 'msg'=>'Error al eliminar']);
        }
    }
}
