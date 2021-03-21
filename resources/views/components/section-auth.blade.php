<section>
    <h3 class="mb-5 text-2xl">{{ $name }}</h3>
    <div class="auth-box p-4 border border-gray-400">
        <form action="{{ $action }}" method="POST" id="form-{{ strtolower($name) }}">
            @csrf
            {{ $slot }}
            <x-btn el="button" action="submit" text="{{ $name }}" type="primary" 
            add-class="mt-5"/>
        </form>
    </div>
</section>