<header x-data="{'open' : false}" class="flex items-center justify-center h-20">
    <div class="max-w-[1440px] w-full flex items-center justify-between lg:grid grid-cols-5 px-8 lg:px-0">
        <div class="h-full">
            <a href="{{ home_url() }}">
                {!! get_custom_logo() !!}
            </a>
        </div>
        <div @click="open = true" class="lg:hidden w-8 h-8 bg-green-200">

        </div>
        <div :class="{'translate-x-full': !open}" class="col-span-4 duration-500 translate-x-full lg:translate-x-0 flex lg:flex-row flex-col gap-8 items-center justify-center lg:grid lg:grid-cols-4 fixed lg:relative top-0 left-0 h-screen w-screen lg:w-full lg:h-full bg-white lg:bg-transparent z-50">
            <div class="col-span-3 h-fit lg:h-full w-full">
                {!! wp_nav_menu([
                    'theme_location' => 'menu-header',
                    'menu_class' => 'flex lg:flex-row flex-col items-center justify-between h-full w-full'
                ]) !!}
            </div>
            <div class="flex items-center justify-end gap-8">
                @if($socials = get_field('social_networks', 'options'))
                    @foreach($socials as $social)
                        <a href="{{ $social['link'] }}" target="_blank" class="text-jaune hover:text-jaune-hover">
                            @isset($social['icon']['ID'])
                                {!! wp_get_attachment_image($social['icon']['ID'], 'full', false, ['class' => 'h-6 w-auto']) !!}
                            @endisset
                        </a>
                    @endforeach
                @endif
            </div>
            <div @click="open = false" class="w-8 h-8 bg-red-200 lg:hidden">

            </div>
        </div>

    </div>
</header>