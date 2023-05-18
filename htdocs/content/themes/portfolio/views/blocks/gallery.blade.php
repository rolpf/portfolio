@if(count($field->gallery) > 0)
    <div class="relative lg:w-3/5 mx-auto"
         x-data="PhotoGallery( '{{ wp_get_attachment_image_url($field->gallery[0]["ID"], 'medium_large') }}' )">
        <div>
            <template x-if="selected !== 'init'">
                <img class="w-full h-full object-contain" :src="selected">
            </template>
        </div>
        <div class="flex items-center justify-between my-2">
            <div class="selector-prev w-8 lg:w-10 aspect-[1/1] p-2">
                <x-chevron orientation="left" class="w-full h-full"/>
            </div>
            <div class="slider-selector w-9/12 overflow-x-hidden">
                <div class="swiper-wrapper">
                    @foreach($field->gallery as $image)
                        <div class="swiper-slide">
                            {!! wp_get_attachment_image($image["ID"], 'thumbnail', false, ['class' => 'w-full h-full object-cover cursor-pointer', '@click' => "handleClick", "data-largeImage" => wp_get_attachment_image_url($image["ID"], 'medium_large')]) !!}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="selector-next w-8 lg:w-10 aspect-[1/1] p-2">
                <x-chevron orientation="right"/>
            </div>
        </div>
    </div>
@endif