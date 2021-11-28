<?php

namespace App\Http\Controllers;

use App\Models\AdministracionModel;
use Illuminate\Http\Request;

class AdministracionController extends Controller
{

    public $datosValidate=[
        'nombre'=>'required',
        'apellido'=>'required',
        'celular'=>'required'        
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista=AdministracionModel::where('estado',1)->paginate(5);
        return view('administrador.index',compact('lista'));   
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->datosValidate);
        try{
            $nuevo=new AdministracionModel($request->input());      
            $nuevo->save();
            return redirect()->route('administracion.index')->with('msg','Dato guardado');
        }catch(exception $e){   
            return redirect()->route('administracion.index')->with('msg','fallo en la subida'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dato=AdministracionModel::find($id);
        return view('administrador.show',compact('dato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin=AdministracionModel::find($id);
        return view('administrador.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     

        $request->validate($this->datosValidate);
        try{
            $nuevo=AdministracionModel::find($id);      
            $nuevo->update($request->input());
            return redirect()->route('administracion.index')->with('msg','Dato guardado');
        }catch(exception $e){   
            return redirect()->route('administracion.index')->with('msg','fallo en la subida'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $nuevo=AdministracionModel::find($id);    
            $nuevo->estado=0;
            $nuevo->update();
            return redirect()->route('administracion.index')->with('msg','Dato eliminado');
        }catch(exception $e){   
            return redirect()->route('administracion.index')->with('msg','Fallo en la eliminacion'); 
    }
}
}
