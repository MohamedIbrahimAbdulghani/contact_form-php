<?php

    // check if user coming from a request

    if($_SERVER["REQUEST_METHOD"] == "POST" ) {
        // Assign Variables
        // To Make Filter To Can't User Edit From My Code Or In The Content Of The Form
        $user = filter_var($_POST["username"], FILTER_SANITIZE_STRING); 
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST["cellphone"], FILTER_SANITIZE_NUMBER_INT);
        $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);



        // creating array of errors

        $formErrors = array();

        if(strlen($user) <= 3) {
            $formErrors[] = "username must be larger than <strong>3</strong> characters ";
        }

        if(strlen($message) < 10) {
            $formErrors[] = "message can't be less than <strong>10</strong> characters ";
        }
        
        if(strlen($phone) > 11) {
            $formErrors[] = "phone must be <strong>11</strong> characters ";
        } elseif(strlen($phone) < 11) {
            $formErrors[] = "phone must be <strong>11</strong> characters ";
        }

        // If No Error Send The Email [ mail(To, Subject, Message, Headers, Parameters) ]

        $headers = "From: " . $email . "\r\n";
        $myEmail = "mohamedibrahimabdulghani@gmail.com";
        $subject = "Contact Form";
        if(empty($formErrors)) {
            // mail($myEmail, $subject, $message, $headers);

            $user = "";
            $email = "";
            $phone = "";
            $message = "";

            $success = "<div class='alert alert-success alert-dismissible' role='start'>We Have Received Your Message 
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&family=Raleway:ital,wght@0,700;0,900;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Contact-Form</title>
</head>
<body>
    <!-- Start Form -->
    <div class="container">
        <h1>Contact Me</h1>
        <div class="row">
            <div class="col-md-6 col-sm-12">
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" class="contact-form">
            <?php  if(!empty($formErrors)) {  ?>
                <div class="alert alert-danger alert-dismissible" role="start">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php
                            foreach($formErrors as $error){
                                echo $error . "<br>";
                        }
                    ?> 
                </div>
            <?php } ?>

            <?php if(isset($success)) {echo $success;}?>

        <div class="mb-3">
            <input 
                    type="text" 
                    name="username" 
                    placeholder="Enter Your Username" 
                    class="form-control username" 
                    value="<?php if(isset($user)) {echo $user;} ?>">
            <i class="fa fa-user fa-fw"></i>
            <span class="istraxs">*</span>
            <div class="alert alert-danger custom-alert">
                username must be larger than <strong>3</strong> characters
            </div>
        </div>
        <div class="mb-3">
            <input 
                    type="email"    
                    name="email" 
                    placeholder="Please Enter a Valid Email" 
                    class="form-control email"  
                    value="<?php if(isset($email)) {echo $email;} ?>">
            <i class="fa-solid fa-envelope fa-fw"></i>
            <span class="istraxs">*</span>
            <div class="alert alert-danger custom-alert">
                you must enter the email
            </div>
        </div>
        <div class="mb-3">
            <input 
                    type="text" 
                    name="cellphone" 
                    placeholder="Enter Your Cell Phone" 
                    class="form-control phone" 
                    value="<?php if(isset($phone)) {echo $phone;} ?>">
            <i class="fa-solid fa-phone-flip fa-fw"></i>
            <span class="istraxs">*</span>
            <div class="alert alert-danger custom-alert">
                phone must be <strong>11</strong> characters
            </div>
        </div>
        <div class="mb-3">
            <textarea 
                    type="text" 
                    name="message" 
                    placeholder="Enter Your Message !"  <?php if(isset($message)) {echo $message;} ?>   
                    class="form-control message" ></textarea>
            <span class="istraxs">*</span>
            <div class="alert alert-danger custom-alert">
                message can't be less than <strong>10</strong> characters
            </div>
        </div>
        <button type="submit" class="btn btn-success">Send Message</button>
        <i class="fa-solid fa-paper-plane send fa-fw"></i>
        </form>
            </div>
            <div class="col-md-6 d-none d-md-block">
                <img src="118-1188847_cut-out-students-group-sitting-and-working-students.png" style="width: 100%;">
            </div>
        </div>
    </div>
    <!-- End Form -->

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>