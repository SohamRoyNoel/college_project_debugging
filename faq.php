<?php include "includes/top.php"?>
<?php include "includes/header.php"?>

<div class="container">
    <div class="single">
        <?php include "includes/sidebar.php"?>
        <div class="col-md-8">
            <div class="col_1">
                <?php
                if (isset($_POST['ask'])){
                    $qus = $_POST['question'];

                    $query = "insert into faq_question(question) values ('{$qus}')";
                    $execute = mysqli_query($connection, $query);

                    if (!$execute){
                        die(mysqli_error($connection));
                    }

                    header("Location: faq.php");
                }
                ?>
                <h3 style="font-family: 'Comic Sans MS'; color: #2185C5">Ask A Question</h3>
                <form action="" method="post">
                    <div class="row">
                        <div class="form-actions floatRight">
                            <textarea style="width: 50px" id="myeditor" name="question" id="myeditor"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-actions">
                            <input type="submit" value="Ask Now!" name="ask" class="btn btn-primary btn-sm">
                        </div>
                    </div>
                </form>
                <script type="text/javascript">
                    CKEDITOR.replace('myeditor');
                </script>
                <br>

                <style>
                    .collapsible {
                        background-color: #dbdbdb;
                        color: white;
                        cursor: pointer;
                        padding: 18px;
                        width: 100%;
                        border: none;
                        text-align: left;
                        outline: none;
                        font-size: 15px;
                    }

                    .active, .collapsible:hover {
                        background-color: #00aced;
                    }

                    .content {
                        padding: 0 18px;
                        display: none;
                        overflow: hidden;
                        background-color: #f1f1f1;
                    }
                </style>
                <h2>Frequently Asked Questions</h2>
                <?php
                if (isset($_POST['rep'])){
                    $rep = $_POST['reply'];
                    $quids = $_POST['hid'];
                    if (!empty($rep)){
                        $qurs = "insert into faq_reply(qid, reply) values ('{$quids}', '{$rep}')";
                        $execs = mysqli_query($connection, $qurs);

                        if (!$execs){
                            echo mysqli_error($connection);
                        }
                    }
                    header("Location: faq.php");
                }
                ?>

                <?php
                $qury = "select * from faq_question";
                $exec = mysqli_query($connection, $qury);

                $flag = 1;

                while ($row = mysqli_fetch_assoc($exec)){
                    $id = $row['id'];
                    $qus = $row['question'];


                    ?>

                    <button class="collapsible"><b><i style="color: black"><?php echo $qus; ?></i></b></button>
                    <div class="content">
                        <?php
                        $q = "select * from faq_reply";
                        $e = mysqli_query($connection, $q);

                        while ($r = mysqli_fetch_assoc($e)){
                            $qids = $r['qid'];
                            $rep = $r['reply'];


                            if ($id == $qids){

                                ?>
                                <p>
                                <div style="margin-top: 4px" class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><?php echo $rep ? $rep : "No replies yet"; ?></h3>
                                    </div>
                                </div>
                                </p>
                                <?php
                            }

                            if ($qids == null) {
                                ?>
                                <p>
                                <div style="margin-top: 4px" class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><?php echo "No replies yet"; ?></h3>
                                    </div>
                                </div>
                                </p>
                                <?php
                            }
                        }
                        ?>
                        <p>
                        <form action="" method="post">
                            <textarea class="form-control" style="margin-bottom: 5px; margin-top: 5px" cols="85" rows="3" name="reply"></textarea>

                            <input type="hidden" name="hid" value="<?php echo $id?>">

                            <input type="submit" value="Reply Now!" name="rep" class="btn btn-primary btn-sm"><br><br>
                        </form>
                        </p>
                    </div>
                <?php } ?>
                <script>
                    var coll = document.getElementsByClassName("collapsible");
                    var i;

                    for (i = 0; i < coll.length; i++) {
                        coll[i].addEventListener("click", function() {
                            this.classList.toggle("active");
                            var content = this.nextElementSibling;
                            if (content.style.display === "block") {
                                content.style.display = "none";
                            } else {
                                content.style.display = "block";
                            }
                        });
                    }
                </script>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="footer">
    <div class="" style="margin-left: 460px">
        <p>Copyright © 2018 Seeking . All Rights Reserved . Design by <a href="" target="_blank">PreciousSquad</a> </p>
    </div>
</div>
