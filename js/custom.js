// delete todo
$(".add-lecture-btn").click(function () {
    $.ajax({
        url: 'php/lecture.php',
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
        url: 'php/welcome.php',
        type: "GET",
        success: function (data) {
            $(".body-content").html(data);
        }
    });
});

