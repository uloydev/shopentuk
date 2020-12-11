const alerts = document.querySelectorAll('.alert')
alerts.forEach(alert => {
    setTimeout(() => {
        alert.classList.add('alert--fade-out')
    }, 2500);
})