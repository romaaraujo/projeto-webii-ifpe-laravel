<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class fileController extends Controller
{
    private $uuid;

    public function __construct()
    {
         $this->uuid = uniqid(time());
    }

    public function criar(Request $request)
    {
        if(isset($request->conteudo)){
            Storage::put($this->uuid.'.txt', $request->conteudo);
            return json_encode(array(
                'sucesso'=> true,
                'id'=> $this->uuid,
                'conteudo'=> $request->conteudo
            ));
        } else {
            return json_encode(array(
                'sucesso' => false
            ));
        }
    }

    public function abrir($id) {
        if(isset($id)){
            if(Storage::exists($id.'.txt')) {
                return json_encode(array(
                    'sucesso' => true,
                    'conteudo' => Storage::get($id.'.txt')
                ));
            } else {
                return json_encode(array(
                    'sucesso' => false
                ));
            }
        }
        return json_encode(array(
            'sucesso' => false
        ));
    }

    public function deletar($id) {
        if(isset($id)){
            if(Storage::exists($id.'.txt')) {
                Storage::delete($id.'.txt');
                return json_encode(array(
                    'sucesso' => true,
                    'id' => $id
                ));
            } else {
                return json_encode(array(
                    'sucesso' => false
                ));
            }
        }
        return json_encode(array(
            'sucesso' => false
        ));
    }

    public function atualizar(Request $request) {
        if(isset($request->id)){
            if(Storage::exists($request->id.'.txt')) {
                Storage::put($request->id.'.txt', $request->conteudo);
                return json_encode(array(
                    'sucesso' => true,
                    'id' => $request->id,
                    'novo_conteudo' => $request->conteudo
                ));
            } else {
                return json_encode(array(
                    'sucesso' => false
                ));
            }
        }
        return json_encode(array(
            'sucesso' => false
        ));
    }

}
