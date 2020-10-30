<section>
    <h3 class="mb-5 text-2xl">{{ $name }}</h3>
    <div class="auth-box">
        <form action="{{ $action }}" method="POST" id="form-{{ strtolower($name) }}">
            @csrf
            {{ $slot }}
            <x-btn-primary text="{{ $name }}" class="mt-5"/>
        </form>
    </div>
</section>