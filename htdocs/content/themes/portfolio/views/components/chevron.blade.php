@props(['orientation' => 'right'])
@php
    switch ($orientation) {
        case "right":
            $rotate = "-rotate-45";
            break;
        case "left":
            $rotate = "rotate-[135deg]";
            break;
        case "top":
            $rotate = "-rotate-[135deg]";
            break;
        case "bottom":
            $rotate = "rotate-45";
            break;
        default:
            $rotate = "";
    };
@endphp
<div {{ $attributes->class("w-full aspect-[1/1] border-b border-r border-b-black border-r-black border-solid ".$rotate) }}>

</div>