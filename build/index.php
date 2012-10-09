<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
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
            $emailTo = "apprentices@freshtilledsoil.com";
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
                echo 'not sent';
            }
        
        } else {
    ?>
        <section id="main_content">
            <header>
                <h1>Sign up for Whoo!</h1>
                <h2>50 projects, 500 images, 10 videos, domain building, and techincal support.</h2>
            </header>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                
                <article id="portfolio_info">
                    <div id="number_1">
                        1
                    </div>
                    <h1>First, name your portfolio</h1>

                    <label for="portfolio">Portfolio title</label>
                    <input type="text" id="portfolio" name="portfolio" minlength="2"/>

                    <label for="website">Portfolio address</label>
                    <input type="text" id="website" name="website" minlength="2"/>
                </article> <!--portfolio_info-->

                <article id="account_details">
                    <div id="number_2">
                        2
                    </div>
                    <h1>Now, enter your account details</h1>

                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" minlength="2"/>
                    
                    <label for="name">E-mail</label>
                    <input type="email" id="email" name="email" minlength="2"/>

                    <label for="user_password">Password</label>
                    <input type="password" id="user_password" name="user_password" minlength="6"/>
                </article> <!--portfolio_info-->
                
                <article id="payment_info">
                    <div id="number_3">
                        3
                    </div>
                    <h1>Finally, enter your payment information</h1>

                    <label for="credit_card">Card number</label>
                    <input type="text" id="credit_card" name="credit_card"/>

                    <div id="credit_card_logos">
                    </div> <!--credit_card_logos-->

                    <label for="security_code">Security code</label>
                    <input type="text" id="security_code" name="security_code" minlength="3"/>

                    <label for="expiration">Expiration date</label>
                    <select name="expiration" id="expiration">
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
                    <select name="year" id="year">
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
                </article> <!--payment_info-->

                <button type="submit" name="send">Create your portfolio</button>
                
            </form>
        </section> <!--main_content-->
    <?php
        }
    ?>

</body>
</html>
