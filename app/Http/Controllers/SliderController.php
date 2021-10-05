<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SliderController extends Controller
{
    public function index()
    {
        return view('admin.sliders.index');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nombre'=>'required|string|unique:sliders',
            // 'enlace' => 'required|string',
            'descripcion'=>'nullable|string',
            'imagen'=>'required|image',
        ], [
            'nombre.required'=>'El nombre del carousel es requerido.',
            'nombre.string'=>'Los valores ingresados no son admitidos.',
            'nombre.unique'=>'Ya existe un carousel con este nombre.',

            // 'enlace.required'=>'El enlace del carousel es requerido.',
            // 'enlace.string'=>'Los valores ingresados no son admitidos.',

            'descripcion.string'=>'Los valores ingresados no son admitidos.',

            'imagen.required'=>'La imagen del carousel es requerida.',
            'imagen.image'=>'Archivos permitidos solo imagenes.',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $file = $request->file('imagen');
            $extension = $request->file('imagen')->extension();
            $file_name = time().'_'.uniqid().'.'.$extension;
            $upload = $file->storeAs("upload_sliders", $file_name, 'public');

            if($upload) {
                Slider::create([
                    'nombre'=>$request->nombre,
                    'slug'=>Str::slug($request->nombre, '-'),
                    'descripcion' => $request->descripcion,
                    'imagen'=>$upload,
                    'created_at'=>Carbon::now('America/El_Salvador'),
                    'updated_at'=>Carbon::now('America/El_Salvador'),
                ]);
                return response()->json(['code'=>1, 'msg'=>'Carousel registrado correctamente']);
            }
        }
    }

    public function getSliders(Request $request) {
        $sliders = Slider::orderBy('id', 'DESC')->orWhere('nombre', 'LIKE', '%'.$request->search.'%')->paginate(10);
        $data = view('partials.admin.sliders.getData', compact('sliders'))->render();
        return response()->json(['code'=>1, 'result'=>$data, 'links'=>$sliders->links()->render()]);
    }

    public function delete(Request $request) {
        $slider = Slider::find($request->slider_id);

        if ($slider->imagen != null && \Storage::disk('public')->exists($slider->imagen)) {
            \Storage::disk('public')->delete($slider->imagen);
        }

        $delete = $slider->delete();

        if($delete) {
            return response()->json(['code'=>1, 'msg'=>'Carousel eliminado correctamente']);
        } else {
            return response()->json(['code'=>0, 'msg'=>'Error al eliminar']);
        }
    }
}
