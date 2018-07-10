<?php
    require('header.php');
    require('database/Connection.php');
    require('database/QueryBuilder.php');

    $pdo = Connection::make();
    $query = new QueryBuilder($pdo);
    if(isset($_POST['submit']) && !isset($_SESSION['name'])) {
        session_start();
        $name = $_POST['name'];
        $date = date('D h:i a');
        $_SESSION['name'] = $name;
        $query->query("INSERT INTO CHAT (ID, USERNAME, DATE) VALUES (NULL, '$name', '$date')");
    }
?>
    <div class="box">
        <div id="chatbox" class="border border-primary">
            <?php
                $len = sizeof($query->selectAll('CHAT'));
                for ($i=0; $i < $len; $i++) { 
                    $data = $query->selectAll('CHAT')[$i];
                    if(isset($data['MESSAGE']) && $data['MESSAGE'] != '') { 
                        echo "<small class='date'>". $data['DATE'] ."</small>";
                        echo "<div class='msg'><span class='user'>". $data['USERNAME'] ."</span>: ". $data['MESSAGE'] ."</div>";
                    }
                }
            ?>
        </div>

        <form method="post" action="chat.php" class="form-group">
            <input type="text" class="form-control" name="message" id="message" autofocus placeholder="Write you message here...">
            <input type="text" name="ID" value="<?php echo $data['ID'];?>" style="display:none">
            <input type="text" name="USERNAME" value="<?php echo $data['USERNAME'];?>" style="display:none">
            <input type="submit" name="send" id="send" class="btn btn-lg btn-primary btn-block" value="Send">
        </form>
    </div>

<?php
    require('footer.php');
?>