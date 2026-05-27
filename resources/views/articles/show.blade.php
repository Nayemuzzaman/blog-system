<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $article->title }}</title>
    </head>
    <body>
        <main>
            <article>
                <h1>{{ $article->title }}</h1>

                <p>最終更新日時: {{ $article->updated_at->format('Y-m-d H:i') }}</p>

                <div>
                    {!! nl2br(e($article->body)) !!}
                </div>
            </article>

            <p>
                <a href="{{ route('articles.index') }}">記事一覧へ戻る</a>
            </p>
        </main>
    </body>
</html>
