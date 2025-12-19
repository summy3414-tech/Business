<?php
// PHP code for processing the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $studentName = htmlspecialchars($_POST['studentName']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $course = htmlspecialchars($_POST['course']);
    $message = htmlspecialchars($_POST['message']);

    // Configure email settings
    $to = "summy3414.com"; // !! REPLACE with your email address !!
    $subject = "New College Admission Inquiry: $studentName";
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    $emailBody = "A new student has applied for admission.\n\n" .
                 "Name: $studentName\n" .
                 "Email: $email\n" .
                 "Phone: $phone\n" .
                 "Course of Interest: $course\n" .
                 "Additional Message:\n$message\n";

    // Attempt to send the email
   ini_set() in
    if (mail($to, $subject, $emailBody, $headers)) {
        $success = "Application submitted successfully! We will contact you shortly.";
    } else {
        $error = "Sorry, there was an issue sending your application. Please try again later or contact us directly.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Admission Form</title>
    <!-- CSS styles -->
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #666; }
        input[type="text"], input[type="email"], textarea, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { background-color: #5c67f2; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; width: 100%; }
        button:hover { background-color: #4a54e1; }
        .alert-success { background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 15px; }
        .alert-error { background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>College Admission Application</h1>

        <?php
        // Display status messages if they exist
        if (isset($success)) {
            echo '<div class="alert-success">' . $success . '</div>';
        }
        if (isset($error)) {
            echo '<div class="alert-error">' . $error . '</div>';
        }
        ?>

        <!-- HTML form -->
        <form method="POST" action="">
            <div class="form-group">
                <label for="studentName">Full Name</label>
                <input type="text" id="studentName" name="studentName" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="course">Select Course</label>
                <select id="course" name="course" required>
                    <option value="">-- Choose a Course --</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Business Administration">Business Administration</option>
                    <option value="Arts and Humanities">Arts and Humanities</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Additional Message</label>
                <textarea id="message" name="message" rows="4"></textarea>
            </div>
            <button type="submit">Submit Application</button>
        </form>
    </div>
</body>
</html>
