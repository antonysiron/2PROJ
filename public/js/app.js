var question_id = 1;
var answer_id = 1;
$(document).ready(function () {
    // Add question
    $("#a-add-question").click(function (e) {
        e.preventDefault();
        var question_group =
            '                <div id = "question-group-'+question_id +'">\n' +
            '                    <div class="form-group" >\n' +
            '                        <label for="question-'+question_id +'">Question '+ question_id +'</label>\n' +
            '                        <div class="input-group" >\n' +
            '                            <input type="text" class="form-control"  id = "question-name-'+question_id +'">\n' +
            '                            <a href="" style="margin-top: 5px"  id = "a-delete-question" value ="'+question_id +'">&nbsp;<i class="fa fa-minus"></i> Delete Question</a>\n' +
            '                        </div>\n' +
            '                        <label for="question" >Answers</label>\n' +
            '                        <div class="input-group" id = "answer-group-'+question_id +'-'+answer_id+'">\n' +
            '                            <input type="checkbox" value="" id = "cb-answer-'+question_id +'-'+answer_id+'">\n' +
            '                            <input type="text" class="form-control" id = "answer-name-'+question_id +'-'+answer_id+'">\n' +
            '                            <a href="" style="margin-top: 5px" id = "a-add-answer" value = "'+question_id +'-'+answer_id+'">&nbsp;<i class="fa fa-plus"></i> Add Answer</a>\n' +
            '                        </div>\n' +
            '                        <div id ="div-add-answer"></div>\n' +
            '                    </div>\n' +
            '                    \n' +
            '                </div>';

        $(question_group).appendTo('#div-add-question');
        question_id++;
        answer_id++;
    });
    // Delete question
    $(document).on('click','#a-delete-question', function(e){
        e.preventDefault();
        var val = $(this).val();
        console.log(val);
        alert(val);
    });
    // Add answer
    $("#a-add-answer").click(function (e) {
        e.preventDefault();
        var answer_group =
            "                        <div class=\"input-group\" id = \"answer-group\">\n" +
            "                            <input type=\"checkbox\" value=\"\" id = \"list-answer-name\">\n" +
            "                            <input type=\"text\" class=\"form-control\" id = \"add-answer-name\">\n" +
            "                            <a href=\"\" style=\"margin-top: 5px\" id = \"a-add-answer\">&nbsp;<i class=\"fa fa-plus\"></i> Add Answer</a>\n" +
            "                        </div>";
        $( "#answer-group" ).append(answer_group);
    });

});



