<?php

namespace App\Http\Controllers;

use App\Address;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        echo "<h1>Dados do Usuário</h1>";
        echo "Nome: <strong>{$user->name}</strong><br>";
        echo "E-mail: <strong>{$user->email}</strong><br>";

        $address = $user->userAddress()->get()->first();

        echo "<h1>Endereço de Entrega</h1>";
        echo "Endereço: <strong>{$address->address}, {$address->number}</strong><br>";
        echo "Complemento: <strong>{$address->complement}</strong> - CEP: <strong>{$address->zipcode}</strong><br>";
        echo "Cidade/Estado: <strong>{$address->city}/{$address->state}</strong><br><hr>";

//        $newAddress = new Address([
//            'address' => 'Rua dos Bobos',
//            'number' => '0',
//            'complement' => 'Apto: 123',
//            'zipcode' => '01234-567',
//            'city' => 'São Paulo',
//            'state' => 'SP'
//        ]);

//        $newAddress = new Address();
//        $newAddress->address = 'Rua dos Bobocas';
//        $newAddress->number = '10';
//        $newAddress->complement = 'Casa';
//        $newAddress->zipcode = '09876-543';
//        $newAddress->city = 'São Caetano do Sul';
//        $newAddress->state = 'SP';
//
//        $user->userAddress()->save($newAddress);

        $posts = $user->posts()->orderBy('id', 'DESC')->get();
        if ($posts) {
            echo "<h1>Lista de Artigos</h1>";
            foreach($posts as $post){
                echo "<strong>#{$post->id}</strong><br>";
                echo "<strong>Título: </strong>{$post->title}<br>";
                echo "<strong>Subtítulo: </strong>{$post->subtitle}<br>";
                echo "<strong>Conteúdo: </strong>{$post->description}<br><hr>";
            }
        }

//        $comments = $user->commentsOnMyPost()->get();
//
//        if($comments){
//            echo "<h1>Comentários nos meus artigos</h1>";
//            foreach($comments as $comment){
//                echo "Post: #{$comment->post} - Usuário: #{$comment->user} - {$comment->content}<br>";
//            }
//        }

        $user->comments()->create([
            'content' => 'Teste de comentário no modelo de usuário'
        ]);

        $comments = $user->comments()->get();

        if($comments){
            echo "<h1>Comentários</h1>";
            foreach($comments as $comment){
                echo "Comentário #{$comment->id} - {$comment->content}<br>";
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
