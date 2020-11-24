<div class="box-promo relative text-center lg:text-left {{ isset($addedClass) ? $addedClass : '' }}">
    @isset($headingHelp)
    <h3 class="text-sm text-white">{{ $headingHelp }}</h3>
    @endisset
    <h1 class="text-white box-promo__heading font-bold text-5xl mb-5">{{ $heading }}</h1>
    <h2 class="text-white box-promo__subheading {{ $subheadClass }}">{{ $subheading }}</h2>
    <div class="flex flex-col md:flex-row items-center flex-wrap mt-8 justify-center lg:justify-start">
        <a href="{{ $primaryBtnLink }}" 
        class="{{ $primaryBtnType }} p-3 rounded">{{ $primaryBtnText }}</a>
        {{ $slot }}
    </div>
</div>