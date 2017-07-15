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

$('body').on('click', '.add-answer-btn', function () {
    $('<input type="text"></input><input class="mc-antwort" name="antwort-gruppe" type="checkbox" \n\
        value="WAHR">WAHR</input><br />').insertBefore('.add-answer-btn');
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
    $.ajax({
        url: 'php/controller/question_to_db.php',
        type: "GET",
        data: {
            "question": {
                "frage-typ": $('select[name=bezeichnung]').val(),
                "frage-text": $('textarea[name=frage-text]').val(),
                "antwort-text": $('textarea[name=antwort-text]').val(),
                "difficulty": $('select[name=difficulty]').val(),
                "frequency": $('select[name=frequency]').val(),
                "points": $('input[name=points]').val(),
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
            $(".body-content").html(data);
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
    if ($(".frage-typ option:selected").val() === "mult-ch") {
        $('.mult-ch-platzhalter').removeClass('platzhalter');
        $('.frag-ant-platzhalter').addClass('platzhalter');
    } else {
        $('.mult-ch-platzhalter').addClass('platzhalter');
        $('.frag-ant-platzhalter').removeClass('platzhalter');
    }
});

$('body').on('click', '.add-answer-btn', function () {
    $('<input type="text"></input><input class="mc-antwort" name="antwort-gruppe" type="checkbox" \n\
        value="WAHR">WAHR</input><br />').insertBefore('.add-answer-btn');
});

$('body').on('change', '.mc-antwort', function () {
    var len = $(".mult-ch-platzhalter input[name='antwort-gruppe']:checked").length;
    $('.mc-punkte-label').text(len);
});

$('body').on('click', '.add-answer-btn', function () {
    $('<input type="text"></input><input class="mc-antwort" name="antwort-gruppe" type="checkbox" \n\
        value="WAHR">WAHR</input><br />').insertBefore('.add-answer-btn');
});

function clearLectureNav(){
    $('.lecture').removeClass('picked-nav');
    $('.add-lecture-btn').removeClass('picked-nav');
}