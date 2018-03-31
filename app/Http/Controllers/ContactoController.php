<?php

namespace serendipia\Http\Controllers;

use Illuminate\Http\Request;
use serendipia\Contacto;
use Illuminate\Support\Facades\Mail;
use serendipia\Mail\Contact;



class ContactoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {

         //reglas de Validación para el request
         $rules = [
             'nombre'    =>'required',
             'emisor'    =>'required|string|email',
             'receptor'  =>'required|string|email',
             'telefono'  =>'required|string',
             'contenido' =>'required|string',
         ];

         // Ejecutamos el validador, en caso de que falle devolvemos la respuesta o respuestas directamente
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return [
                 'success' => false,
                 'message'  => $validator->errors()->all()
             ];
         }


         $contacto = New Contacto();


         $contacto->nombre    = $request->get('nombre');
         $contacto->emisor    = $request->get('emisor');
         $contacto->receptor  = $request->get('receptor');
         $contacto->contenido = $request->get('contenido');
         $contacto->telefono  = $request->get('telefono');

         $contacto->save();
         //enviamos el email
         Mail::to($contacto->receptor)->send(new Contact($contacto->emisor,$contacto->nombre,$contacto->telefono, $contacto->contenido));

         return response()->json(["success"=>true],200);

     }


}
