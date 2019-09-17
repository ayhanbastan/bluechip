<?php
declare( strict_types = 1 );

namespace App\Http\Controllers;

use App\Models\Referans;

class ReferancesController extends Controller
{

    public function index($id)
    {
        $ref = Referans::where("musteriId","=",$id)->get();

        return json_encode($ref);

    }

}