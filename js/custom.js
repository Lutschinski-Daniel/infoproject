$('body').on('click', '.add-lecture-btn', function () {
    clearLectureNav();
    $(this).addClass('picked-nav');
    $.ajax({
        url: 'php/controller/lecture_form_create.php',
        type: "GET",
        success: function (data) {
            $(".body-content").html(data);
        }
    });
});

$(".logo").click(function () {
    clearLectureNav();
    $.ajax({
        url: 'php/controller/welcome.php',
        type: "GET",
        success: function (data) {
            $(".body-content").html(data);
        }
    });
});

$('body').on('click', '.create-lecture-btn', function () {
    $.ajax({
        url: 'php/controller/lecture_to_db.php',
        type: "GET",
        dataType: "json",
        data: {
            "bezeichnung": $('input[name=bezeichnung]').val(),
            "bezeichnung_kurz": $('input[name=bezeichnung_kurz]').val()
        },
        success: function (response) {
            if(response.success){
                $(response.data).insertAfter(".lectures-list li:last");
                showMessageBox(response.success);
            } else {
                showMessageBox(response.error);
            }
        }
    });
});

$('body').on('click', '.lecture', function () {
    clearLectureNav();
    $(this).addClass('picked-nav');
    $.ajax({
        url: 'php/controller/lecture_show.php',
        type: "GET",
        data: {
            "lecture_id": $(this).find('a:first').attr('id')
        },
        success: function (data) {
            $(".body-content").html(data);
        }
    });
});

$('body').on('click', '.quest_add_li', function () {
    $.ajax({
        url: 'php/controller/question_form_create.php',
        type: "GET",
        dataType: "html",
        success: function (data) {
            $(".body-content").html(data);
        }
    });
});

$('body').on('click', '.quest_all_li', function () {
    $.ajax({
        url: 'php/controller/question_show_all.php',
        type: "GET",
        success: function (data) {
            $(".body-content").html(data);
        }
    });
});

$('body').on('click', '.exam_new_li', function () {
    $.ajax({
        url: 'php/controller/exam.php',
        type: "GET",
        dataType: "json",
        success: function (response) {
            if(response.success) {
                $(".body-content").html(response.success);
            } 
            if(response.error) {
                $(".body-content").html(response.error);
            }
        }
    });
});

$('body').on('click', '.settings_li', function () {
    $.ajax({
        url: 'php/controller/settings.php',
        type: "GET",
        success: function (data) {
            $(".body-content").html(data);
        }
    });
});

$('body').on('change', '.frage-typ', function () {
    if ($(".frage-typ option:selected").val() == 0) {
        $('.mult-ch-platzhalter').removeClass('platzhalter');
        $('.frag-ant-platzhalter').addClass('platzhalter');
    } else {
        $('.mult-ch-platzhalter').addClass('platzhalter');
        $('.frag-ant-platzhalter').removeClass('platzhalter');
    }
    clearInput();
});

$('body').on('change', '.mc-antwort', function () {
    var len = $(".mc-antwort input[name='antwort-gruppe']:checked").length;
    $('.mc-punkte-label').text(len);
});

$('body').on('click', '.delete-question', function () {
    var id = $(this).parent('.question-box').attr('id');
    $.ajax({
        url: 'php/controller/question_to_db_delete.php',
        type: "GET",
        dataTyp: "json",
        data: {
            "delete_id": $(this).parent('.question-box').attr('id')
        },
        success: function (response) {
            if(response.success){
             $('.question-box#' + id).remove();
             showMessageBox(response.success);
            } else {
                showMessageBox(response.error);
            }
        }
    });
});

$('body').on('click', '.edit-toggle', function () {
    var id = $(this).parent('.question-box').attr('id');
    $('.edit-question').removeClass('edit-toggle');
    $.ajax({
        url: 'php/controller/question_form_update.php',
        type: "GET",
        data: {
            "update_id": $(this).parent('.question-box').attr('id')
        },
        success: function (data) {
            $("section[name="+id+"]").html(data);
            $('.mc-punkte-label').text($(".mc-antwort input[name='antwort-gruppe']:checked").length);
        }
    });
});

$('body').on('click', '.add-answer-btn', function () {
    $(  '<span class="mc-antwort"><input type="text" name="antwort"><input name="antwort-gruppe" \n\
        type="checkbox" value="WAHR">WAHR</input></span><br />').insertBefore('.add-answer-btn');
});

$('body').on('click', '.question-update-btn', function () {
    var id = $(this).parent('.question-update-form').attr('id');
    var punkte;
    var antwortText;

    // Multiple-Choice
    if ($(".question-update-form").children().hasClass('mc-antwort-label'))
    {
        antwortText = getMCAntwortText();
        punkte = $(".question-update-form input[name='antwort-gruppe']:checked").length;
    // Frage-Antwort    
    } else {
        antwortText = $('textarea[name=antwort-text]').val();
        punkte = $('input[name=points]').val();
    }
    
    if (validateInput() !== true) {
        return;
    };

    $.ajax({
        url: 'php/controller/question_to_db_update.php',
        type: "GET",
        data: {
            "question": {
                "current_question_id": id,
                "frage-text": $('textarea[name=frage-text]').val(),
                "antwort-text": antwortText,
                "difficulty": $('select[name=difficulty]').val(),
                "frequency": $('select[name=frequency]').val(),
                "points": punkte,
                "space-needed": $('select[name=space-needed]').val()
            }
        },
        success: function (data) {
            $('#'+id+'.question-box').html(data);
            $('.edit-question').addClass('edit-toggle');
            showMessageBox("Update erfolgreich!");
        }
    });
});

$('body').on('click', '.create-question-btn', function () {
    var antwortText;
    var punkte;

    // Multiple-Choice
    if ($(".frage-typ option:selected").val() == 0) {
        antwortText = getMCAntwortText();
        punkte = $(".mult-ch-platzhalter input[name='antwort-gruppe']:checked").length;
    // Frage-Antwort
    } else {
        antwortText = $('textarea[name=antwort-text]').val();
        punkte = $('input[name=points]').val();
    };

    if (validateInput() !== true) {
        return;
    };

    $.ajax({
        url: 'php/controller/question_to_db.php',
        type: "GET",
        dataType: "json",
        data: {
            "question": {
                "frage-typ": $(".frage-typ option:selected").val(),
                "frage-text": $('textarea[name=frage-text]').val(),
                "antwort-text": antwortText,
                "difficulty": $('select[name=difficulty]').val(),
                "frequency": $('select[name=frequency]').val(),
                "points": punkte,
                "space-needed": $('select[name=space-needed]').val()
            }
        },
        success: function (response) {
            if(response.success){
                showMessageBox(response.success);
            }
            if(response.error){
                showMessageBox(response.error);
            }
        }
    });
});

$('body').on('click', '.exam-create-btn', function () {
    resetExamInputErrors();
    if (validateExamInput() === false){
        return;
    };

    $.ajax({
        url: 'php/controller/exam.php',
        type: "GET",
        dataType: "json",
        data: {
            "laenge": $('.exam-laenge option:selected').val(),
            "punkte": $('input[name=exam-punkte]').val(),
            "datum": $('input[name=exam-date]').val()
        },
        success: function (response) {
            if(response.success) {
                $(".body-content").html(response.success);
            } 
            if(response.error) {
                $(".body-content").html(response.error);
            }
        }
    });
});

$('body').on('click', '.vorschlag-question-up', function () {
    $(this).parent('.exam-question').insertBefore($(this).parent('.exam-question').prev());
});

$('body').on('click', '.vorschlag-question-down', function () {
    $(this).parent('.exam-question').insertAfter($(this).parent('.exam-question').next());
});

$('body').on('click', '.vorschlag-question-switch', function () {
    var data = "<h1>Replaced!</h1>";
    $(this).parent('.exam-question').replaceWith(data);
});

//
// FUNCTIONS
//////////////////////////////////////////////
function resetExamInputErrors(){
    $('input[name=exam-date]').removeClass('input-error');
    $('input[name=exam-punkte]').removeClass('input-error');
}

function validateExamInput(){
    var error = 0;
    
    if ($('input[name=exam-date]').val() === ""){
        $('input[name=exam-date]').addClass('input-error');
        error++;
    }
    if ($('input[name=exam-punkte]').val() < 1){
        $('input[name=exam-punkte]').addClass('input-error');
        error++;
    }
    
    return error === 0 ? true : false;
}

function getMCAntwortText() {
    antwortArray = [];
    $(".mc-antwort").each(function () {
        antwortArray.push({
            antwort: $(this).children('input[name=antwort]').val(),
            wahrheitswert: $(this).children('input[name=antwort-gruppe]').prop("checked")
        });
    });
    return JSON.stringify(antwortArray);
};

function showMessageBox(message) {
    $('.global-message-div').text(message).show().delay(1000).fadeOut(1500);
};


function clearLectureNav() {
    $('.lecture').removeClass('picked-nav');
    $('.add-lecture-btn').removeClass('picked-nav');
};

function validateInput() {
    var error = 0;

    clearErrors();

    // Multiple-Choice
    if ($(".frage-typ option:selected").val() == 0
            || $(".question-update-form").children().hasClass('mc-antwort-label')) {
        if ($('textarea[name=frage-text]').val() === "") {
            $('.frage-text-label').text('Fragetext: Darf nicht leer sein!');
            $('.frage-text-label').addClass('input-error');
            error++;
        }
        if ($("input[name='antwort-gruppe']:checked").length === 0) {
            $('.mc-antwort-label').text('Anworten: Mindestens eine Antwort muss "WAHR" sein!');
            $('.mc-antwort-label').addClass('input-error');
            error++;
        }
        $("input[name='antwort']").each(function () {
            if ($(this).val() === "") {
                $('.mc-antwort-label').text('Anworten: Antworten dürfen nicht leer sein!');
                $('.mc-antwort-label').addClass('input-error');
                error++;
            };
        });
    } else { // Frage-Antwort
        if ($('textarea[name=frage-text]').val() === "") {
            $('.frage-text-label').text('Fragetext: Darf nicht leer sein!');
            $('.frage-text-label').addClass('input-error');
            error++;
        }
 
        punkte = parseInt($('input[name=points]').val());
        if ( punkte < 1 || punkte > 50 ) {
            $('.punkte-label').addClass('input-error');
            $('.punkte-label').text('Punkte (1-50):');
            error++;
        }
    }
     
    if (error === 0) {
        return true;
    } else {
        return false;
    }
};

function clearErrors(){
    $('.add-question-form').children().removeClass('input-error');
    $('.question-update-form').children().removeClass('input-error');
    $('.punkte-label').removeClass('input-error');
    $('input[name=points]').removeClass('input-error');
    $('.mc-antwort-label').removeClass('input-error');
};

function clearInput() {
    clearErrors();
    
    $('.frage-antwort-textareas').val("");
    $('.frage-text-label').text('Fragetext:');
    $('.punkte-label').text('Punkte:');
    $("input[name='antwort']").each(function () {
        $(this).val("");
    });
};
