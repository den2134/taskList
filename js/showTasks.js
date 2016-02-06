/**
 * Created by Денис on 06.02.2016.
 */

function showTasks(){
    $.get('lib/get.php').done(function(data){

        data = JSON.parse(data);
        var message = data.message;
        var status = data.status;
        console.log(message);
        if(status == "Success"){
            $.each(message, function(key, object){
                $.each(object, function (field, value) {
                   $('#tasks').append(field + ':' + value + '<br/>');
                });
                $('#tasks').append('<hr>');
            });
        } else {
            $('#tasks').append('No tasks');
        }

    });
}