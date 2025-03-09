@extends('layout.app') {{-- Используйте ваш основной layout --}}

@section('content')
    <div class="container">
        <h1>Создать новый товар</h1>
        <form action="{{ route('items.store') }}" method="POST">
            @csrf {{-- CSRF-токен для защиты формы --}}

            <div class="form-group">
                <label for="name">Название товара</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Категория</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Выберите категорию</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price') }}" required>
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Создать товар</button>
        </form>
    </div>
@endsection

<!-- Подключение Bootstrap JS (если нужно) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
