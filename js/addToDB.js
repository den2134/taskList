/**
 * Created by Денис on 06.02.2016.
 */

function add() {
    $(document).ready(function () {
            var params = $('input').serializeArray();

            $.post('lib/post.php', params).done(function (data) {

            });
    });
}