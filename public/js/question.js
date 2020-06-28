function UpdateDisplayCreateQuestion(questionType) {
    $('.type').hide().removeClass('form-group');
    $('.REQUIRED').prop('required', false);

    const target = $('#' + questionType);
    target.addClass('form-group');
    if(questionType === 'RATING' || questionType === 'MULTIPLE_CHOICE')
        $('.' + questionType + '_REQUIRED').prop('required', true);
    target.show();
}
