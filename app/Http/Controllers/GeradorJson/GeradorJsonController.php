<?php

namespace App\Http\Controllers\GeradorJson;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\Cast\Object_;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use stdClass;

class GeradorJsonController extends Controller
{
    public function getIndex()
    {
        return view('index');
    }

    public function getJson(Request $request)
    {
        $form = json_decode($request->json);
        $form->version = "1.0";

        foreach ($form->sellers as $seller) {
            $seller->seller_id = Uuid::uuid4()->toString();
            $seller->seller_type = 'PUBLISHER';
        }

        $formJson = json_encode($form);


        return $formJson;
    }
}
