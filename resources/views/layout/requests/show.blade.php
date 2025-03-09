@extends('layout.app')

@section('title', 'Заявка номер ' . $request->id)

@section('content')
    <div class="container">
        <h1 class="my-4">Заявка номер {{ $request->id }}</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Информация о заявке</h5>
                <p class="mt-3"><strong>ФИО покупателя:</strong> {{ $request->customer_name }}</p>
                <p><strong>Статус: </strong>{{$request->status->label()}}
                </p>
                <p><strong>Итоговая цена:</strong> {{ number_format($request->total_price, 2) }} ₽</p>
                <p><strong>Товар:</strong> {{ $request->item->name }}</p>
                <p><strong>Описание:</strong> {{ $request->description }}</p> <!-- Описание заявки -->
                <p><strong>Дата создания:</strong> {{ $request->created_at->format('d.m.Y H:i') }}</p>
                <p><strong>Дата обновления:</strong> {{ $request->updated_at->format('d.m.Y H:i') }}</p>
            </div>
        </div>

        <a href="{{ route('requests.list') }}" class="btn btn-primary mt-3">Назад</a>
    </div>
@endsection

