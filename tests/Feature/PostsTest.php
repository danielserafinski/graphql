<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;

class PostsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testQueriesPosts(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);


        $this->graphQL(/** @lang GraphQL */ '{
            posts{
                paginatorInfo {
                  currentPage
                  total
                }
                data{
                  id
                  title
                }
                
              }
            }
        ')->assertJson([
            'data' =>[
                'posts' => [
                    'paginatorInfo' => [
                        'currentPage' => 1,
                        'total' => 1
                    ],
                    'data' => [
                        [
                            'id' => $post->id,
                            'title' => $post->title
                        ]
                    ]
                ]
            ]
        ]);
    }
}
