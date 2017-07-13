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
