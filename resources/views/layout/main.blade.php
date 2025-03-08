@extends('layout.app')

@section('title', 'Главная - Логистическая компания')

@section('content')
    <div class="container text-center">
        <h1 class="my-4">Добро пожаловать в нашу логистическую компанию</h1>
        <p class="lead">Мы предоставляем надежные и эффективные решения для доставки грузов по всему миру.</p>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Грузоперевозки</h5>
                        <p class="card-text">Мы обеспечиваем транспортировку грузов любой сложности и масштаба.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Складские услуги</h5>
                        <p class="card-text">Надежное хранение товаров на наших современных складах.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Международные перевозки</h5>
                        <p class="card-text">Мы работаем с партнерами по всему миру для эффективной логистики.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
