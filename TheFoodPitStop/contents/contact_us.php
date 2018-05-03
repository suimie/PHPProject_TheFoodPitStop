<?php
/**
 * contact_us.php
 * 
 * content for the contact us page
 * 
 * @version 1.0 2018-04-19
 * @package The Food Pit Stop
 * @copyright (c) 2018, Anita Mirshahi, Suim Park, Valini Rangasamy
 * @license 
 * @since Release 1.0
 */
include 'contents/contact_us_process.php';
?>
<style>
    .error{
        color:red;
        text-align: center;
        padding-top: 10px;
        font-weight: bolder;
    }
    .success{
        color:#608E3A;
        text-align: center;
        padding-top: 10px;
        font-weight: bolder;
    }
</style>
<main class="page contact-us-page">
    <section class="clean-block clean-form dark" style="background-color:rgba(184,156,132,0.28);">
        <div class="container">
            <div class="block-heading" style="margin-top:-38px;">
                <h1 style="color:#608e3a;">
                    <?php
                    global $lang_cookie;
                    if ($lang_cookie == "FR")
                        echo 'Contactez-nous';
                    else
                        echo 'Contact Us';
                    ?>
                </h1>
                <p>
                    <?php
                    global $lang_cookie;
                    if ($lang_cookie == "FR")
                        echo "Contactez-nous dès aujourd'hui et nous nous engageons à vous répondre dans un délai de 24h!";
                    else
                        echo 'Contact us today, and get reply with in 24 hours!';
                    ?>
                </p>
            </div>
            <form style="border-top:2px solid #608e3a;" action="index.php?content=contact_us" method="POST">
                <?php if (isset($_SESSION['isError'])): ?>
                    <div class="alert alert-warning" style="background-color: #fff; border: none;">
                        <label class="error">
                            <?php
                            global $lang_cookie;
                            if ($lang_cookie == "FR")
                                echo $_SESSION['erreur'];
                            else
                                echo $_SESSION['error'];
                            ?>
                        </label>
                    </div>
                <?php elseif (isset($_SESSION['isSuccess'])) : ?>
                    <div class="alert alert-warning" style="background-color: #fff; border: none;">
                        <label class="success">
                            <?php
                            global $lang_cookie;
                            if ($lang_cookie == "FR")
                                echo $_SESSION['success_fr'];
                            else
                                echo $_SESSION['success'];
                            ?>
                        </label>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="name">
                        <?php
                        global $lang_cookie;
                        if ($lang_cookie == "FR")
                            echo 'Nom';
                        else
                            echo 'Name';
                        ?>
                    </label>
                    <input name="name" id="name" class="form-control" type="text" placeholder="<?php
                    global $lang_cookie;
                    if ($lang_cookie == "FR")
                        echo 'Votre nom';
                    else
                        echo 'Your name';
                    ?>" autofocus <?php
                           if (isset($_SESSION['username']))
                           {
                               echo 'value="' . $_SESSION['username'] . '"';
                           }
                           ?>>
                </div>
                <!--span class="error" style="color: red;"><!--?= $name_error ?></span-->
                <div class="form-group">
                    <label for="subject">
                        <?php
                        global $lang_cookie;
                        if ($lang_cookie == "FR")
                            echo 'Sujet';
                        else
                            echo 'Subject';
                        ?>
                    </label>
                    <input name="subject" id="subject" class="form-control" type="text" placeholder="<?php
                    global $lang_cookie;
                    if ($lang_cookie == "FR")
                        echo "Votre sujet est...";
                    else
                        echo "Subject is...";
                    ?>" >
                </div>
                <!--span class="error"><!--?= $subject_error ?></span-->
                <div class="form-group">
                    <label for="email">
                        <?php
                        global $lang_cookie;
                        if ($lang_cookie == "FR")
                            echo 'Courriel';
                        else
                            echo 'Email';
                        ?>
                    </label>
                    <input name="email" id="email" class="form-control" type="text" placeholder="<?php
                    global $lang_cookie;
                    if ($lang_cookie == "FR")
                        echo "Votre adresse e-mail";
                    else
                        echo "Your Email Address";
                    ?>" <?php
                           if (isset($_SESSION['myemail']))
                           {
                               echo 'value="' . $_SESSION['myemail'] . '"';
                           }
                           ?>>
                </div>
                <!--span class="error"><!--?= $email_error ?></span-->
                <div class="form-group">
                    <label for="message">
                        <?phpglobal $lang_cookie; if ($lang_cookie == "FR") {echo 'Message';} else{echo 'Message'; }?>
                    </label>
                    <textarea name="message" id="message" class="form-control" 
                        placeholder="<?php global $lang_cookie; if ($lang_cookie == "FR"){ echo 'Tapez votre message ici ....';} else{echo 'Type your Message Here ....';}?>">
                    </textarea>
                </div>
                <div class="form-group">
                    <button name="submit" class="btn btn-primary btn-block" type="submit" style="background-color:#608e3a;">
                        <?php
                        global $lang_cookie;
                        if ($lang_cookie == "FR")
                        {
                            echo "Envoyez";
                        } else
                        {
                            echo "Send";
                        }
                        ?>
                    </button>
                </div>
                <!--div class="success"><!--?= $success ?></div-->
            </form>
        </div>
    </section>
</main>
