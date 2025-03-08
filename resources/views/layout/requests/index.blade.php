@extends('layout.app')

@section('title', 'Список заявок')

@section('content')
    <div class="container">
        <h1 class="my-4">Список заявок</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>ФИО покупателя</th>
                <th>Статус</th>
                <th>Итоговая цена</th>
                <th>Товар</th>
                <th>Действия</th>
                <th>Дата создания</th>
            </tr>
            </thead>
            <tbody>
            @foreach($requests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->customer_name }}</td>
                    <td>{{ $request->status->label() }}</td>
                    <td>{{ number_format($request->total_price, 2) }} ₽</td>
                    <td>{{ $request->item->name }}</td>
                    <td>{{ $request->created_at->format('d.m.Y') }}</td>
                    <td>
                        <a href="{{ route('requests.show', $request) }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-eye"></i> Просмотр
                        </a>
                        <a href="{{ route('requests.edit', $request) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Редактировать
                        </a>
                        <form action="{{ route('requests.destroy', $request) }}" method="POST" style="display:inline;">
                            @csrf
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
@endsection