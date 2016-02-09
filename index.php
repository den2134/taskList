<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task list</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/main.css">
    <!-- Add jQuery, Bootstrap and .js -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>

</head>
<body>

<div class="container">
    <div class="add">
        <h1>You task list</h1>
        <div id="form">
            <input type="text" name="task" placeholder="New task" id="inp" onkeyup="check();">
            <button id="sub" class="disable" type="submit" name="submit" onclick="add();" disabled="disabled">Add</button>
        </div>
    </div>
    <div id="tasks"></div>
    <div class="hr"><h3>Completed tasks</h3></div>
    <div id="done-tasks"></div>
</div>

<!-- Own scripts-->
<script src="js/addToDB.js"></script>
<script src="js/showTasks.js"></script>
<script>
    showTasks();
    showTasksCompleted();

    $('#sub').click(function () {
        $.get('lib/get.php').done(function(data){

            data = JSON.parse(data);
            var message = data.message;
            var status = data.status;
            var last = message.length-1;

            if(status == "Success") {
                $('#tasks').append('<div class="sTask last" ' + 'id='+'t'+message[last]['id']+ '>' +
                    '<input type="checkbox" ' + 'onclick='+'isChecked('+message[last]['id']+')' + ' class="chk" ' + 'value='+message[last]['id'] + '>' +
                    ' #' + message[last]['id'] + '<br/>' +
                    'Task: ' + message[last]['task'] + '. ' +
                    'Date: ' + message[last]['date'] + '<br/>' +
                    '</div>')
            }
        });
    });

</script>
</body>
</html>