$('body').on('click', '.add-lecture-btn', function () {
    clearLectureNav();
    $(this).addClass('picked-nav');
    $.ajax({
        url: 'php/controller/lecture_controller.php',
        type: "GET",
        success: function (data) {
            $(".body-content").html(data);
        }
    });
});

$(".logo").click(function () {
    clearLectureNav();
    $.ajax({
        url: 'php/controller/index_controller.php',
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
        data: {
            "bezeichnung": $('input[name=bezeichnung]').val(),
            "bezeichnung_kurz": $('input[name=bezeichnung_kurz]').val()
        },
        success: function (data) {
            $(data).insertAfter(".lectures-list li:last");
        }
    });
});

$('body').on('click', '.create-question-btn', function () {
    var antwortArray = [];
    var punkte;

    // Multiple-Choice
    if ($(".frage-typ option:selected").val() == 0) {
        antwortText = [];
        $(".mc-antwort").each(function () {
            antwortArray.push({
                antwort: $(this).children('input[name=antwort]').val(),
                wahrheitswert: $(this).children('input[name=antwort-gruppe]').prop("checked")
                        /*antwort : { 
                         text : $(this).children('input[name=antwort]').val(),
                         wahrheitswert:  $(this).children('input[name=antwort-gruppe]').prop("checked")
                         }*/
            });
        });
        punkte = $(".mult-ch-platzhalter input[name='antwort-gruppe']:checked").length;
        antwortText = JSON.stringify(antwortArray);
        // Frage-Antwort
    } else {
        antwortText = $('textarea[name=antwort-text]').val();
        punkte = $('input[name=points]').val();
    }
    ;

    if (validateInput() !== true) {
        //showMessageBox(validInput);
        return;
    }

    $.ajax({
        url: 'php/controller/question_to_db.php',
        type: "GET",
        data: {
            "question": {
                "frage-typ": $(".frage-typ option:selected").val(),
                "frage-text": $('textarea[name=frage-text]').val(),
                "antwort-text": antwortText,
                "difficulty": $('select[name=difficulty]').val(),
                "frequency": $('select[name=frequency]').val(),
                "points": punkte,
                "space-needed": $('select[name=space-needed]').val(),
            }
        },
        success: function (data) {
            $(".body-content").html(data);
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
        url: 'php/controller/question_add.php',
        type: "GET",
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
            $(".body-content").html('<h1>Alle Fragen der Vorlesung: '
                    + $('.picked-nav a').text() + '!</h1>');
            $(".body-content").append(data);
        }
    });
});

$('body').on('click', '.exam_new_li', function () {
    $.ajax({
        url: 'php/controller/exam_controller.php',
        type: "GET",
        success: function (data) {
            $(".body-content").html(data);
        }
    });
});

$('body').on('click', '.settings_li', function () {
    $.ajax({
        url: 'php/controller/settings_controller.php',
        type: "GET",
        success: function (data) {
            $(".body-content").html(data);
        }
    });
});

$('body').on('change', '.frage-typ', function () {
    clearInput();
    if ($(".frage-typ option:selected").val() == 0) {
        $('.mult-ch-platzhalter').removeClass('platzhalter');
        $('.frag-ant-platzhalter').addClass('platzhalter');
    } else {
        $('.mult-ch-platzhalter').addClass('platzhalter');
        $('.frag-ant-platzhalter').removeClass('platzhalter');
    }
});

$('body').on('click', '.add-answer-btn', function () {
    $('<span class="mc-antwort"><input name="antwort" type="text"></input><input name="antwort-gruppe" \n\
    type="checkbox" value="WAHR">WAHR</input></span><br />').insertBefore('.add-answer-btn');
});

$('body').on('change', '.mc-antwort', function () {
    var len = $(".update-mc-antworten input[name='antwort-gruppe']:checked").length;
    $('.mc-punkte-label').text(len);
});

$('body').on('change', '.update-mc-antwort', function () {
    var len = $(".update-mc-antworten input[name='antwort-gruppe']:checked").length;
    $('.update-mc-punkte-label').text(len);
});

function clearLectureNav() {
    $('.lecture').removeClass('picked-nav');
    $('.add-lecture-btn').removeClass('picked-nav');
}

$('body').on('click', '.delete-question', function () {
    var id = $(this).parent('.question-box').attr('id');
    $.ajax({
        url: 'php/controller/question_delete_from_db.php',
        type: "GET",
        data: {
            "delete_id": $(this).parent('.question-box').attr('id')
        },
        success: function (data) {
            $('.question-box#' + id).remove();
        }
    });
});

$('body').on('click', '.edit-question', function () {
    var id = $(this).parent('.question-box').attr('id');
    $.ajax({
        url: 'php/controller/question_update.php',
        type: "GET",
        data: {
            "update_id": $(this).parent('.question-box').attr('id')
        },
        success: function (data) {
            $("section[name=" + id + "]").html(data);
        }
    });
});

$('body').on('click', '.update-add-answer-btn', function () {
    $('<span class="update-mc-antwort"><input type="text" name="antwort"><input name="antwort-gruppe" \n\
        type="checkbox" value="WAHR">WAHR</input></span><br />').insertBefore('.update-add-answer-btn');
});

$('body').on('click', '.question-update-btn', function () {
    var antwortArray = [];
    var punkte;
    var antwortText;

    // Multiple-Choice
    if ($(".question-update-form").children().hasClass('update-mc-antworten'))
    {
        var empty_antwort = 0;
        $(".update-mc-antworten").each(function () {
            if ($(this).children('input[name=antwort]').val() == "") {
                empty_antwort++;
            }
        });
        if (empty_antwort > 0) {
            alert("Antworten dürfen nicht leer bleiben!");
            return;
        }
        antwortText = [];
        $(".update-mc-antworten").each(function () {
            antwortArray.push({
                antwort: $(this).children('input[name=update-antwort]').val(),
                wahrheitswert: $(this).children('input[name=update-antwort-gruppe]').prop("checked")
            });
        });
        punkte = $(".mult-ch-platzhalter input[name='update-antwort-gruppe']:checked").length;
        antwortText = JSON.stringify(antwortArray);
    } else {
        antwortText = $('textarea[name=update-antwort-text]').val();
        punkte = $('input[name=update-points]').val();
    }

    $.ajax({
        url: 'php/controller/question_to_db_update.php',
        type: "GET",
        data: {
            "question": {
                "current_question_id": $(this).parent('.question-update-form').attr('id'),
                "frage-text": $('textarea[name=update-frage-text]').val(),
                "antwort-text": antwortText,
                "difficulty": $('select[name=update-difficulty]').val(),
                "frequency": $('select[name=update-frequency]').val(),
                "points": punkte,
                "space-needed": $('select[name=update-space-needed]').val(),
            }
        },
        success: function (data) {
            $(".body-content").html("Update erfolgreich!");
        }
    });
});




//
// FUNCTIONS
//////////////////////////////////////////////
function validateInput() {
    clearInput();
    var error = 0;

    // Multiple-Choice
    if ($(".frage-typ option:selected").val() == 0) {
        if ($('textarea[name=frage-text]').val() === "") {
            $('.frage-text-label').text('Fragetext: Darf nicht leer sein!');
            $('.frage-text-label').addClass('input-error');
            error++;
        }
        if ($(".update-mc-antworten input[name='antwort-gruppe']:checked").length === 0) {
            $('.mc-antwort-label').text('Anworten: Mindestens eine Antwort muss "WAHR" sein!');
            $('.mc-antwort-label').addClass('input-error');
            error++;
        }
        $(".update-mc-antworten input[name='antwort']").each(function () {
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

        punkte = parseInt($('#frage-antwort-punkte').val());
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

function showMessageBox(message) {
    $('.global-message-div').text(message).show().delay(1000).fadeOut(1500);
}
;

function clearInput() {
    $('.frage-text-label').text('Fragetext:');
    $('.mc-antwort-label').text('Anworten:');
    $('.punkte-label').text('Punkte:');
    $('.add-question-form').children().removeClass('input-error');
};