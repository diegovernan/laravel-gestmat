feather.replace()

jQuery(document).ready(function () {
    jQuery('.money').mask("#0,00", {
        reverse: true
    });

    jQuery('.phone').mask('(00) 00000-0000');
});