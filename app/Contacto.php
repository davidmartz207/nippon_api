<?php

namespace serendipia;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contactos';

    protected $fillable = ['emisor','receptor','nombre','contenido','telefono'];
}
