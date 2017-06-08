<?php 
    $errors = [];
    $missing = [];
    if (isset($_POST['send'])) {
        $expected = ['name','email','phone','make','model','year','customer','comments'];
        $required = ['name','email','phone','customer','comments'];
        $to = 'WWH <waynehite@yahoo.com>'
        $subject = 'Service inquiry from ' . $name . '.';
        // To send HTML mail, the Content-type header must be set
        $headers = [];
        $headers[] = 'From: Hite Autobody & Restoration Site Visitor <hiteauto@hiteautobodyandrestoration.com>';
        // $headers[] = 'Reply-To: ' . $email;
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';
        // $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $authorized = '-fwaynehite@yahoo.com';

/*
$message = '<html><body style="background-color:rgba(0,0,0,0.05);width:100%;padding:5px;">';
$message .= '<div style="margin:0 auto;text-align:center;background-color:rgba(224,224,224,0.05);">';
$message .= '<img style="text-align:center;width:100%;max-width:375px;height:auto;margin:0 auto;" src="http://www.hiteautobodyandrestoration.com/qa/qa/public/images/logos/hite-footer-logo.svg" alt="Hite Autobody and Restoration">';
$message .= '<h2 style="text-align:center;background:rgba(0,0,0,0.05);border-bottom:1px solid #e0e0e0;padding:5px;font-size:110%;">Customer Form Data</h2>';
$message .= '<table style="text-align:left;margin:0 auto;width:100%;max-width:575px;">';
$message .= '<tr style="background:rgba(0,0,0,0.02);line-height:175%;"><td style="border:1px solid #e0e0e0;padding:5px;"><strong>Name:</strong></td><td style="border:1px solid #e0e0e0;padding:5px;">' . strip_tags($_POST['name']) . '</td></tr>';
$message .= '<tr style="background:rgba(0,0,0,0.05);line-height:175%;"><td style="border:1px solid #e0e0e0;padding:5px;"><strong>Email:</strong></td><td style="border:1px solid #e0e0e0;padding:5px;">' . strip_tags($_POST['email']) . '</td></tr>';
$message .= '<tr style="background:rgba(0,0,0,0.02);line-height:175%;"><td style="border:1px solid #e0e0e0;padding:5px;"><strong>Phone:</strong></td><td style="border:1px solid #e0e0e0;padding:5px;">' . strip_tags($_POST['phone']) . '</td></tr>';
$message .= '<tr style="background:rgba(0,0,0,0.05);line-height:175%;"><td style="border:1px solid #e0e0e0;padding:5px;"><strong>Make:</strong></td><td style="border:1px solid #e0e0e0;padding:5px;">' . strip_tags($_POST['make']) . '</td></tr>';
$message .= '<tr style="background:rgba(0,0,0,0.02);line-height:175%;"><td style="border:1px solid #e0e0e0;padding:5px;"><strong>Model:</strong></td><td style="border:1px solid #e0e0e0;padding:5px;">' . strip_tags($_POST['model']) . '</td></tr>';
$message .= '<tr style="background:rgba(0,0,0,0.05);line-height:175%;"><td style="border:1px solid #e0e0e0;padding:5px;"><strong>Year:</strong></td><td style="border:1px solid #e0e0e0;padding:5px;">' . strip_tags($_POST['year']) . '</td></tr>';
$message .= '<tr style="background:rgba(0,0,0,0.02);line-height:175%;"><td style="border:1px solid #e0e0e0;padding:5px;"><strong>Customer:</strong></td><td style="border:1px solid #e0e0e0;padding:5px;">' . strip_tags($_POST['customer']) . '</td></tr>';
$message .= '<tr style="background:rgba(0,0,0,0.05);line-height:175%;"><td style="border:1px solid #e0e0e0;padding:5px;"><strong>Comments:</strong></td><td style="border:1px solid #e0e0e0;padding:5px;">' . strip_tags($_POST['comments']) . '</td></tr>';
$message .= '</table>';
$message .= '</div>';
$message .= '</body></html>';

'<h3>Hello, ' . $name . '.</h3>' . '<h4>Thank you for contacting Hite Autobody & Restoration!</h4>' . '<h4>We have received your message and will reply as soon as possible.</h4>' : '<h4>Sorry, your mail has not sent. Please try again.</h4>';
*/      

        
        require './includes/process_mail.php';

        if ($mailSent) {
            header('Loacation: thanks.php');
            exit;
        }
    }
?>



<!DOCTYPE html>
<html>
    <head>
        <style>
            .hint {
                color: red; 
                font-size: 75%;
            }
            span.required {
                 padding: 0 3px;          
            }
            .warning {
                color: orangered;
                font-weight: bold;
            }
        </style>
    </head>
    <body>

    <?php if ($_POST && ($suspect || isset($errors['mailfail']))) : ?>
        <p>Sorry, your mail couldn't be sent.</p>
    <?php endif; ?>

    <?php elseif ($errors || $missing) : ?> 
        <p class="warning">Please fix the item(s) indicated.</p>
    <?php endif; ?>

        <br /><br />        
        <form id="contactForm" name="contactUsForm" method="POST" enctype="application/x-www-form-urlencoded" action="#">
    
            <label for="name">Name<span class="required">*</span></label>
            <input tabindex="1" type="text" name="name" id="name" placeholder="Your first and last name" required 
                
                <?php 
                if ($errors || $missing) {
                    echo 'value="' . htmlentities($name) . '"';
                }
                ?>
            
            /> <!-- closes input tag. The PHP code inside input tag preserves user input when a form is incomplete. -->
            <span id="nameHint" class="hint"></span>
            
            <!-- Makes sure required fields are not blank. -->
            <?php if ($missing && in_array('name', $missing)) : ?>        
                <span class="warning">Please enter your full name.</span>
            <?php endif; ?>

            <br /><br />

            <label for="email">Email<span class="required">*</span></label>
            <input tabindex="2" type="email" name="email" id="email" placeholder="Your email address" required 
            
                <?php 
                if ($errors || $missing) {
                    echo 'value="' . htmlentities($email) . '"';
                }
                ?>
            
            /> <!-- closes input tag. The PHP code inside input tag preserves user input when a form is incomplete. -->
            <span id="emailHint" class="hint"></span>

            <!-- Makes sure required fields are not blank. -->
            <?php if ($missing && in_array('email', $missing)) : ?>        
                <span class="warning">Please enter your email address.</span>
                <?php elseif (isset($errors['email'])) : ?>
                <span class="warning">Invalid email address</span>
            <?php endif; ?>

            <br /><br />

            <label for="phone">Phone<span class="required">*</span></label>
            <input tabindex="3" type="tel" name="phone" id='phone' maxlength="14" onkeypress="return isNumberKey(event)" placeholder="Your phone number" required 
            
                <?php 
                if ($errors || $missing) {
                    echo 'value="' . htmlentities($phone) . '"';
                }
                ?>
            
            /> <!-- closes input tag. The PHP code inside input tag preserves user input when a form is incomplete. -->
            <span id="phoneHint" class="hint"></span>

            <!-- Makes sure required fields are not blank. -->
            <?php if ($missing && in_array('phone', $missing)) : ?>        
                <span class="warning">Please enter your phone number.</span>
            <?php endif; ?>

            <br /><br />

            <label for="make">Make</label>
            <input tabindex="4" type="text" name="make" id="make" placeholder="Make of your vehicle" />

            <br /><br />

            <label for="model">Model</label>
            <input tabindex="5" type="text" name="model" id="model" placeholder="Model of your vehicle" />

            <br /><br />

            <label for="year">Year</label>
            <input tabindex="6" type="text" name="year" id="year" pattern="\d{4}" maxlength="4" onkeypress="return isNumberKey(event)" placeholder="Year of your vehicle"/>

            <br /><br />

            <label for="customer">Customer Type<span class="required">*</span></label><br />
            <input tabindex="7" value="New customer" type="radio" name="customer" id="customer" placeholder="Select one option." required />New Customer<br/>
            <input tabindex="8" value="Returning customer" type="radio" name="customer" id="customer" placeholder="Select one option." required />Returning Customer

            <!-- Makes sure required fields are not blank. -->
            <?php if ($missing && in_array('customer', $missing)) : ?>        
                <span class="warning">Please enter your customer status.</span>
            <?php endif; ?>

            <br /><br />

            <label for="comments">Comments<span class="required">*</span></label>
            <textarea tabindex="9" name="comments" id="comments" type="text" placeholder="Provide your comments" required>
                <?php 
                if ($errors || $missing) {
                    echo htmlentities($comments);
                }
                ?>
            </textarea><!-- The PHP code inside textarea tags preserves user input when a form is incomplete. Putting PHP code between the textarea tags prevents additional unwanted spacing withing text field -->

            <!-- Makes sure required fields are not blank. -->
            <?php if ($missing && in_array('comments', $missing)) : ?>        
                <span class="warning">Please provide your comments.</span>
            <?php endif; ?>

            <br /><br />

            <input tabindex="10" type="submit" value="Send" />
            <input tabindex="11" type="reset" value="Clear" />
        
        </form>


        <!-- JQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

        <script>
           
            // Name field hint
                document.contactUsForm.name.onfocus=function() {
                document.getElementById('nameHint').innerHTML = "Please enter your first and last name.";
            }

             document.contactUsForm.name.onblur=function() {
                document.getElementById('nameHint').innerHTML = "";
            }

             // Email field hint
            document.contactUsForm.email.onfocus=function() {
                document.getElementById('emailHint').innerHTML = "Please enter you email address.";
            }

             document.contactUsForm.email.onblur=function() {
                document.getElementById('emailHint').innerHTML = "";
            }

            // Phone field hint
           document.contactUsForm.phone.onfocus=function() {
                document.getElementById('phoneHint').innerHTML = "Please enter you phone number.";
            }

             document.contactUsForm.phone.onblur=function() {
                document.getElementById('phoneHint').innerHTML = "";
            }

            // Reg expression for phone number with parentheses and dash.
            $("#phone").on("change keyup paste", function () {
                var output;
                var input = $("#phone").val();
                input = input.replace(/[^0-9]/g, '');
                var area = input.substr(0, 3);
                var pre = input.substr(3, 3);
                var tel = input.substr(6, 4);
                if (area.length < 3) {
                    output = "(" + area;
                } else if (area.length == 3 && pre.length < 3) {
                    output = "(" + area + ")" + " " + pre;
                } else if (area.length == 3 && pre.length == 3) {
                    output = "(" + area + ")" + " " + pre + "-" + tel;
                }
                $("#phone").val(output);
            });

            // Prevent numbers in full name field.
            function preventNumberInput(e) {
                var keyCode = (e.keyCode ? e.keyCode : e.which);
                if (keyCode > 47 && keyCode < 58) {
                    e.preventDefault();
                }
            }
            
            $(document).ready(function() {
                $('#name').keypress(function(e) {
                    preventNumberInput(e);
                });
            });

            // Allow only numbers in year field.
            function isNumberKey(evt){
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }


        </script>
        <!-- Test block which will need to be removed when uploaded to server -->    
        <pre>
            <?php
                if ($_POST && $mailSent) {
                    echo "Message \n\n";
                    echo htmlentities($message);
                    echo "Headers: \n\n";
                    echo htmlentities($headers);
                }
            ?>
        </pre>    
    </body>
</html>