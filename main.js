$(document).ready(function(){
    // $('#message').trumbowyg();

    $('#mcheck').on('click', function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
});


function updateTextArea(){
    var allVals = [];
    $('#allUsers tr td :checked').each(function () {
        allVals.push($(this).val());
    });
    $('#emails').val(allVals);
}
