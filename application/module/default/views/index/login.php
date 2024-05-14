<?php
$linkAction = URL::createLink("default", "index", "login");
$linkAdmin = URL::createLink("admin", "index", "login");
?>

<div id="border-top" class="h_blue">
    <span class="title"><a href="index.php">User</a></span>
</div>
<div id="content-box">
    <div id="element-box" class="login">
        <div class="m wbg">
            <h1 class="login-h1">Default Login</h1>
            <!-- ERROR -->
            <?php echo $this->errors; ?>

            <div id="section-box">
                <div class="m">
                    <form action="<?php echo $linkAction ?>" method="post" id="form-login">
                        <fieldset class="loginform">
                            <label>User Name</label>
                            <input name="form[username]" id="mod-login-username" type="text" class="inputbox" size="15" />

                            <label id="mod-login-password-lbl" for="mod-login-password">Password</label>
                            <input name="form[password]" id="mod-login-password" type="password" class="inputbox" size="15" />

                            <input name="form[token]" type="hidden" value="<?php echo time(); ?>" />


                            <div class="button-holder">
                                <div class="button1">
                                    <div class="next">
                                        <a href="#" onclick="document.getElementById('form-login').submit();">Log in</a>
                                    </div>
                                </div>
                            </div>
                            <div class="clr"></div>
                        </fieldset>
                    </form>
                    <div class="clr"></div>
                </div>
            </div>

            <p class="login-p">Use a valid username and password to gain access to the user control panel.</p>
            <p class="login-p"><a class="login-link" href="<?php echo $linkAdmin ?>">Go to administrator login.</a></p>
            <div id="lock"></div>
        </div>
    </div>
</div>