<?php

namespace App\Http\Controllers;

use App\Models\login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos=login::all();
        return view("index",compact("datos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $login=new login();
        $login->ID=$request->post("ID");
        $login->usuario=$request->post("usuario");
        $login->contraseña=$request->post("contraseña");
        $login->save();

        return redirect()->route("login.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $login=login::find($id);
        return view("editar",compact("login"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $login=login::find($id);
        return view("editar",compact("login"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $login=login::find($id);
        $login->usuario=$request->post("usuario");
        $login->contraseña=$request->post("contraseña");
        $login->save();

        return redirect()->route("login.index")->with("exitoso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        /** Otra Alternativa
         * login::find($id)->delete(); o login::find($id)->delete($id);
         * login::find($id)->destroy($id);
         */
        $login=login::find($id);
        $login->destroy($id);

        return redirect()->route("login.index")->with("exitoso");
    }
}
;