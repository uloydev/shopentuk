<div class="modal micromodal-slide" id="modal-rules" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-1-title">
                    Rules
                </h2>
                <button class="modal__close" aria-label="Close modal" 
                data-micromodal-close></button>
            </header>
            <main class="modal__content game-rule" id="modal-1-content">
                <ol>
                    @foreach ($rules as $rule)
                        <li>{{ $rule->content }}</li>
                    @endforeach
                </ol>
            </main>
            <footer class="modal__footer">
                <button class="capitalize btn btn--primary" data-micromodal-close aria-label="Close this dialog window">
                    Okay i got it
                </button>
            </footer>
        </div>
    </div>
</div>