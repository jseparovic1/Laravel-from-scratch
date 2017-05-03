<?php

namespace Tests\Feature;

use App\Post;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $first = factory(Post::class)->create([
            'created_at' => Carbon::now()->subMonth()
        ]);

        $second = factory(Post::class)->create();


        $posts = Post::archives()->toArray();


        $this->assertEquals([
            [
                "month" => $first->created_at->formatLocalized('%B'),
                "year" => $first->created_at->year,
                "published" => 1
            ],
            [
                "month" => $second->created_at->formatLocalized('%B'),
                "year" => $second->created_at->year,
                "published" => 1
            ]
        ],$posts);
    }
}
