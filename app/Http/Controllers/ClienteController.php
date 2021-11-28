<?php

namespace App\Http\Controllers;

use App\Models\ClienteModel;
use App\Models\PersonalModel;
use Illuminate\Http\Request;


class ClienteController extends Controller
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

        $listacl=ClienteModel::where('estado',1)->paginate(5);
        return view('cliente.index',compact('listacl'));   
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {//traer el modelo personal(donde esta guardado las alarmas)
        $categoria=PersonalModel::where('estado',1)->get();
        return view('cliente.create',compact('categoria'));
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
            $nuevo=new ClienteModel($request->input());      
            $nuevo->save();
            return redirect()->route('cliente.index')->with('msg','Dato guardado');
        }catch(exception $e){   
            return redirect()->route('cliente.index')->with('msg','fallo en la subida'); 
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
        $datocl=ClienteModel::find($id);        
        return view('cliente.show',compact('datocl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datocl=ClienteModel::find($id);
        $categoria=PersonalModel::where('estado',1)->get();
        return view('cliente.edit',compact('datocl','categoria'));
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
            $nuevo=new ClienteModel($request->input());      
            $nuevo->update($request->input());
            return redirect()->route('cliente.index')->with('msg','Dato guardado');
        }catch(exception $e){   
            return redirect()->route('cliente.index')->with('msg','fallo en la subida'); 
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
            $nuevo=ClienteModel::find($id);    
            $nuevo->estado=0;
            $nuevo->update();
            return redirect()->route('cliente.index')->with('msg','Dato eliminado');
        }catch(exception $e){   
            return redirect()->route('cliente.index')->with('msg','Fallo en la eliminacion'); 
    }
}
}
