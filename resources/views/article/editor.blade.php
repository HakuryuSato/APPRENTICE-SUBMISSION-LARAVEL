<x-app-layout :title="'Create/Edit'">
    <div class="editor-page">
        <div class="container page">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-xs-12">
                    <!-- エラーメッセージの表示 -->
                    @if ($errors->any())
                        <ul class="error-messages">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <!-- 記事の作成/編集フォーム -->
                    <form method="POST" action="{{ isset($article) ? route('article.update', ['slug' => $article->slug]) : route('article.store') }}">
                        @csrf
                        @if(isset($article))
                            @method('PUT')
                        @endif
                        <fieldset>
                            <fieldset class="form-group">
                                <input type="text" name="title" class="form-control form-control-lg" placeholder="Article Title" value="{{ old('title', $article->title ?? '') }}" />
                            </fieldset>
                            <fieldset class="form-group">
                                <input type="text" name="description" class="form-control" placeholder="What's this article about?" value="{{ old('description', $article->description ?? '') }}" />
                            </fieldset>
                            <fieldset class="form-group">
                                <textarea class="form-control" name="body" rows="8" placeholder="Write your article (in markdown)">{{ old('body', $article->body ?? '') }}</textarea>
                            </fieldset>
                            <fieldset class="form-group">
                                <input type="text" name="tags" class="form-control" placeholder="Enter tags" value="{{ old('tags', $article->tags ?? '') }}" />
                                <div class="tag-list">
                                    @if(isset($article) && $article->tags)
                                        @foreach(explode(',', $article->tags) as $tag)
                                            <span class="tag-default tag-pill">
                                                <i class="ion-close-round"></i> {{ $tag }}
                                            </span>
                                        @endforeach
                                    @endif
                                </div>
                            </fieldset>
                            <button class="btn btn-lg pull-xs-right btn-primary" type="submit">
                                {{ isset($article) ? 'Update Article' : 'Publish Article' }}
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
