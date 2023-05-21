<div x-data="ListingProjects">
    @php
        $services = get_terms([
            'taxonomy' => 'services',
            'hide_empty' => true,
        ]);
    @endphp
    <div class="w-full items-center">
        <div class="flex flex-col lg:flex-row items-center gap-8 my-8">
            @foreach($services as $service)
                <div @class(["px-4 rounded-full text-white w-3/5 text-center lg:w-fit cursor-pointer", "opacity-50" => $filter !== 'all' && $filter !== $service->slug])
                     wire:click="$set('filter', '{{ $service->slug === $filter ? 'all' : $service->slug }}')"
                     style="background-color: {{ get_field('color', $service) }}">
                    {{ $service->name }}
                </div>
            @endforeach
            <div wire:loading>
                loading...
            </div>
        </div>
    </div>
    @forelse($projects as $project)
        @php
            $service = get_the_terms($project->ID, 'services')[0] ?? null;
            $client = get_the_terms($project->ID, 'clients')[0] ?? null;
            $skills = get_the_terms($project->ID, 'skills');
            $image = get_the_post_thumbnail($project->ID, 'full', ['class' => 'w-full h-full object-cover object-center']);
            $color = get_field('color', $service);
        @endphp
        <div class="h-fit w-full mb-4">
            <div @click="toggle({{ $project->ID }})" class="w-full  px-4 grid grid-cols-2 gap-8 lg:flex items-center justify-between h-20"
                 style="background-color: {{ $color }}">
                <div class="py-2">
                    <p class="text-white text-lg lg:text-2xl font-bold line-clamp-1 lg:line-clamp-3">{{ $project->post_title }}</p>
                    <p class="text-white text-xs line-clamp-1">
                        @foreach($skills as $skill)
                            <span>{{ $skill->name }} @if(!$loop->last)
                                    |
                                @endif</span>
                        @endforeach
                    </p>
                </div>

                <div class="w-1/2 h-full flex items-center gap-12">
                    @if($image)
                        <div class="lg:w-full aspect-[1/1] h-full opacity-50">
                            {!! $image !!}
                        </div>
                    @endif
                    <svg class="w-8 h-12" viewBox="0 0 38 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.9999 21.9168C18.5554 21.9168 18.1388 21.8468 17.7499 21.7068C17.361 21.569 16.9999 21.3334 16.6666 21.0001L1.33322 5.66678C0.72211 5.05567 0.403222 4.29122 0.376556 3.37345C0.347667 2.45789 0.666555 1.66678 1.33322 1.00011C1.94433 0.389002 2.72211 0.0834461 3.66656 0.0834461C4.611 0.0834461 5.38878 0.389002 5.99989 1.00011L18.9999 13.9168L31.9999 1.00011C32.611 0.389002 33.3743 0.0690016 34.2899 0.0401127C35.2077 0.013446 35.9999 0.333446 36.6666 1.00011C37.2777 1.61122 37.5832 2.389 37.5832 3.33345C37.5832 4.27789 37.2777 5.05567 36.6666 5.66678L21.3332 21.0001C20.9999 21.3334 20.6388 21.569 20.2499 21.7068C19.861 21.8468 19.4443 21.9168 18.9999 21.9168ZM18.9999 41.9168C18.5554 41.9168 18.1388 41.8468 17.7499 41.7068C17.361 41.569 16.9999 41.3334 16.6666 41.0001L1.33322 25.6668C0.72211 25.0557 0.403222 24.2912 0.376556 23.3734C0.347667 22.4579 0.666555 21.6668 1.33322 21.0001C1.94433 20.389 2.72211 20.0834 3.66656 20.0834C4.611 20.0834 5.38878 20.389 5.99989 21.0001L18.9999 33.9168L31.9999 21.0001C32.611 20.389 33.3743 20.069 34.2899 20.0401C35.2077 20.0134 35.9999 20.3334 36.6666 21.0001C37.2777 21.6112 37.5832 22.389 37.5832 23.3334C37.5832 24.2779 37.2777 25.0557 36.6666 25.6668L21.3332 41.0001C20.9999 41.3334 20.6388 41.569 20.2499 41.7068C19.861 41.8468 19.4443 41.9168 18.9999 41.9168Z"
                              fill="white"/>
                    </svg>
                </div>
            </div>
            <div class="max-h-0 h-fit  w-full overflow-hidden duration-500"
                 :class="{'max-h-0': selected !== {{ $project->ID }}, 'max-h-[100rem]': selected === {{ $project->ID }} }">
                <div class="p-4 grid grid-cols-2 w-full">
                    <div class="flex flex-col justify-center gap-8">
                        <div>
                            {{ $project->post_excerpt }}
                        </div>
                        <a style="background-color: {{ $color }}" class="w-fit px-4 py-2 text-white" href="{{ html_entity_decode($project->guid) }}">{{ __("En savoir plus") }}</a>
                    </div>
                    <div class="pr-20">
                        @if($image)
                            {!! $image !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>

    @empty

    @endforelse
    <div class="px-8 lg:px-0 mb-8">
        {!! $projects->links() !!}
    </div>

</div>