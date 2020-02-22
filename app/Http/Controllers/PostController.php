<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
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
        $post = Post::find($id);

        echo "<strong>#{$post->id}</strong><br>";
        echo "<strong>Título: </strong>{$post->title}<br>";
        echo "<strong>Subtítulo: </strong>{$post->subtitle}<br>";
        echo "<strong>Conteúdo: </strong>{$post->description}<br><hr>";

        $postAuthor = $post->user()->get()->first();

        echo "<h1>Dados do Usuário</h1>";
        echo "Nome: <strong>{$postAuthor->name}</strong><br>";
        echo "E-mail: <strong>{$postAuthor->email}</strong><br>";

        $categories = $post->categories()->get();

        if ($categories) {
            echo "<h1>Categorias do Artigo</h1>";
            foreach ($categories as $category) {
                echo "Categoria: #{$category->id} - {$category->name}<br>";
            }
        }

//        $post->categories()->attach([10]);
//        $post->categories()->detach([3]);
//        $post->categories()->sync([5, 7, 9]);
//        $post->categories()->syncWithoutDetaching([5, 7, 10, 1]);

//        $post->comments()->create([
//            'content' => 'Teste de comentário 12345'
//        ]);

        $comments = $post->comments()->get();

        if ($comments) {
            echo "<h1>Comentários</h1>";
            foreach($comments as $comment){
                echo "Comentário: #{$comment->id} - {$comment->content}<br>";
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
