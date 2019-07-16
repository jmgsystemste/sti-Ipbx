$(document).ready(function () {
    alert('estoy en la funcion');
    $('#developers').pageMe({
        pagerSelector: '#developer_page',
        showPrevNext: true,
        hidePageNumbers: false,
        perPage: 4
    });
});