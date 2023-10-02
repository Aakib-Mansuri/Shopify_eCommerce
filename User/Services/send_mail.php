<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if(isset($_POST['Name']) && isset($_POST['Email']) && isset($_POST['query']))
    {
        require '../Mailer/PHPMailer/src/Exception.php';
        require '../Mailer/PHPMailer/src/PHPMailer.php';
        require '../Mailer/PHPMailer/src/SMTP.php';
        require '../Mailer/vendor/autoload.php';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl'; 
            $mail->Port = 465;

            $mail->Username = 'aakibmansuri958@gmail.com';
            $mail->Password = 'kxlbjurefswoisrd';

            $mail->setFrom('aakibmansuri958@gmail.com');
            $mail->addAddress('22002401110035@ljku.edu.in');
            $mail->isHTML(true);
            $mail->Subject = "Inquiry from ".$_POST['Name'];
            $mail->Body = "Name: ".$_POST['Name']."<br>Mail: ".$_POST['Email']."<br><br>".$_POST['query'];

            $mail->send();

            echo "<script>
                    window.location = `../`;
                    alert('mail successfully sended, our team will contact you soon!!');
                    exit();
                  </script>";
        } 
        catch (Exception $e) {
            echo "<script>
                    window.location = `../`;
                    alert('Email sending failed. try after some time!!');
                    exit();
                  </script>";
        }
    }
?>
