<article id="post-{{ Loop::id() }}" {!! post_class() !!}>
    <div class="entry-content px-4 lg:px-0">
        {!! Loop::content() !!}
    </div>
</article><!-- #post-{{ Loop::id() }} -->
