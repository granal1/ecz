@php
    $menuData = [
        'Статистика' => 'statistics-page',
        'Форма' => 'form-page',
        'API' => 'api-page',
    ]; 
@endphp

<div class="header">
    <header>
        
        @auth
            <nav class="navbar">
                <div class="w3-top" style="z-index: 1000;">
                    <div class="w3-bar w3-border w3-card-4 w3-light-grey w3-center w3-flex" style="gap:8px;flex-wrap:nowrap;justify-content:center;">
                        @foreach ($menuData as $title => $route)
                            <div class="w3-col s4 l2">
                                @if ($title === $activeMenu)
                                    <a class="w3-button w3-indigo w3-text-white no-decoration w3-text-bold w3-large" href="{{ route($route) }}">{{ $title }}</a>
                                @else
                                    <a class="w3-button w3-text-indigo no-decoration w3-large" href="{{ route($route) }}">{{ $title }}</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </nav>
        @endauth

    </header>
</div>