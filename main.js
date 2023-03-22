$(document).ready(function(){
    // $('#message').trumbowyg();

    $('#mcheck').on('click', function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
        $('input:checkbox').prop('checked', $(this).prop('checked'));
    });
});

//Added function using individual select
function updateTextArea(){
    var allVals = [];
    $('#allUsers tr td :checked').each(function () {
        allVals.push($(this).val());
    });
    $('#emails').val(allVals);
}


//Added function using select all
$(function(){
    $('#mcheck').click(updateTextArea);
    updateTextArea();
});
