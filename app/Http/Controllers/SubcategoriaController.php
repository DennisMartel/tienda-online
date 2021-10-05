<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategoria;
use App\Models\Categoria;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SubcategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.subcategorias.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nombre'=>'required|string|unique:categorias',
            'descripcion'=>'nullable|string',
            'imagen'=>'required|image',
            'categoria' => 'required|string',
        ], [
            'nombre.required'=>'El nombre de la subcategoria es requerido.',
            'nombre.string'=>'Los valores ingresados no son admitidos.',
            'nombre.unique'=>'Ya existe una subcategoria con este nombre.',

            'descripcion.string'=>'Los valores ingresados no son admitidos.',

            'categoria.required'=>'Selecciona una categoria.',
            'categoria.string'=>'Los valores ingresados no son admitidos.',

            'imagen.required'=>'La imagen de la subcategoria es requerida.',
            'imagen.image'=>'Archivos permitidos solo imagenes.',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $file = $request->file('imagen');
            $extension = $request->file('imagen')->extension();
            $file_name = time().'_'.uniqid().'.'.$extension;
            $upload = $file->storeAs("upload_subcategories", $file_name, 'public');

            if($upload) {
                Subcategoria::create([
                    'nombre'=>$request->nombre,
                    'slug'=>Str::slug($request->nombre, '-'),
                    'descripcion' => $request->descripcion,
                    'categoria_id'=> $request->categoria,
                    'imagen'=>$file_name,
                    'created_at'=>Carbon::now('America/El_Salvador'),
                    'updated_at'=>Carbon::now('America/El_Salvador'),
                ]);
                return response()->json(['code'=>1, 'msg'=>'Subcategoria registrada correctamente']);
            }
        }
    }

    public function getSubcategorias(Request $request) {
        $subcategorias = Subcategoria::orderBy('id', 'DESC')->orWhere('nombre', 'LIKE', '%'.$request->search.'%')->paginate(10);
        $data = view('partials.admin.subcategorias.getData', compact('subcategorias'))->render();
        return response()->json(['code'=>1, 'result'=>$data, 'links'=>$subcategorias->links()->render()]);
    }

    public function delete(Request $request) {
        $subcategoria = Subcategoria::find($request->subcategoria_id);
        $path = "upload_subcategories/";
        $image_path = $path.$subcategoria->imagen;

        if ($subcategoria->imagen != null && \Storage::disk('public')->exists($image_path)) {
            \Storage::disk('public')->delete($image_path);
        }

        $delete = $subcategoria->delete();

        if($delete) {
            return response()->json(['code'=>1, 'msg'=>'Subcategoria eliminada correctamente']);
        } else {
            return response()->json(['code'=>0, 'msg'=>'Error al eliminar']);
        }
    }
}
