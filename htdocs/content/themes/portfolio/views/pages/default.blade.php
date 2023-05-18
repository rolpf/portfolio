@extends('layouts.main')

@section('content')
    @loop
        @template('parts.content', 'page')
    @endloop
@endsection