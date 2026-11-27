@extends('layouts.app')
@use('App\Support\Locale', 'L')

@section('robots', 'noindex, nofollow')
@section('title', __('seo.404.title'))
@section('description', __('seo.404.description'))

@section('content')
<section class="error-page">
    <div class="container">
        <h1>404</h1>
        <h2>Упс! Страница не найдена</h2>
        <p style="margin: 20px 0;">Возможно, она была удалена или вы ошиблись в адресе.</p>
        <a href="{{ L::r('home') }}" class="btn btn--yellow">Вернуться на главную</a>
    </div>
</section>
@endsection
