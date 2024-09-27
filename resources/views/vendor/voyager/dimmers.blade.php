@section('css')
    <link href="/css/fontawesome-free-5/css/all.css" rel="stylesheet">
    <link href="/css/widgets.css" rel="stylesheet">
@endsection
@php
    $dimmerGroups = Voyager::dimmers();
@endphp

@forelse($dimmerGroups as $dimmerGroup)
    @php
        $count = $dimmerGroup->count();
        $classes = [
            'col-xs-12',
            'col-sm-'.($count >= 2 ? '6' : '12'),
            'col-md-'.($count >= 3 ? '4' : ($count >= 2 ? '6' : '12')),
        ];
        $class = implode(' ', $classes);
        $prefix = "<div class='{$class}'>";
        $surfix = '</div>';
    @endphp
    @if ($dimmerGroup->any())

        <div class="container-fluid">
{{--            <h2 class="mb-5 text-black">Dashboard</h2>--}}
            <div class="header-body">
                <div class="row">
                    {!! $prefix.$dimmerGroup->setSeparator($surfix.$prefix)->display().$surfix !!}
                </div>
            </div>
        </div>
        <!-- Page content -->
        </div>
    @endif

@empty

@endforelse
