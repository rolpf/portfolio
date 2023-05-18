@if(isset($field->service[0]) && $service = get_term($field->service[0], 'services'))
    @php
        $color = get_field('color', $service)
    @endphp
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 my-12 {{ isset($block['align']) ? sprintf('align%s', $block['align']) : null }}">
        <div class="flex flex-col justify-between w-full h-full gap-8">
            <h2 @class([
                    "relative z-10 font-bold text-3xl w-fit",
                    "ml-auto" => !$field->projects_right,
                ])>
                <span @class(["absolute  -translate-y-4 top-0 w-24 h-24 rounded-full opacity-20 z-0", "left-0 -translate-x-1/2" => $field->projects_right, "right-0 translate-x-1/2" => !$field->projects_right])
                      style="background-color: {{ $color }}"></span>
                <span class="relative z-10">{{ $service->name }}</span>
            </h2>
            <div @class(["text-right" => !$field->projects_right])>
                {!! $innerBlocks !!}
            </div>
            <div>
                <a style="background-color: {{ $color }}" class="w-full py-2 text-center text-white block rounded-full"
                   href="{{ get_post_type_archive_link('projects').'?service='.$service->slug }}">{{ __('Voir les autres projets', THEME_TD) }}</a>
            </div>
        </div>
        <div @class(["h-full", "lg:order-first" => !$field->projects_right])>
            @if(count($field->projects) > 1)
                <x-basic-slider>
                    @foreach($field->projects as $project)
                        @if(is_admin() && $loop->index > 0)
                            @break(1)
                        @endif
                        <div class="swiper-slide">
                            <a class="w-full h-full relative" href="{{ $project->guid }}">
                                <div class="bg-gradient-to-t from-black/70 p-2 lg:p-8 absolute top-0 left-0 flex flex-col justify-end gap-2 text-white w-full h-full z-10">
                                    <p>{{ $project->post_title }}</p>
                                    <p class="line-clamp-1 lg:line-clamp-3">{{ $project->post_excerpt }}</p>
                                    @if($skills = get_the_terms($project, 'skills'))
                                        <div class="flex items-center gap-2 w-fit">
                                            @foreach($skills as $skill)
                                                <p class="inline-block bg-white text-black rounded-full px-2 py-1 text-xs break-normal">{{ !is_array($skill) ? $skill->name : '' }}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                {!! get_the_post_thumbnail($project, 'full', ['class' => 'w-full h-full object-cover relative z-0']) !!}
                            </a>
                        </div>
                    @endforeach
                </x-basic-slider>
            @else
                @php
                    $project = $field->projects[0] ?? null;
                @endphp
                @if($project)
                    <a class="w-full h-full relative" href="{{ $project->guid }}">
                        <div class="bg-gradient-to-t from-black/70 p-8 absolute top-0 left-0 flex flex-col justify-end gap-2 text-white w-full h-full z-10">
                            <p>{{ $project->post_title }}</p>
                            <p class="line-clamp-3">{{ $project->post_excerpt }}</p>
                            @if($skills = get_the_terms($project, 'skills'))
                                <div class="flex items-center gap-2">
                                    @foreach($skills as $skill)
                                        <span class="inline-block bg-white text-black rounded-full px-2 py-1 text-xs">{{ !is_array($skill) ? $skill->name : '' }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        {!! get_the_post_thumbnail($project, 'full', ['class' => 'w-full h-full object-cover relative z-0']) !!}
                    </a>
                @endif
            @endif
        </div>
    </div>
@endif
