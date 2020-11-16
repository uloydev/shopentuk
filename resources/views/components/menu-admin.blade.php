<li class="sidebar-item"> 
    <a {{ $attributes->merge(['class' => 'sidebar-link ']) }}" 
    href="{{ $to }}" aria-expanded="false">
        <i data-feather="{{ $icon }}" class="feather-icon"></i>
        <span class="hide-menu text-capitalize">{{ $text }}</span>
    </a>
    {{ $slot }}
</li>