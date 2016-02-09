/**
 * Created by Денис on 06.02.2016.
 */
// Проверяем кнопочку добавления
function check() {
        if ($('#inp').val() != '') {
            $('#sub').removeAttr('disabled');
            $('#sub').removeClass('disable');
            $('#sub').addClass('enable');
        }
        else {
            $('#sub').attr('disabled', 'disable');
            $('#sub').removeClass('enable');
            $('#sub').addClass('disable');
        }
}
// Добавление в БД
function add() {
        var params = $('input').serializeArray();
        $.post('lib/post.php', params).done(function (data) {
            $('#inp').val('');
            check();
        });
}
// Проверка чекбокса и добавление выполненых тасков в див
function isChecked(value){
    $.post('lib/updatePost.php', {check: value}).done(function(data){
            $('#t'+value).remove();

            $('#done-tasks').html('');
            showTasksCompleted();
    });
}