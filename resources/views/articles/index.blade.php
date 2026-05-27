<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>記事一覧</title>
    </head>
    <body>
        <main>
            <h1>記事一覧</h1>

            @forelse ($articles as $article)
                <article>
                    <h2>
                        <a href="{{ route('articles.show', $article) }}">
                            {{ $article->title }}
                        </a>
                    </h2>
                </article>
            @empty
                <p>記事がありません。</p>
            @endforelse
        </main>
    </body>
</html>
