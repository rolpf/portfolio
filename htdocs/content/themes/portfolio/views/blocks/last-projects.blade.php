@isset($projects)
    <div class="{{ isset($block['align']) ? sprintf('align%s', $block['align']) : null }}">
        <div class="last-projects-slider overflow-x-hidden py-16">
            <div class="swiper-wrapper">
                @foreach($projects as $project)
                    <div class="swiper-slide w-[300px!important] h-[300px!important] bg-center bg-cover">
                        <a class="w-full h-full" href="{{ $project->guid }}">
                            {!! get_the_post_thumbnail($project, 'full', ['class' => 'w-full h-full object-cover']) !!}
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
@endisset