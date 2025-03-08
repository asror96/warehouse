@extends('layout.app')

@section('title', 'Список товаров')

@section('content')
    <div class="container">
        <h1 class="my-4">Список товаров</h1>

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
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ number_format($item->price, 2) }}</td>
                    <td>
                        <!-- Кнопка для открытия модального окна -->
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createRequestModal" data-item-id="{{ $item->id }}" data-item-name="{{ $item->name }}" data-item-price="{{ $item->price }}">
                            <i class="fas fa-edit"></i> Создать заявку
                        </button>
                        <a href="{{ route('items.show', $item) }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-eye"></i> Просмотр
                        </a>
                        <!-- Кнопки действий (редактировать, удалить и т.д.) -->
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i> Редактировать
                        </a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены?')">
                                <i class="fas fa-trash"></i> Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Модальное окно для создания заявки -->
    <div class="modal fade" id="createRequestModal" tabindex="-1" aria-labelledby="createRequestModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createRequestModal" data-item-id="{{ $item->id }}" data-item-name="{{ $item->name }}" data-item-price="{{ $item->price }}" data-item-description="{{ $item->description }}">
                        <i class="fas fa-edit"></i> Создать заявку
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createRequestForm" action="{{ route('requests.store') }}" method="POST">
                        @csrf
                        <!-- Скрытые поля для передачи данных товара -->
                        <input type="hidden" name="item_id" id="modalItemId">
                        <input type="hidden" name="total_price" id="modalItemPrice">

                        <div class="form-group">
                            <label for="customer_name">ФИО покупателя</label>
                            <input type="text" name="customer_name" id="customer_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="item_name">Товар</label>
                            <input type="text" id="item_name" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label for="item_price">Цена товара</label>
                            <input type="text" id="item_price" class="form-control" disabled>
                        </div>

                        <!-- Новое поле: Описание -->
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="createRequestForm" class="btn btn-primary">Создать заявку</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('createRequestModal');
        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Кнопка, которая открыла модальное окно
            const itemId = button.getAttribute('data-item-id');
            const itemName = button.getAttribute('data-item-name');
            const itemPrice = button.getAttribute('data-item-price');
            const itemDescription = button.getAttribute('data-item-description'); // Новое поле

            // Заполняем поля в модальном окне
            document.getElementById('modalItemId').value = itemId;
            document.getElementById('modalItemPrice').value = itemPrice;
            document.getElementById('item_name').value = itemName;
            document.getElementById('item_price').value = itemPrice;
            document.getElementById('description').value = itemDescription; // Заполняем описание
        });
    });
</script>


