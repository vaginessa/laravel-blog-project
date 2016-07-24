/* modal */
$('.modal').on('shown.bs.modal', function () {
    var curModal = this;
    $('.modal').each(function(){
        if(this != curModal){
            $(this).modal('hide');
        }
    });
});