<?php
include "../header.php";

// Include database connection file
require_once("connect.php");

if (isset($_POST['submit'])) {
    $emptyUsername = $emptySecurityQuestion = $emptySecurityAnswer = $emptyNewPassword = '';

    if (empty($_POST['username']) || empty($_POST['security_question']) || empty($_POST['security_answer']) || empty($_POST['new_password'])) {
        // Check for empty fields
        if (empty($_POST['username']))
            $emptyUsername = "<span style='color: red'>* Enter your Username</span>";
        if (empty($_POST['security_question']))
            $emptySecurityQuestion = "<span style='color: red'>* Select your Security Question</span>";
        if (empty($_POST['security_answer']))
            $emptySecurityAnswer = "<span style='color: red'>* Enter your Security Answer</span>";
        if (empty($_POST['new_password']))
            $emptyNewPassword = "<span style='color: red'>* Enter a new Password</span>";
    } else {
        // Sanitize user input
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $securityQuestion = mysqli_real_escape_string($conn, $_POST['security_question']);
        $securityAnswer = mysqli_real_escape_string($conn, $_POST['security_answer']);
        $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

        // Check if the username, security question, and security answer match
        $sqlCheck = "SELECT * FROM users WHERE username = '$username' AND sec_question = '$securityQuestion' AND sec_answer = '$securityAnswer' LIMIT 1";
        $check = mysqli_query($conn, $sqlCheck);

        if (mysqli_num_rows($check) > 0) {
            // Update the password
            $sqlUpdate = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
            $result = mysqli_query($conn, $sqlUpdate);

            if ($result)
                $successReset = "<span style='color: green'>Password Reset Successful</span><br>";
            else
                $successReset = "<span style='color: red'>Password Reset Failed!</span><br>";
        } else {
            $successReset = "<span style='color: red'>Verification Failed. Please check your username, security question, and security answer.</span><br>";
        }
    }
}
?>

<main>
    <h2> Reset Password </h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <?php if (isset($successReset)) echo $successReset; ?>

        <label for="username">Username</label><br>
        <input type="text" name="username" id="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
        <?php echo $emptyUsername; ?><br>

        <label>Security Question</label><br>
        <input type="radio" name="security_question" value="question1" <?php echo ($_POST['security_question'] == "question1") ? 'checked' : ''; ?>> What is your mother's maiden name?<br>
        <input type="radio" name="security_question" value="question2" <?php echo ($_POST['security_question'] == "question2") ? 'checked' : ''; ?>> What is the name of your first pet?<br>
        <?php echo $emptySecurityQuestion; ?><br>

        <label for="security_answer">Security Answer</label><br>
        <input type="text" name="security_answer" id="security_answer" value="<?php echo isset($_POST['security_answer']) ? $_POST['security_answer'] : ''; ?>">
        <?php echo $emptySecurityAnswer; ?><br>

        <label for="new_password">New Password</label><br>
        <input type="password" name="new_password" id="new_password" value="<?php echo isset($_POST['new_password']) ? $_POST['new_password'] : ''; ?>">
        <?php echo $emptyNewPassword; ?><br>

        <a href="login.php">Login to Your Account</a><br>

        <button type="submit" name="submit">Reset Password</button>
    </form>
</main>