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
        var empty_antwort = 0;
        $(".mc-antworten").each(function () {
            if ($(this).children('input[name=antwort]').val() == "") {
                empty_antwort++;
            }
        });
        if (empty_antwort > 0) {
            alert("Antworten dürfen nicht leer bleiben!");
            return;
        }
        antwortText = [];
        $(".mc-antworten").each(function () {
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
    if ($(".frage-typ option:selected").val() == 0) {
        $('.mult-ch-platzhalter').removeClass('platzhalter');
        $('.frag-ant-platzhalter').addClass('platzhalter');
    } else {
        $('.mult-ch-platzhalter').addClass('platzhalter');
        $('.frag-ant-platzhalter').removeClass('platzhalter');
    }
});

$('body').on('click', '.add-answer-btn', function () {
    $('<span class="mc-antworten"><input name="antwort" type="text"></input><input name="antwort-gruppe" \n\
    type="checkbox" value="WAHR">WAHR</input></span><br />').insertBefore('.add-answer-btn');
});

$('body').on('change', '.mc-antworten', function () {
    var len = $(".mult-ch-platzhalter input[name='antwort-gruppe']:checked").length;
    $('.mc-punkte-label').text(len);
});

function clearLectureNav() {
    $('.lecture').removeClass('picked-nav');
    $('.add-lecture-btn').removeClass('picked-nav');
}

$('body').on('click', '.delete-question', function () {
    $.ajax({
        url: 'php/controller/question_delete_from_db.php',
        type: "GET",
        data: {
            "delete_id": $(this).parent('.question-box').attr('id')
        },
        success: function (data) {
            $(".body-content").html(data);
        }
    });
});

$('body').on('click', '.edit-question', function () {
    alert("THIS: " + $(this).parent('.question-box').attr('id'));
    var id = $(this).parent('.question-box').attr('id');
    $.ajax({
        url: 'php/controller/question_update.php',
        type: "GET",
        data: {
            "update_id": $(this).parent('.question-box').attr('id')
        },
        success: function (data) {
            alert("Success: " + id);
            $("section[name="+id+"]").html(data); 
        }
    });
});

