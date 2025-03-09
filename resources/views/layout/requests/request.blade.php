@extends('layout.app')

@section('title', 'Список заявок') <!-- Устанавливаем заголовок страницы -->

@section('content')
    <div class="container">
        <h1 class="my-4">Список заявок</h1>

        <!-- Вывод сообщения об успехе -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Кнопка "Создать товар" -->
        <div class="mb-4">
            <a href="{{ route('items.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Создать товар
            </a>
        </div>

        <!-- Таблица со списком товаров -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Цена (₽)</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
