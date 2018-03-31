<?php

namespace serendipia;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contactos';

    protected $fillable = ['email','nombre','contenido','telefono'];
}
