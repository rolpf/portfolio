<footer class="bg-jaune py-4">
    <div class="max-w-[1280px] px-4 lg:px-0 flex-col lg:flex-row gap-4 lg:gap-0 w-full mx-auto flex justify-between items-center">
        <div>
            @if(get_field('footer_content', 'options'))
                {!! get_field('footer_content', 'options') !!}
            @endif
        </div>
        <div>
            {!! wp_nav_menu([
                'theme_location' => 'menu-footer',
                'menu_class' => 'flex gap-4 items-center',
            ]) !!}
        </div>
    </div>
</footer>