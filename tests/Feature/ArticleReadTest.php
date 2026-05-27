<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleReadTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_displays_articles_ordered_by_latest_update(): void
    {
        $oldArticle = Article::create([
            'title' => '古い記事',
            'body' => '古い本文',
        ]);
        $oldArticle->forceFill(['updated_at' => now()->subDay()])->save();

        $newArticle = Article::create([
            'title' => '新しい記事',
            'body' => '新しい本文',
        ]);
        $newArticle->forceFill(['updated_at' => now()])->save();

        $response = $this->get('/articles');

        $response
            ->assertOk()
            ->assertSeeInOrder(['新しい記事', '古い記事']);
    }

    public function test_home_displays_article_index(): void
    {
        Article::create([
            'title' => 'トップページの記事',
            'body' => '本文',
        ]);

        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('トップページの記事');
    }

    public function test_show_displays_article_detail(): void
    {
        $article = Article::create([
            'title' => '詳細記事',
            'body' => "詳細本文\n2行目",
        ]);

        $response = $this->get(route('articles.show', $article));

        $response
            ->assertOk()
            ->assertSee('詳細記事')
            ->assertSee('詳細本文')
            ->assertSee('2行目')
            ->assertSee($article->updated_at->format('Y-m-d H:i'));
    }

    public function test_show_returns_404_for_missing_article(): void
    {
        $response = $this->get('/articles/999999');

        $response->assertNotFound();
    }
}
