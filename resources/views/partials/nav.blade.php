@php
    $menuData = [
        'Статистика' => '#',
        'Форма + JS' => '#',
        'API' => '#',
    ]; 
@endphp

{{-- <div class="header {{ $headerClass }}"> --}}
<div class="header">
    <header>

        <nav class="navbar">
            <div class="w3-top" style="z-index: 1000;">
                <div class="w3-bar w3-border w3-card-4 w3-light-grey w3-padding w3-center w3-flex" style="gap:8px;flex-wrap:wrap;justify-content:center;">
                    @foreach ($menuData as $title => $route)
                        <div class="w3-col s3 l2">
                            @if ($title === $activeMenu)
                                {{-- <a class="w3-button w3-padding-small w3-border w3-border-white w3-round-xxlarge w3-text-white no-decoration w3-text-bold w3-large" href="{{ route($route) }}">{{ $title }}</a> --}}
                                <a class="w3-button w3-padding-small w3-round-xxlarge w3-indigo w3-text-white no-decoration w3-text-bold w3-large" href="#">{{ $title }}</a>
                            @else
                                {{-- <a class="w3-button w3-padding-small w3-round-xxlarge w3-text-white no-decoration w3-large" href="{{ route($route) }}">{{ $title }}</a> --}}
                                <a class="w3-button w3-padding-small w3-round-xxlarge w3-text-indigo no-decoration w3-large" href="#">{{ $title }}</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </nav>

    </header>
</div>