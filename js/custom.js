// delete todo
$(".add-lecture-btn").click(function () {
    $.ajax({
        url: 'php/controller/lecture_controller.php',
        type: "GET",
        fail: function () {
            alert('Todo could not be deleted');
        },
        success: function (data) {
            $(".body-content").html(data);
        }
    });
});

$(".logo").click(function () {
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
        url: 'php/controller/lecture_add.php',
        type: "GET",
        data: {
            "bezeichnung": $('input[name=bezeichnung]').val(),
            "bezeichnung_kurz": $('input[name=bezeichnung_kurz]').val()
        },
        fail: function () {
            alert('Todo could not be deleted');
        },
        success: function (data) {
            $(".body-content").html(data);
        }
    });
});

$('body').on('click', '.lecture', function () {
    $.ajax({
        url: 'php/controller/lecture_show.php',
        type: "GET",
        data: {
            "lecture_id": $(this).find('a:first').attr('id')
        },
        fail: function () {
            alert('Todo could not be deleted');
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
    $('<input type="text" class="mult-antwort"></input><input type="checkbox" \n\
        value="WAHR">WAHR</input><br />').insertBefore('.add-answer-btn');
});

$('body').on('change', '.mc-antwort', function () {
    var len = $(".mult-ch-platzhalter input[name='antwort-gruppe']:checked").length;
    $('.mc-punkte-label').text(len);
});

