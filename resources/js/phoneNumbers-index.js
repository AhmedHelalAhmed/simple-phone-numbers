document.querySelectorAll('#filter_form select').forEach((filterElement) => {
    filterElement.addEventListener('change', () => {
        document.querySelector('#filter_form').submit();
    });
});
