<!doctype html>
<html {!! get_language_attributes() !!}>
<head>
    <meta charset="{{ get_bloginfo('charset') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    @head
    @livewireStyles
</head>
<body @php(body_class())>
<div id="page" class="site">

    @include('partials.header')

    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                @yield('content')
            </main>
        </div>
    </div>

    @include('partials.footer')
</div>
@livewireScripts
@footer

</body>
</html>
