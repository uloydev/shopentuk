const alerts = document.querySelectorAll('.alert:not(.not-dismissable)')
alerts.forEach(alert => {
    setTimeout(() => {
        alert.classList.add('alert--fade-out')
    }, 2500);
})