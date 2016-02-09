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
    <div class="add form-group ">
        <div id="form">
            <div class="main-name"><h1 class="main-text">You task list :D</h1></div>
            <input type="text" name="task" class="inp-t input-sm" placeholder="New task" id="inp" onkeyup="check();">
            <button id="sub" class="disable btn btn-default" type="submit" name="submit" onclick="add();" disabled="disabled">Add</button>
        </div>
    </div>
    <div id="tasks" class="cl-tasks col-md-12 col-sm-12 col-lg-12"></div>
    <div class="hr col-md-12 col-sm-12 col-lg-12"><h3 class="hr-text">Completed tasks</h3></div>
    <div id="done-tasks" class="col-md-12 col-sm-12 col-lg-12"></div>
</div>

<!-- Own scripts-->
<script src="js/addToDB.js"></script>
<script src="js/showTasks.js"></script>
<script>
    showTasks();
    showTasksCompleted();

    // Обновляем данные после добавление, выводим последний столбец из БД вместо того, что бы выводить перезаписывать все
    $('#sub').click(function () {
        $.get('lib/get.php').done(function(data){

            data = JSON.parse(data);
            var message = data.message;
            var status = data.status;
            var last = message.length-1;

            if(status == "Success") {
                $('#tasks').append('<div class="sTask last" ' + 'id='+'t'+message[last]['id']+ '>' +
                    '<input type="checkbox" ' + 'onclick='+'isChecked('+message[last]['id']+')' + ' class="chk" ' + 'value='+message[last]['id'] + '>' +
                    '<p>' +
                    '<span class="tskNum">' + ' #' + message[last]['id'] +'</span>' + '<br/>' +
                    '<span class="tskName">' + ' Task:  ' + '</span>' + '<span class="tskText">' + message[last]['task'] + '</span>' + '. ' +
                    '<span class="tskDate">' + 'Date: ' + message[last]['date'] + '</span>' + '<br/>' +
                    '</p>' +
                    '</div>')
            }
        });
    });

</script>
</body>
</html>