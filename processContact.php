<?php 

    session_start();

    $errors = [];

    // CHECK ELEMENTs FUNCTIONS
    function checkInput($el) {
        global $greske;

        if(!preg_match($el['regex'], $el['value'])) {
            $errors[] = "Valid format: " + $el['example'];
        }
    }

    function checkMsg($el) {
        if($el['value'] == "" || strlen($el['value']) <= 9) {
            $errors[] = $el['error'];
        }
    }

    if(isset($_POST['submitContact'])) {
        $errors = [];

        var_dump($_POST);

        $name = htmlspecialchars($_POST['name']);
        $subject = htmlspecialchars($_POST['subject']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        $regexName = "/^[A-Z][a-z]{2,20}(\s[A-Z][a-z]{3,20}){1,3}$/";
        $regexEmail = "/^[A-z\d\.\-]{5,100}\@[a-z]{2,10}\.[a-z]{2,20}$/";
        $regexSubject = "/^[A-z\d\.\-\s.#]{5,100}$/";

        $values = [
            [
                "type" => "input",
                "value" => $name,
                "regex" => $regexName,
                "example" => "Blake Smith"
            ],
            [
                "type" => "input",
                "value" => $subject,
                "regex" => $regexSubject,
                "example" => "Job offer"
            ],
            [
                "type" => "input",
                "value" => $email,
                "regex" => $regexEmail,
                "example" => "blake32smith@gmail.com"
            ],
            [
                "type" => "textarea",
                "value" => $message,
                "example" => "Message must have at least 10 characters"
            ]

        ];

        foreach ($values as $el) {
            if($el['type'] == "input") {
                checkInput($el);
            } else {
                checkMsg($el);
            }
        }

        if(count($errors) == 0) {

            // PASSED
            $toEmail = "info@alemadic.com";
            $body = "<h2>Contact Request</h2>
                    <h4>Name</h4><p>{$name}</p>
                    <h4>Email</h4><p>{$email}</p>
                    <h4>Message</h4><p>{$message}</p> 
            ";

            // Email Headers
            $headers = "MIME-Version: 1.0" ."\r\n";
            $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

            // Additional Headers
            $headers .= "From: " .$name. "<".$email.">". "\r\n";

            if(mail($toEmail, $subject, $body, $headers)){
                // Email Sent
                $msg = 'Your email has been sent';
                $state = true;
            } else {
                // Failed
                $msg = 'Your email was not sent. Try again later';
                $state = false;
            }

            $_SESSION['msg'] = $msg;
            $_SESSION['state'] = $state;

            header("Location: index.php#contact");
            
        } else {
            $_SESSION['errors'] = $errors;

            header("Location: index.php#contact");
        }

    }
?>