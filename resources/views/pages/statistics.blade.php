@php
    $activeMenu = 'Статистика';
@endphp

@extends('main')

@section('content')
    <section class='w3-container w3-padding-64'>
        <h2 class="w3-center">Статистика посещений сайта</h2>

        <div class="w3-flex" style="gap:8px;flex-wrap:wrap;justify-content:center;">
            <div class="w3-col s11 w3-card-4 w3-margin" id="bar-chart" style="max-width:600px"></div>
            <div class="w3-col s11 w3-card-4 w3-margin" id="pie-chart" style="max-width:600px"></div>
        </div>

    </section>
@endsection

@push('scripts')
    <script>
        // Встроенные данные из контроллера
        const barData = @json($barData); 
        const pieData = @json($pieData); 
    </script>
    <script src="/js/plotly3.js"></script>
    <script src="/js/plotly-bar-chart.js"></script>
    <script src="/js/plotly-pie-chart.js"></script>
@endpush
