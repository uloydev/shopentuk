<div class="box-promo relative text-center lg:text-left {{ isset($addedClass) ? $addedClass : '' }}">
    @isset($headingHelp)
    <h3 class="text-sm text-white">{{ $headingHelp }}</h3>
    @endisset
    <h1 class="text-white max-w-full overflow-hidden text-elipsis font-amita 
    box-promo__heading font-bold text-5xl mb-5 mt-2">
        {{ $heading }}
    </h1>
    <h2 class="text-white max-w-full overflow-hidden text-elipsis 
    font-amita box-promo__subheading {{ $subheadClass }}">
        {{ $subheading }}
    </h2>
    <div class="flex flex-col md:flex-row items-center flex-wrap mt-8 justify-center lg:justify-start">
        @isset($primaryBtnLink)
        <a href="{{ $primaryBtnLink }}" 
        class="{{ $primaryBtnType }} p-3 rounded">{{ $primaryBtnText }}</a>
        @endisset
        {{ $slot }}
    </div>
</div>