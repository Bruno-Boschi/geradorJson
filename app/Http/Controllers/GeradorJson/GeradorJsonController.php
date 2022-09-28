<?php

namespace App\Http\Controllers\GeradorJson;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\Cast\Object_;
use stdClass;

class GeradorJsonController extends Controller
{
    public function getIndex()
    {
        return view('index');
    }

    public function postJson(Request $request)
    {
        // $json = [
        //     'contact_email' = $request['email'];
        //     'contact_address' = $request['endereco'];
        //     'version' = "1.0";
        //     'sellers'= $request['sellers'];
        // ];
        // header('Content-Type: application/json');
        // header('Content-Disposition: attachment; filename="materias' . '.json";');
        \dd($request);
        $json = new stdClass();
        $json->contact_email = $request->email;
        $json->contact_address = $request->endereco;
        $json->version = "1.0";
        $json->sellers = $request->sellers;

        return redirect('gerador-json');;
    }
}
