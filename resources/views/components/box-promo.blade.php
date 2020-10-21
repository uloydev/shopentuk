<div class="box-promo text-center lg:text-left">
    <h1 class="text-white box-promo__heading font-bold text-5xl mb-5">{{ $heading }}</h1>
    <h2 class="text-white box-promo__subheading text-3xl">{{ $subheading }}</h2>
    <div class="flex mt-8 justify-center lg:justify-start">
        <a href="{{ $primaryBtnLink }}" 
        class="{{ $primaryBtnType }} font-bold p-3 rounded">{{ $primaryBtnText }}</a>
        {{ $slot }}
    </div>
</div>