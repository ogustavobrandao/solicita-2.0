$(function(){
    $(document).on('submit', 'form', function() {
        var $btn = $(document.activeElement);
        if (
            /* there is an activeElement at all */
            $btn.length &&

            /* it's really a submit element */
            $btn.is('button[type="submit"], input[type="submit"]')
        ) {
            $btn.attr('disabled','disabled');
        }
    })
});
