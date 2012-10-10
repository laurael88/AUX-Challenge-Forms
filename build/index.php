<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Kreon:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>AUX Forms Challenge</title>
</head>

<body>

    <?php
        // if the form has been submitted, process it - otherwise, just display the form normally
        if(isset($_POST['send'])){
            
            // pull the name out of the submitted for
            $name = strip_tags($_POST['name']);
            
            // pull the email out of the submitted form
            $emailFrom = strip_tags($_POST['email']);
            
            // who you're sending the email to (probably change this)
            $emailTo = "laura.lozano@freshtilledsoil.com";
            $subject = "Submission";
            
            // inset information into the body of the email
            $body = "Name: ".$name."\n";
            $body .= "Email: ".$emailFrom."\n";
            
            // set the email headers
            $headers = "From: ".$emailFrom."\n";
            $headers .= "Reply-To:".$emailFrom."\n";	
            
            $success = mail($emailTo, $subject, $body, $headers);
            
            // this is the message that gets displayed after submission
            if ($success){
                echo 'sent';
            } else {
                echo 'Opps! Looks like we encountered a problem with your form.';
            }
        
        } else {
    ?>
        <section id="main_content">
            <header>
                <h1>Sign up for Whoo!</h1>
                <h2>50 projects, 500 images, 10 videos, domain building, and techincal support.</h2>
            </header>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="portfolio_form">
                
                <fieldset id="portfolio_info">
                    <div id="number_1">
                        1
                    </div>
                    <legend>First, name your portfolio</legend>
                    <div class="clear"></div> <!--clear-->

                    <div class="gray_container">
                        <label for="portfolio">Portfolio title</label>
                        <input type="text" id="portfolio" class="required" name="portfolio" minlength="2"/>

                        <label for="website" class="heading_label">Portfolio address</label>
                        <input type="text" id="website" class="required" name="website"/>
                    </div> <!--gray_container-->
                </fieldset> <!--portfolio_info-->

                <fieldset id="account_details">
                    <div id="number_2">
                        2
                    </div>
                    <legend>Now, enter your account details</legend>
                    <div class="clear"></div> <!--clear-->

                    <div class="gray_container">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="required" name="name" minlength="2"/>
                        
                        <label for="name" class="heading_label">E-mail</label>
                        <input type="email" id="email" class="required" name="email" minlength="2"/>
                        <aside>NOTE: We'll never share your email, promise.</aside>

                        <label for="user_password" class="heading_label">Password</label>
                        <input type="password" id="user_password" class="required" name="user_password" minlength="6"/>
                    </div> <!--gray_container-->
                </fieldset> <!--portfolio_info-->
                
                <fieldset id="payment_info">
                    <div id="number_3">
                        3
                    </div>
                    <legend>Finally, enter your payment information</legend>
                    <div class="clear"></div> <!--clear-->

                    <div class="gray_container">

                        <div id="credit_card_logos">
                        </div> <!--credit_card_logos-->

                        <label for="credit_card">Card number</label>
                        <input type="text" id="credit_card" class="required" name="credit_card"/>

                        <div class="clear"></div> <!--clear-->

                        <div id="security_img">
                        </div> <!--credit_card_logos-->

                        <label for="security_code" class="heading_label">Security code</label>
                        <input type="text" id="security_code" class="required" name="security_code" minlength="3"/>

                        <div class="clear"></div> <!--clear-->

                        <label for="expiration" class="heading_label">Expiration date</label>
                        <select name="expiration" id="expiration" class="required">
                            <option>Month</option>
                            <option>December</option>
                            <option>November</option>
                            <option>October</option>
                            <option>September</option>
                            <option>August</option>
                            <option>July</option>
                            <option>June</option>
                            <option>May</option>
                            <option>April</option>
                            <option>March</option>
                            <option>February</option>
                            <option>January</option>
                        </select>
                        <select name="year" id="year" class="required">
                            <option>Year</option>
                            <option>2020</option>
                            <option>2019</option>
                            <option>2018</option>
                            <option>2017</option>
                            <option>2016</option>
                            <option>2015</option>
                            <option>2014</option>
                            <option>2013</option>
                            <option>2012</option>
                        </select>
                        
                        <div id="locked"></div><!--locked-->
                    </div> <!--gray_container-->
                </fieldset> <!--payment_info-->

                <button type="submit" name="send">Create your portfolio</button>
                
            </form>
        </section> <!--main_content-->
    <?php
        }
    ?>

    <script src="assets/js/lib/jquery.js" type="text/javascript"></script>
    <script src="assets/js/lib/jquery.validate.js" type="text/javascript"></script>
    <script src="assets/js/script.js" type="text/javascript"></script>
</body>
</html>
