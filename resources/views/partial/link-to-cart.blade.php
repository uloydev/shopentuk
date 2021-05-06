<a href="{{ route('cart.index') }}" class="nav__icon nav__icon--bag {{ $class ?? '' }}">
    <div class="nav__icon-cart">
        <var class="not-italic" id="total-shopping">
            @if (Auth::check() && Auth::user()->cart)
                {{ Auth::user()->cart->cartItems->pluck('quantity')->sum() ?? 0 }}
            @else
                0
            @endif
        </var>
        <box-icon name='shopping-bag'></box-icon>
    </div>
</a>