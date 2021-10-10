<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use Carbon\Carbon;
use Illuminate\Support\Str;

class MarcaController extends Controller
{
    public function index()
    {
        return view('admin.marcas.index');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nombre'=>'required|string|unique:marcas',
            'descripcion'=>'nullable|string',
            'imagen'=>'required|image',
        ], [
            'nombre.required'=>'El nombre de la marca es requerido.',
            'nombre.string'=>'Los valores ingresados no son admitidos.',
            'nombre.unique'=>'Ya existe una marca con este nombre.',

            'descripcion.string'=>'Los valores ingresados no son admitidos.',

            'imagen.required'=>'La imagen de la marca es requerida.',
            'imagen.image'=>'Archivos permitidos solo imagenes.',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $file = $request->file('imagen');
            $extension = $request->file('imagen')->extension();
            $file_name = time().'_'.uniqid().'.'.$extension;
            $upload = $file->storeAs("upload_brands", $file_name, 'public');

            if($upload) {
                Marca::create([
                    'nombre'=>$request->nombre,
                    'slug'=>Str::slug($request->nombre, '_'),
                    'descripcion' => $request->descripcion,
                    'imagen'=>$upload,
                    'created_at'=>Carbon::now('America/El_Salvador'),
                    'updated_at'=>Carbon::now('America/El_Salvador'),
                ]);
                return response()->json(['code'=>1, 'msg'=>'Marca registrada correctamente']);
            }
        }
    }

    public function getMarcas(Request $request) {
        $marcas = Marca::orderBy('id', 'DESC')->orWhere('nombre', 'LIKE', '%'.$request->search.'%')->paginate(10);
        $data = view('partials.admin.marcas.getData', compact('marcas'))->render();
        return response()->json(['code'=>1, 'result'=>$data, 'links'=>$marcas->links()->render()]);
    }

    public function delete(Request $request) {
        $marca = Marca::find($request->marca_id);

        if ($marca->imagen != null && \Storage::disk('public')->exists($marca->imagen)) {
            \Storage::disk('public')->delete('app', $marca->imagen);
        }

        $delete = $marca->delete();

        if($delete) {
            return response()->json(['code'=>1, 'msg'=>'Marca eliminada correctamente']);
        } else {
            return response()->json(['code'=>0, 'msg'=>'Error al eliminar']);
        }
    }
}
