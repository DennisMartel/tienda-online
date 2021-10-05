<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Departamento;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CategoriaController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return view('admin.categorias.index', compact('departamentos'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nombre'=>'required|string|unique:categorias',
            'descripcion'=>'nullable|string',
            'imagen'=>'required|image',
            'departamento' => 'required|string',
        ], [
            'nombre.required'=>'El nombre de la categoria es requerido.',
            'nombre.string'=>'Los valores ingresados no son admitidos.',
            'nombre.unique'=>'Ya existe una categoria con este nombre.',

            'descripcion.string'=>'Los valores ingresados no son admitidos.',

            'departamento.required'=>'Selecciona un departamento.',
            'departamento.string'=>'Los valores ingresados no son admitidos.',

            'imagen.required'=>'La imagen de la categoria es requerida.',
            'imagen.image'=>'Archivos permitidos solo imagenes.',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $file = $request->file('imagen');
            $extension = $request->file('imagen')->extension();
            $file_name = time().'_'.uniqid().'.'.$extension;
            $upload = $file->storeAs("upload_categories", $file_name, 'public');

            if($upload) {
                Categoria::create([
                    'nombre'=>$request->nombre,
                    'slug'=>Str::slug($request->nombre, '-'),
                    'descripcion' => $request->descripcion,
                    'departamento_id'=> $request->departamento,
                    'imagen'=>$file_name,
                    'created_at'=>Carbon::now('America/El_Salvador'),
                    'updated_at'=>Carbon::now('America/El_Salvador'),
                ]);
                return response()->json(['code'=>1, 'msg'=>'Categoria registrada correctamente']);
            }
        }
    }

    public function getCategorias(Request $request) {
        $categorias = Categoria::orderBy('id', 'DESC')->orWhere('nombre', 'LIKE', '%'.$request->search.'%')->paginate(10);
        $data = view('partials.admin.categorias.getData', compact('categorias'))->render();
        return response()->json(['code'=>1, 'result'=>$data, 'links'=>$categorias->links()->render()]);
    }

    public function delete(Request $request) {
        $categoria = Categoria::find($request->categoria_id);
        $path = "upload_categories/";
        $image_path = $path.$categoria->imagen;
        if ($categoria->imagen != null && \Storage::disk('public')->exists($image_path)) {
            \Storage::disk('public')->delete($image_path);
        }

        $delete = $categoria->delete();

        if($delete) {
            return response()->json(['code'=>1, 'msg'=>'Categoria eliminada correctamente']);
        } else {
            return response()->json(['code'=>0, 'msg'=>'Error al eliminar']);
        }
    }
}
