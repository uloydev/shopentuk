<li class="sidebar-item"> 
    <a {{ $attributes->merge(['class' => 'sidebar-link ']) }}" 
    href="{{ $to ?? 'javascript:void(0);' }}" aria-expanded="false">
        <box-icon name='{{ $icon }}' {{ $attributes }}></box-icon>
        <span class="hide-menu text-capitalize">{{ $text }}</span>
    </a>
    {{ $slot }}
</li>