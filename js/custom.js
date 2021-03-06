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
    var bez = $('input[name=bezeichnung]');
    var bez_kurz = $('input[name=bezeichnung_kurz]');
    bez.removeClass('input-error');
    bez.removeClass('input-error');
    
    if(!bez.val()){
        $('input[name=bezeichnung]').addClass('input-error');
        return;
    }
    if(!bez_kurz.val()){
        $('input[name=bezeichnung_kurz]').addClass('input-error');
        return;
    }
    
    $.ajax({
        url: 'php/controller/lecture_to_db.php',
        type: "GET",
        dataType: "json",
        data: {
            "bezeichnung": bez.val(),
            "bezeichnung_kurz": bez_kurz.val()
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
        dataType: "json",
        data: {
            "lecture_id": $(this).find('a:first').attr('id')
        },
        success: function (response) {
            if( response.success) {
                $(".body-content").html(response.success);
            } else if (response.error) {
                showMessageBox(response.error);
            }
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
        success: function (response) {
            $(".body-content").html(response.data);
        }
    });
});

$('body').on('change', '.frage-typ', function () {
    if ($(".frage-typ option:selected").val() == 0) {
        $('.mult-ch-platzhalter').removeClass('platzhalter');
        $('.frag-ant-platzhalter-wissen').addClass('platzhalter');
    } else {
        $('.frag-ant-platzhalter-wissen').removeClass('platzhalter');
        $('.mult-ch-platzhalter').addClass('platzhalter');
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
            $("div[name="+id+"]").html(data);
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
    var space;

    // Multiple-Choice
    if ($(".question-update-form").children().hasClass('mc-antwort-label'))
    {
        antwortText = getMCAntwortText();
        punkte = $(".question-update-form input[name='antwort-gruppe']:checked").length;
        space = 0;
    // Frage-Antwort    
    } else {
        antwortText = $('textarea[name=antwort-text]').val();
        punkte = $('input[name=points]').val();
        space = $('select[name=space-needed]').val();
    }
    
    if (validateInput() !== true) {
        return;
    };

    $.ajax({
        url: 'php/controller/question_to_db_update.php',
        type: "POST",
        data: {
            "question": {
                "current_question_id": id,
                "frage-text": $('textarea[name=frage-text]').val(),
                "antwort-text": antwortText,
                "difficulty": $('select[name=difficulty]').val(),
                "frequency": $('select[name=frequency]').val(),
                "points": punkte,
                "space-needed": space
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
    var space;

    // Multiple-Choice
    if ($(".frage-typ option:selected").val() == 0) {
        antwortText = getMCAntwortText();
        punkte = $(".mult-ch-platzhalter input[name='antwort-gruppe']:checked").length;
        space = 0;
    // Frage-Antwort
    } else {
        antwortText = $('textarea[name=antwort-text]').val();
        punkte = $('input[name=points]').val();
        space = $('select[name=space-needed]').val();
    };

    if (validateInput() !== true) {
        return;
    };

    $.ajax({
        url: 'php/controller/question_to_db.php',
        type: "POST",
        dataType: "json",
        data: {
            "question": {
                "frage-typ": $(".frage-typ option:selected").val(),
                "frage-text": $('textarea[name=frage-text]').val(),
                "antwort-text": antwortText,
                "difficulty": $('select[name=difficulty]').val(),
                "frequency": $('select[name=frequency]').val(),
                "points": punkte,
                "space-needed": space
            }
        },
        success: function (response) {
            if(response.success){
                showMessageBox(response.success);
                clearInput();
            }
            if(response.error){
                showMessageBox(response.error);
            }
        }
    });
});

$('body').on('click', '.exam-create-vorschlag', function () {
    resetExamInputErrors();
    if (validateExamInput() === false){
        return;
    };
    
    var laenge = $('.exam-laenge option:selected').val();
    $.ajax({
        url: 'php/controller/exam_vorschlag.php',
        type: "GET",
        dataType: "json",
        data: {
            "vorschlag": 1,
            "laenge": laenge,
            "punkte": $('input[name=exam-punkte]').val(),
            "datum": $('input[name=exam-date]').val()
        },
        success: function (response) {
            if(response.success) {
                $(".body-content").html(response.success);
                $('.exam-laenge').val(laenge);
            } 
            if(response.error) {
                $(".body-content").html(response.error);
            }
        }
    });
});

$('body').on('click', '.save-vorlage-btn', function () {
     $.ajax({
        url: 'php/controller/settings.php',
        type: "POST",
        dataType: "json",
        data: {
            "save": $('.vorlage-textarea').val()
        },
        success: function (response) {
            if(response.success) {
                showMessageBox(response.success);
            } 
            if (response.data) {
                $(".body-content").html(response.data);
            }
        }
    });
});

$('body').on('click', '.exam-create-btn', function () {
    $.ajax({
        url: 'php/controller/exam_save.php',
        type: "GET",
        dataType: "json",
        data: {
            "save": "save",
            "datum": $('input[name=exam-date]').val(),
            "laenge": $('.exam-laenge option:selected').val(),
            "question_order": getQuestionOrder()
        },
        success: function (response) {
            if(response.success) {
                $(".body-content").html(response.success);
            } 
        }
    });
});

$('body').on('click', '.vorschlag-question-switch', function () {
    var questionToSwitch = $(this).parent().siblings('.exam-question-text'); 
    $('span[class^="vorschlag"]').css("pointer-events", "none");
    $.ajax({
        url: 'php/controller/exam_vorschlag_quest_switch.php',
        type: "GET",
        dataType: "json",
        data: {
            "switch": $(this).siblings().first().text()
        },
        success: function (response) {
            if(response.success) {
                questionToSwitch.append(response.success);
            } else if (response.error) {
                showMessageBox(response.error);
            }
        }
    });
});

$('body').on('click', '.vorschlag-question-delete', function () {
    var quest = $(this).parents('.exam-question');
    var id = quest.children('.hidden').text();

    $.ajax({
        url: 'php/controller/exam_vorschlag_quest_delete.php',
        type: "GET",
        dataType: "json",
        data: {
            "delete": id,
            "order": getQuestionOrder()
        },
        success: function (response) {
            if(response.success) {
                $(".exam-box").html(response.success);
                showMessageBox("Aufgabe aus Klausurvorschlag entfernt!");
            } else if (response.error){
                showMessageBox(response.error);
            }
        }
    });
});

$('body').on('click', '.vorschlag-question-edit', function () {
    $('span[class="vorschlag-question-edit"]').css("pointer-events", "none");
    $(this).addClass('hidden');
    $(this).siblings().removeClass('hidden');
    $('span[class^="point-"]').addClass('point-active');
});

$('body').on('click', '.point-minus', function () {
    var obj_quest = $(this).parents('.exam-question').find('.vorschlag-question-points');
    var obj_total = $('.exam-points').children('span');
    obj_quest.text((obj_quest.text()-1)); 
    obj_total.text((obj_total.text()-1));
});

$('body').on('click', '.point-plus', function () {
    var obj_quest = $(this).parents('.exam-question').find('.vorschlag-question-points');
    var obj_total = $('.exam-points').children('span');
    var quest_count = parseInt(obj_quest.text()) + 1;
    var total_count = parseInt(obj_total.text()) + 1;
    obj_quest.text(quest_count); 
    obj_total.text(total_count);
});

$('body').on('click', '.point-done', function () {
    $(this).addClass('hidden');
    $(this).siblings('span[class^="point-"]').addClass('hidden');
    $(this).siblings('.vorschlag-question-edit').removeClass('hidden');
    $('span[class="vorschlag-question-edit"]').css("pointer-events", "auto");
    $('span[class^="point-"]').removeClass('point-active');
    
    var id = $(this).parents('.exam-question').children('.hidden').text();
    var points = $(this).parents('.exam-question').find('.vorschlag-question-points').text();
    
    $.ajax({
        url: 'php/controller/exam_point_update.php',
        type: "GET",
        dataType: "json",
        data: {
            "point_update": points,
            "id": id
        },
        success: function (response) {
            if(response.success) {
                showMessageBox(response.success);
            } else if (response.error) {
                showMessageBox(response.error);
            }
        }
    });
});

$('body').on('click', '.switch-btn', function () {
    var questionToSwap = $(this).parents('.exam-question').children().first().text(); 
    var questionPicked = $(this).siblings('.hidden').text();
    var question_order = getQuestionOrder();
    var final_order = updateOrderIndex(question_order, questionToSwap, questionPicked);
    
    $.ajax({
        url: 'php/controller/exam_vorschlag_quest_swap.php',
        type: "GET",
        dataType: "json",
        data: {
            "swap": "1",
            "curr_quest": questionToSwap,
            "wanted_quest": questionPicked,
            "question_order": final_order
        },
        success: function (response) {
            if(response.success) {
                $(".exam-box").html(response.success);
            } else if (response.error) {
                showMessageBox(response.error);
            }
        }
    });
});

$('body').on('click', '.cancel-switch-btn', function () {
    $(this).parents('.switch-box').remove(); 
    $('span[class^="vorschlag"]').css("pointer-events", "auto");
});

$('body').on('click', '.vorschlag-question-top', function () {
    $(this).parents('.exam-question').prependTo($(this).parents('.exam-questions-box'));
});

$('body').on('click', '.vorschlag-question-bot', function () {
    $(this).parents('.exam-questions-box').append($(this).parents('.exam-question'));
});

$('body').on('click', '.vorschlag-question-up', function () {
    $(this).parents('.exam-question').insertBefore($(this).parents('.exam-question').prev());
});

$('body').on('click', '.vorschlag-question-down', function () {
    $(this).parents('.exam-question').insertAfter($(this).parents('.exam-question').next());
});

//
// FUNCTIONS
//////////////////////////////////////////////
function getQuestionOrder(){
    order = [];
    $(".exam-question").each(function () {
        order.push($(this).children('.hidden').text());
    });
    return order;
}

function updateOrderIndex(array, old_id, new_id){
    $.each(array, function(index, value) {
        if( value === old_id){
            array[index] = new_id;
        }
    });
    return array;
}

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
    $('.global-message-div').text(message).show().delay(1300).fadeOut(1500);
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
    $("input[name='antwort-gruppe']").each(function () {
        $(this).prop("checked", false);
    });
};
