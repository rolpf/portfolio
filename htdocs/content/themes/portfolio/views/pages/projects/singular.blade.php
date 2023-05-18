@extends('layouts.main')

@section('content')
    <div class="entry-content px-4 lg:px-0">
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:mt-12 lg:gap-24">
            <div class="w-full order-last lg:order-none p-4">
                {!! get_the_post_thumbnail($project, 'full', ['class' => 'w-full h-auto']) !!}
            </div>
            <div class="flex flex-col justify-between py-8">
                <div>
                    <h1 class="text-3xl font-bold relative">
                        @if(isset($service) && $color = get_field('color', $service))
                            <span class="absolute left-0 top-0 -translate-x-1/2 w-24 h-24 rounded-full opacity-20 -z-10"
                                  style="background-color: {{ $color }}"></span>
                        @endif
                        <span class="relative z-10">
                            {{ $project->post_title }}
                        </span>

                    </h1>
                    @if($client = wp_get_post_terms($project->ID, 'clients', ['fields' => 'names']))
                        <p class="my-2">{{ isset($client[0]) ? $client[0] : null }}</p>
                    @endif
                </div>

                <div class="my-4">
                    {!! $project->post_excerpt !!}
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    @if($skills = get_the_terms($project, 'skills'))
                        @foreach($skills as $skill)
                            <p class="inline-block bg-white text-black rounded-full pr-2 py-1 text-xs break-normal lg:px-4">{{ !is_array($skill) ? $skill->name : '' }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="my-12">
            {!! Loop::content() !!}
        </div>
    </div>
@endsection