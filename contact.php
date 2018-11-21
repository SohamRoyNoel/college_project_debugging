<?php include "includes/top.php"?>
<?php include "includes/header.php"?>

<div class="container">
    <div class="single">
        <div class="contact_top">
            <h2>Our Addresses</h2>
            <div class="col-sm-4">
                <address class="addr">
                    <p class="secondary3">
                        SDF Building Road, <br>
                        Salt Lake, 700 009.</p>
                    <dl>
                        <dt>Freephone:</dt>
                        <dd>
                            +1 2587 4677 236
                        </dd>
                    </dl>
                    <dl>
                        <dt>Telephone:</dt>
                        <dd>
                            +1 2587 4677 236
                        </dd>
                    </dl>
                    <dl>
                        <dt>FAX:</dt>
                        <dd>
                            +1 2587 4677 236
                        </dd>
                    </dl>
                    <dl class="email">
                        <dt>E-mail:</dt>
                        <dd>
                            <a href="soham.roy.developer@gmail.com">seeking.mail.com</a>
                        </dd>
                    </dl>
                </address>
            </div>
            <div class="col-sm-4">
                <address class="addr">
                    <p class="secondary3">
                        New Town City, <br>
                        Kolkata - 7000001.</p>
                    <dl>
                        <dt>Freephone:</dt>
                        <dd>
                            +1 2587 4677 236
                        </dd>
                    </dl>
                    <dl>
                        <dt>Telephone:</dt>
                        <dd>
                            +1 2587 4677 236
                        </dd>
                    </dl>
                    <dl>
                        <dt>FAX:</dt>
                        <dd>
                            +1 2587 4677 236
                        </dd>
                    </dl>
                    <dl class="email">
                        <dt>E-mail:</dt>
                        <dd>
                            <a href="soham.roy.developer@gmail.com">seeking.mail.com</a>
                        </dd>
                    </dl>
                </address>
            </div>
            <div class="col-sm-4">
                <address class="addr">
                    <p class="secondary3">
                        Ring Road, <br>
                        Bangalore, 748 026.</p>
                    <dl>
                        <dt>Freephone:</dt>
                        <dd>
                            +1 2587 4677 236
                        </dd>
                    </dl>
                    <dl>
                        <dt>Telephone:</dt>
                        <dd>
                            +1 2587 4677 236
                        </dd>
                    </dl>
                    <dl>
                        <dt>FAX:</dt>
                        <dd>
                            +1 2587 4677 236
                        </dd>
                    </dl>
                    <dl class="email">
                        <dt>E-mail:</dt>
                        <dd>
                            <a href="soham.roy.developer@gmail.com">seeking.mail.com</a>
                        </dd>
                    </dl>
                </address>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="content_bottom">
            <h3>Contact Us</h3>


            <?php
            if (isset($_POST['submit'])){
                $name = escape($_POST['name']);
                $phone = escape($_POST['phone']);
                $email = escape($_POST['email']);
                $message = escape($_POST['msg']);

                if (!empty($name) && !empty($phone) && !empty($email) && !empty($message)){

                        $query = "insert into contact (name, email, phone, message) values ('{$name}', '{$email}',  '{$phone}', '{$message}')";
                        $execute = mysqli_query($connection, $query);

                        if (!$execute){
                            echo mysqli_error($connection);
                        }
                }
            }
            ?>

            <form action="" method="post">
                <div class="contact_box1">
                    <input type="text" name="name" maxlength="255" class="text" placeholder="Name"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required>
                    <input type="text" name="email" maxlength="255" class="text" placeholder="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" style="margin-left:3%" required>
                    <input type="text" name="phone" maxlength="10" minlength="10" class="text" placeholder="Phone" onkeypress="return isNumberKey(event)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}" style="margin-left:3%" required>
                </div>
                <script>
                    function isNumberKey(evt){
                        var charCode = (evt.which) ? evt.which : event.keyCode
                        if (charCode > 31 && (charCode < 48 || charCode > 57))
                            return false;
                        return true;
                    }
                </script>
                <div class="text_1">
                    <textarea value="Message" name="msg" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}" required>Message</textarea>
                </div>
                <div class="form-submit1 form_but1">
                    <input name="submit" type="submit" id="submit" value="Submit"><br>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d921.0703104064787!2d88.43097102918348!3d22.568582237478267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0275ad93c8289b%3A0xc099131033eb5917!2sSDF+Building%2C+GP+Block%2C+Sector+V%2C+Salt+Lake+City%2C+Kolkata%2C+West+Bengal+700091!5e0!3m2!1sen!2sin!4v1541188468173" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<div class="footer">
    <div class="" style="margin-left: 460px">
        <p>Copyright © 2018 Seeking . All Rights Reserved . Design by <a href="" target="_blank">PreciousSquad</a> </p>
    </div>
</div>