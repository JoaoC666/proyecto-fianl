<?php

namespace App\Http\Controllers;

use App\Models\PersonalModel;
use Illuminate\Http\Request;


//aqui trabajamos la alarma y essta informacion tengoque llevarle al cliente
class PersonalController extends Controller
{ public $datosValidate=[
    'alarma'=>'required',
    'lugar'=>'required'    
];
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    $listaLP=PersonalModel::where('estado',1)->paginate(5);
    return view('personal.index',compact('listaLP'));   

      
 }

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    return view('personal.create');
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
        $nuevo=new PersonalModel($request->input());      
        $nuevo->save();
        return redirect()->route('personal.index')->with('msg','Dato guardado');
    }catch(exception $e){   
        return redirect()->route('personal.index')->with('msg','fallo en la subida'); 
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
    $datopl=PersonalModel::find($id);
    return view('personal.show',compact('datopl'));
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $edper=PersonalModel::find($id);
    return view('personal.edit',compact('edper'));
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
        $nuevo=PersonalModel::find($id);      
        $nuevo->update($request->input());
        return redirect()->route('personal.index')->with('msg','Dato guardado');
    }catch(exception $e){   
        return redirect()->route('personal.index')->with('msg','fallo en la subida'); 
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
        $nuevo=PersonalModel::find($id);    
        $nuevo->estado=0;
        $nuevo->update();
        return redirect()->route('personal.index')->with('msg','Dato eliminado');
    }catch(exception $e){   
        return redirect()->route('personal.index')->with('msg','Fallo en la eliminacion'); 
}
}
}
