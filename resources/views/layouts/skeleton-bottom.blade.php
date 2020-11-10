@include('partial.footer')
<script src="{{ mix('js/all-client.js') }}"></script>
<footer class="bg-white">
    <div class="container py-8 md:flex justify-between text-center text-lg md:text-xl">
        <small class="block mb-3 md:mb-0">
            Copyright &copy; <time>{{ date('Y') }}</time> 
            <a href="{{ env('APP_URL') }}">{{ env('APP_NAME') }} Shop</a>
        </small>
        <address class="not-italic">Indonesia - Jakarta</address>
    </div>
</footer>
@stack('script')
</body>
</html>