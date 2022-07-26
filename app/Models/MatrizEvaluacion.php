<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrizEvaluacion extends Model
{
    use HasFactory;
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'matriz_evaluacion';
    protected $fillable = ['id_proyecto'];



    public function AgregarMatriz($nombre, $largo, $objeto, $request)
    {
        for ($i = 1; $i <= $largo; $i++) {
            if (isset($request[$nombre . "_revision_" . $i])) {
                $objeto[$nombre . "_revision_" . $i] = $request[$nombre . "_revision_" . $i];
            }
            if (isset($request[$nombre . "_" . $i])) {
                $objeto[$nombre . "_criterio_" . $i] = $request[$nombre . "_" . $i];

            }
            if (isset($request["logro_" . $nombre . "_" . $i])) {
                $objeto[$nombre . "_logro_" . $i] = $request["logro_" . $nombre . "_" . $i];

            }
            
        }
        $objeto->save();

    }
}
