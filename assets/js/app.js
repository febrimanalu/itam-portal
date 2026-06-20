document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('button').forEach((button) => {
        button.addEventListener('click', () => {
            button.classList.add('clicked');
            window.setTimeout(() => button.classList.remove('clicked'), 160);
        });
    });
});
