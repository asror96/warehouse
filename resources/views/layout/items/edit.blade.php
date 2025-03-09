@extends('layout.app')

@section('title', 'Редактировать товар') <!-- Устанавливаем заголовок страницы -->

@section('content')
    <div class="container">
        <h1 class="my-4">Редактировать товар</h1>

        <!-- Вывод сообщения об успехе -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Форма редактирования товара -->
        <form action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Используем метод PUT для обновления -->

            <div class="form-group">
                <label for="name">Название товара</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $item->name) }}" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Категория</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Выберите категорию</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $item->description) }}</textarea>
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price', $item->price) }}" required>
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Обновить товар</button>
            <a href="{{ route('items.list') }}" class="btn btn-secondary">Отмена</a>
        </form>
    </div>
@endsection




