<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\v1\Producto; //el modelo que vamos a

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productos = Producto::all(); //esto trae a todos los productos

        $response = new \stdClass();
        $response->success = true;
        $response->data = $productos;

        return response()->json($response, 200);
    }

    public function obtenerItem($id)
    {

        $producto = Producto::find($id); //esto trae a un producto

        $response = new \stdClass();
        $response->success = true;
        $response->data = $producto;

        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->save();

        $response = new \stdClass();
        $response->success = true;
        $response->data = $producto;

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $producto = Producto::find($request->id); //esto actualiza a un producto

        if ($producto) {

            $producto->codigo = $request->codigo;
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->precio = $request->precio;
            $producto->cantidad = $request->cantidad;
            $producto->save();
        }
        $response = new \stdClass();
        $response->success = true;
        $response->data = $producto;

        return response()->json($response, 200);
    }

    public function patch(Request $request)
    {
        $producto = Producto::find($request->id); //esto actualiza a un producto

        if ($producto) {

            if (isset($request->codigo))
                $producto->codigo = $request->codigo;

            if (isset($request->nombre))
                $producto->nombre = $request->nombre;

            if (isset($request->descripcion))
                $producto->descripcion = $request->descripcion;

            if (isset($request->precio))
                $producto->precio = $request->precio;

            if (isset($request->cantidad))
                $producto->cantidad = $request->cantidad;

            $producto->save();
        }
        $response = new \stdClass();
        $response->success = true;
        $response->data = $producto;

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $response = new \stdClass();
        $response->success = true;
        $response_code = 200;

        $producto = Producto::find($id);

        if ($producto) {
            $producto->delete();
            $response->success = true;
            $response_code = 200;
        } else {
            $response->error = ["El elemento ya ha sido eliminado"];
            $response->success = false;
            $response_code = 500;
        }
        return response()->json($response, $response_code);
    }
}
