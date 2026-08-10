@extends('layouts.app')
@section('content')
<section class="absolute text-[3rem] z-[100] h-[2000px] text-[#2f6ba7] pointer-events-none overflow-hidden">
    <img
        class="min-h-[800px] max-[940px]:min-h-[600px] w-full object-cover object-right"
        src="{{ asset('hero_section/hero_section.png') }}"
        alt="">
</section>
@endsection