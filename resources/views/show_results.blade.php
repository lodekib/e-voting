@extends('layout.layout')

@section('title', "$election->title")
@section('results-tab', auth()->user()->theme == 'dark' ? 'active-dark-results' : 'active-results')

@section('views')
    <div class="w-full bg-white flex flex-col gap-5 rounded-xl px-4 sm:px-5 py-5 sm:py-6">
        <div class="flex flex-col gap-1">
            <label class="text-neutral-600 font-medium text-sm sm:text-base">Result Details</label>
            <x-breadcrumbs previousPage="Results" currentPage="Result Details" link="results" />
        </div>

        <div class="pb-6 mt-2 cursor-default grow text-neutral-700">
            <div class="w-full">
                <h1 class="mb-3 font-bold uppercase text-neutral-700 text-base md:text-xl">
                    Results for {{ $election->title }}
                </h1>

                <!-- Chart's container -->
                <div id="result-chart-canvas" class="h-96 dark:text-neutral-100 text-neutral-700">
                </div>
            </div>

            
        </div>
    </div>

    @if (env('APP_ENV') == 'production')
        <script src="{{ secure_asset('js/app.js') }}"></script>
    @else
        <script src="{{ asset('js/app.js') }}"></script>
    @endif

    <!-- Application script -->
    <script>
        const chart = new Chartisan({
            el: '#result-chart-canvas',
            url: "@chart('chart', $election->id)",
            hooks: new ChartisanHooks()
                .responsive()
                .colors(["#5850ec"])
                .beginAtZero()
                .legend({
                    position: 'bottom'
                })
                .datasets('bar'),
            loader: {
                color: '#3958AA',
                size: [30, 30],
                type: 'bar',
                textColor: '#3958AA',
                text: 'Loading election results...',
            },
            error: {
                color: 'rgb(190 18 60)',
                size: [30, 30],
                text: 'Oops! There was an error loading results...',
                textColor: 'rgb(190 18 60)',
                type: 'general',
                debug: false,
            }
        });
    </script>
@endsection
