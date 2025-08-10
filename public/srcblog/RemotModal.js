$(document).ready(function () {
    $('body').on('click', '[data-toggle="modal"]', function(){
        $($(this).data("target")+' .modal-content').load($(this).attr('href'));
    });

});
