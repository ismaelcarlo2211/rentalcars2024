<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/notification.css">
    <title>Document</title>
</head>

<body>
    <?php
    include "sidebar.php"
        ?>
    <!--  home content start from here -->
    <div class="home">
        <div class="content">
            <h1>notification</h1>
            <div class="form">

                <label for=""></label>
                <form action="" method="post">
                    <Label>Notify:</Label>

                    <select name="msg_to" id="msg_to" onchange="MyFunction()">
                        <option value="all">All users</option>
                        <option value="one">one_user</option>
                    </select><br> <br>
                    <hr>
                    <div class="all_users" id="all_users">
                        <label for="">Subject</label>
                        <input required type="text" name="subject" placeholder="ismael@gmail.com">
                        <label for="">Message</label>
                        <textarea required name="message" placeholder="message.."></textarea>
                    </div>
                    <div class="one_user" id="one_user">
                        <label for="">To:</label>
                        <input required type="text" name="subject" placeholder="ismael@gmail.com">
                        <label for="">Subject</label>
                        <input required type="text" name="subject" placeholder="Subject">
                        <label for="">Message</label>
                        <textarea required name="message" placeholder="message.."></textarea>
                    </div>

                    <input class="submit" type="submit" value="Send" name="send" class="btn btn-primary">
                </form>
            </div>
        </div>

    </div>
</body>
<script src="../js/notification.js"></script>

</html>