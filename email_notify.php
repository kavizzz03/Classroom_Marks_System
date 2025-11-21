<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendMail($student_id){
    include "db.php";

    // Get student
    $stu = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * FROM students WHERE id='$student_id'")
    );

    $email = $stu['email'];
    $name = $stu['name'];

    // Create mail object
    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;

        // NO-REPLY EMAIL ACCOUNT
        $mail->Username   = 'yakacrew2025@gmail.com';  // your no-reply email
        $mail->Password   = 'wfgj qrwj kuss jgvz';     // Gmail App Password

        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender details
        $mail->setFrom('noreply.classroom@gmail.com', 'No-Reply | Classroom Marks System');

        // Disable replies
        $mail->addReplyTo('noreply.classroom@gmail.com', 'No Reply');

        // Receiver
        $mail->addAddress($email, $name);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = "🎉 New Exam Result Released!";

        // Construct HTML email
        $mail->Body = "
        <div style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
            <div style='text-align: center; padding: 20px; background: #0d6efd; color: white; border-radius: 8px 8px 0 0;'>
                <h2>📊 Classroom Marks System</h2>
            </div>

            <div style='padding: 20px; background: #f9f9f9; border-radius: 0 0 8px 8px;'>
                <p>Hello <b>$name</b>,</p>
                <p>We are excited to inform you that a <b>new exam result</b> has been uploaded to your account.</p>

                <p>Check your marks and papers via the following links:</p>

                <div style='margin: 20px 0; text-align: center;'>
                    <a href='https://class.cpsharetxt.com/student_login.php' 
                        style='text-decoration: none; background-color: #0d6efd; color: white; padding: 12px 25px; border-radius: 5px; display: inline-block; margin: 5px;'>
                        View as Student
                    </a>
                    <a href='https://class.cpsharetxt.com/parent_login.php' 
                        style='text-decoration: none; background-color: #198754; color: white; padding: 12px 25px; border-radius: 5px; display: inline-block; margin: 5px;'>
                        Parent View
                    </a>
                </div>

                <p style='font-size: 14px; color: #555;'>This is an automated <b>no-reply</b> email. Please do not reply.</p>

                <hr style='border: none; border-top: 1px solid #ddd;'>

                <p style='text-align: center; font-size: 14px; color: #666;'>
                    &copy; ".date('Y')." Team Alpha Software Solutions - Kavindu Bogahawatte
                </p>
            </div>
        </div>
        ";

        // Send email
        $mail->send();
        return true;

    } catch (Exception $e) {
        return false;
    }
}
?>
