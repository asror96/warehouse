@extends('layout.app')

@section('title', 'Редактировать заявку')

@section('content')
    <div class="container">
        <h1 class="my-4">Редактировать заявку #{{ $request->id }}</h1>

        <!-- Вывод сообщения об успехе -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Форма редактирования заявки -->
        <form action="{{ route('requests.update', $request) }}" method="POST">
            @csrf
            @method('PUT') <!-- Используем метод PUT для обновления -->

            <div class="form-group">
                <label for="customer_name">ФИО покупателя</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ old('customer_name', $request->customer_name) }}" required>
                @error('customer_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Статус</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="pending" {{ old('status', $request->status) == 'pending' ? 'selected' : '' }}>Новый</option>
                    <option value="completed" {{ old('status', $request->status) == 'completed' ? 'selected' : '' }}>Выполнен</option>
                </select>
                @error('status')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="item_id">Товар</label>
                <select name="item_id" id="item_id" class="form-control" required>
                    <option value="">Выберите товар</option>
                    @foreach($items as $item)
                        <option value="{{ $item->id }}" {{ old('item_id', $request->item_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
                @error('item_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $request->description) }}</textarea>
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Обновить заявку</button>
            <a href="{{ route('requests.list') }}" class="btn btn-secondary">Отмена</a>
        </form>
    </div>
@endsection


