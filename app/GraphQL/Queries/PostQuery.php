<?php


namespace App\GraphQL\Queries;

use App\Models\Post;

class PostQuery
{
    public function byActive($root, array $args){
        return Post::query()
            ->where('is_active', $args['active'])
            ->get();
    }
}
