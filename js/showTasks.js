/**
 * Created by Денис on 06.02.2016.
 */

function showTasks(){
    $.get('lib/get.php').done(function(data){

        data = JSON.parse(data);
        var message = data.message;
        var status = data.status;
        if(message == ''){$('#tasks').append('<h5>Please add new task :)</h5>');}
        if(status == "Success"){
            $.each(message, function(key, object){
                $('#tasks').append('<div class="sTask" ' + 'id='+'t'+object['id']+ '>' +
                    '<input type="checkbox" ' + 'onclick='+'isChecked('+object['id']+')' + ' class="chk" ' + 'value='+object['id'] + '>' +
                    ' #' + object['id'] + '<br/>' +
                    'Task: ' + object['task'] + '. ' +
                    'Date: ' + object['date'] + '<br/>' +
                    '</div>')
            });
        } else {
            $('#tasks').append('Error :(');
        }
    });
}

function showTasksCompleted(){
    $.get('lib/update.php').done(function(data){

        data = JSON.parse(data);
        var message = data.message;
        var status = data.status;
        if(status == "Success"){
            $.each(message, function(key, object){
                console.log(object['id']);
                $('#done-tasks').append('<div class="cTask">' +
                    '#' + object['id'] + '<br/>' +
                    'Task:' + object['task'] + '. ' +
                    'Date' + ':' + object['date'] + '<br/>' +
                    '</div>');
                $('#done-tasks').append('<hr>');
            });
        } else {
            $('#done-tasks').append('<h5>Error :(</h5>');
        }
        if(message == ''){
            $('#done-tasks').append('<h5>No tasks completed!</h5>');
        }
    });
}

