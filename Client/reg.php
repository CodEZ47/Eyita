<?php include "../header.php"; ?>

<main>
    <?php
    require_once("connect.php");

    $securityQuestionValue = isset($_POST['security_question']) ? $_POST['security_question'] : '';

    if (isset($_POST['submit'])) {
        $emptyusername = $emptyEmail = $emptyPassword = $emptyrePassword = $emptySecurityQuestion = $emptySecurityAnswer = '';

        if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['repassword']) || empty($securityQuestionValue) || empty($_POST['security_answer'])) {
            if (empty($_POST['username']))
                $emptyusername = "<span style='color: red'>* Set your Username</span>";
            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                $emptyEmail = "<span style='color: red'>* Set a valid Email</span>";
            if (empty($_POST['password']))
                $emptyPassword = "<span style='color: red'>* Set Your Password</span>";
            if (empty($_POST['repassword']))
                $emptyrePassword = "<span style='color: red'>* Set The Password Again</span>";
            if (empty($securityQuestionValue))
                $emptySecurityQuestion = "<span style='color: red'>* Select a Security Question</span>";
            if (empty($_POST['security_answer']))
                $emptySecurityAnswer = "<span style='color: red'>* Set Your Security Answer</span>";
        } else {
            if ($_POST['password'] !== $_POST['repassword']) {
                $emptyrePassword = "<span style='color: red'>* Passwords Don't Match</span>";
            } else {
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $status = 0; // Default value
                $security_question = mysqli_real_escape_string($conn, $_POST['security_question']);
                $security_answer = mysqli_real_escape_string($conn, $_POST['security_answer']);

                $sqlCheck = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
                $check = mysqli_query($conn, $sqlCheck);

                if (mysqli_num_rows($check) == 0) {
                    $sqlInsert = "INSERT INTO users (username, email, password, sec_question, sec_answer, status) VALUES ('$username', '$email', '$password', '$security_question', '$security_answer', $status)";
                    $result = mysqli_query($conn, $sqlInsert);

                    if ($result)
                        $successReg = "<span style='color: green'>Registration Successful</span><br>";
                    else
                        $successReg = "<span style='color: red'>Registration Failed!</span><br>";
                } else {
                    $successReg = "<span style='color: red'>Username or Email Already Exists</span><br>";
                }
            }
        }
    }
    ?>
    <h2> Sign Up </h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <?php if (isset($successReg)) echo $successReg; ?>

        <label for="username">Username</label><br>
        <input type="text" name="username" id="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
        <?php echo $emptyusername; ?><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
        <?php echo $emptyEmail; ?><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
        <?php echo $emptyPassword; ?><br>

        <label for="repassword">Re-Password</label><br>
        <input type="password" name="repassword" id="repassword" value="<?php echo isset($_POST['repassword']) ? $_POST['repassword'] : ''; ?>">
        <?php echo $emptyrePassword; ?><br>

        <!-- Modified Security Question Radio Buttons -->
        <label>Security Question</label><br>
        <input type="radio" name="security_question" value="question1" <?php echo ($securityQuestionValue == "question1") ? 'checked' : ''; ?>> What is your mother's maiden name?<br>
        <input type="radio" name="security_question" value="question2" <?php echo ($securityQuestionValue == "question2") ? 'checked' : ''; ?>> What is the name of your first pet?<br>
        <?php echo $emptySecurityQuestion; ?><br>

        <label for="security_answer">Security Answer</label><br>
        <input type="text" name="security_answer" id="security_answer" value="<?php echo isset($_POST['security_answer']) ? $_POST['security_answer'] : ''; ?>">
        <?php echo $emptySecurityAnswer; ?><br>

        <a href="login.php">Login to Your Account</a><br>

        <button type="submit" name="submit">Sign Up</button>
    </form>
</main>