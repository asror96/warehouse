@extends('layout.app')

@section('title', $item->name) <!-- Название товара будет заголовком страницы -->

@section('content')
    <div class="container">
        <h1 class="my-4">{{ $item->name }}</h1>

        <div class="row">
            <div class="col-md-6">
                <!-- Описание товара -->
                <h3>Описание:</h3>
                <p>{{ $item->description }}</p>
                <h4>Цена: {{ number_format($item->price, 2) }} ₽</h4>

                <!-- Если нужно, добавьте кнопку для добавления в корзину -->
                <a href="{{ route('items.list') }}" class="btn btn-primary mt-3">Назад</a>
            </div>
        </div>

        
    </div>
@endsection

