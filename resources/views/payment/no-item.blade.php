<figure class="my-5">
    <img src="{{ asset('img/static/empty-cart.webp') }}" alt="Empty cart" class="block h-64 mx-auto">
    <figcaption class="text-center">
        <h1 class="text-3xl mb-5">Keranjang Belanja Kamu Masih Kosong nih...</h1>
        <p class="text-lg">
            Ayo 
            <a href="{{ route('store.product.index') }}" class="text-blue-600 underline">
                beli product
            </a> 
            sekarang!
        </p>
    </figcaption>
</figure>