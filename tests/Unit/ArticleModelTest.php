<?php

use App\Enums\ArticleStatus;
use App\Models\Article;

test('Try to create article model data', function () {
    $article = new Article([
        'user_id' => '1efeb2ab-2a7b-4304-a21e-3301726a7c3f',
        'title' => 'Testing',
        'meta_title' => 'Testing',
        'slug' => 'testing',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, asperiores.',
        'meta_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, asperiores.',
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A magnam cum mollitia natus commodi aperiam eos aliquam ex odit harum!',
        'status' => ArticleStatus::PENDING,
    ]);

    expect($article->user_id)->toEqual('1efeb2ab-2a7b-4304-a21e-3301726a7c3f');
    expect($article->title)->toBeString('Testing');
    expect($article->meta_title)->toBeString('Testing');
    expect($article->slug)->toBeString('testing');
    expect($article->description)->not()->toBeEmpty();
    expect($article->meta_description)->not()->toBeEmpty();
    expect($article->content)->not()->toBeEmpty();
    expect($article->status)->toEqual(ArticleStatus::PENDING);
});

test('Try to update article model data', function () {
    $latestArticle = new Article([
        'user_id' => '1efeb2ab-2a7b-4304-a21e-3301726a7c3f',
        'title' => 'Testing',
        'meta_title' => 'Testing',
        'slug' => 'testing',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, asperiores.',
        'meta_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, asperiores.',
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A magnam cum mollitia natus commodi aperiam eos aliquam ex odit harum!',
        'status' => ArticleStatus::PENDING,
    ]);

    $updatedArticle =  new Article([
        'user_id' => '23f320d6-7958-49b5-a9f1-529ae4272f94',
        'title' => 'Example',
        'meta_title' => 'Example',
        'slug' => 'example',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ipsum velit dolore dolorum harum ex quos reiciendis dolores quod consequuntur.',
        'meta_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ipsum velit dolore dolorum harum ex quos reiciendis dolores quod consequuntur.',
        'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus ipsum perferendis obcaecati similique cupiditate debitis dolore nam excepturi deleniti! Facere quasi laborum non ut ipsum?',
        'status' => ArticleStatus::PUBLISHED,
    ]);

    expect($updatedArticle->user_id)->not()->toEqual($latestArticle->user_id);
    expect($updatedArticle->title)->not()->toEqual($latestArticle->title);
    expect($updatedArticle->meta_title)->not()->toEqual($latestArticle->meta_title);
    expect($updatedArticle->slug)->not()->toEqual($latestArticle->slug);

    expect($updatedArticle->description)->not()->toEqual($latestArticle->description);
    expect($updatedArticle->description)->not()->toBeEmpty();

    expect($updatedArticle->meta_description)->not()->toEqual($latestArticle->meta_description);
    expect($updatedArticle->meta_description)->not()->toBeEmpty();

    expect($updatedArticle->content)->not()->toEqual($latestArticle->content);
    expect($updatedArticle->content)->not()->toBeEmpty();

    expect($updatedArticle->status)->not()->toEqual($latestArticle->status);
});

test('Try to remove article model data', function () {
    $article = new Article([
        'user_id' => '1efeb2ab-2a7b-4304-a21e-3301726a7c3f',
        'title' => 'Testing',
        'meta_title' => 'Testing',
        'slug' => 'testing',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, asperiores.',
        'meta_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, asperiores.',
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A magnam cum mollitia natus commodi aperiam eos aliquam ex odit harum!',
        'status' => ArticleStatus::PUBLISHED,
    ]);

    $article->user_id = '';
    $article->title = '';
    $article->meta_title = '';
    $article->slug = '';
    $article->description = '';
    $article->meta_description = '';
    $article->content = '';
    $article->status = ArticleStatus::PENDING;

    expect($article->user_id)->toBeEmpty();
    expect($article->title)->toBeEmpty();
    expect($article->meta_title)->toBeEmpty();
    expect($article->slug)->toBeEmpty();
    expect($article->description)->toBeEmpty();
    expect($article->meta_description)->toBeEmpty();
    expect($article->content)->toBeEmpty();
    expect($article->status)->not()->toEqual(ArticleStatus::PUBLISHED);
});
