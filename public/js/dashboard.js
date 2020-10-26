const logoutBtn = document.querySelector('#logoutBtn');
logoutBtn.addEventListener('click', (e) => {
    e.preventDefault();
    document.getElementById('logout-form').submit();
});