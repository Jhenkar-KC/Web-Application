<?php
// Include config file
require_once "connection.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = $age = $gender = $phone = "";
$username_err = $password_err = $confirm_password_err = $email_err = $age_err = $gender_err = $phone_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please Enter a username.";
    } else {
        // Prepare a select statement
        $sql = "SELECT email FROM signup_details WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong.Username Error !!!, Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please Enter a email.";
    } else {
        // Prepare a select statement
        $sql =  "SELECT email FROM signup_details WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "This email is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong.Email Error !!!, Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please Enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    //Validate Phone Number
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Please Enter Phone Number.";
    } else {
        // Prepare a select statement
        $sql =  "SELECT email FROM signup_details WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_phone);

            // Set parameters
            $param_phone = trim($_POST["phone"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $phone_err = "This phone number is already exist.";
                } else {
                    $phone = trim($_POST["phone"]);
                }
            } else {
                echo "Oops! Something went wrong.Phone Number Error !!!, Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


    //Validate age
    if (empty(trim($_POST["age"]))) {
        $age_err = "Please Enter your age .";
    } else {
        // Prepare a select statement
        $sql =  "SELECT email FROM signup_details WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_age);

            // Set parameters
            $param_age = trim($_POST["phone"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $age_err = "This phone number is already exist.";
                } else {
                    $age = trim($_POST["phone"]);
                }
            } else {
                echo "Oops! Something went wrong. Age Error !!!, Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }



    //Validate Gender
    if (empty(trim($_POST["gender"]))) {
        $gender_err = "Please Enter your Gender.";
    } else {
        // Prepare a select statement
        $sql =  "SELECT email FROM signup_details WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_gender);

            // Set parameters
            $param_gender = trim($_POST["gender"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);
            } else {
                echo "Oops! Something went wrong.Phone Number Error !!!, Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }








    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err)) {
        // Prepare an insert statement
        $played_on = date('Y-m-d H:i:s');
        $sql = "INSERT INTO signup_details(username,email,password,age,gender,phone,played_on) VALUES ('$username,$email,$password,$age,$gender,$phone,$played_on')";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_email, $param_phone, $param_age, $param_gender);

            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_phone = $phone;
            $param_age = $age;
            $param_gender = $gender;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: index.php");
            } else {
                echo "Something went wrong.Cannot insert data to database Please try again later.";
            }

            // Close statement
        }
    }

    // Close connection
}
?>




<!DOCTYPE html>
<html lang="en">

<body>

    <link rel="stylesheet" href="page1.css">
    <title>
        Login
    </title>

    <div class="navbar">
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="signin.html">Sign in</a></li>
            <li><a href="#about">About Us</a></li>
        </ul>
    </div>

    <head>
        <h4>The Simple Game</h4>
    </head>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>>


            <a><input type="text" placeholder="Enter Username" value="<?php echo $username; ?>"></a>

            <span><?php echo $username_err; ?></span>

        </div>
        <div <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>

            <a><input type="password" placeholder="Enter Password" minlength="8" value="<?php echo $password; ?>"></a>
            <span><?php echo $password_err; ?></span>

        </div>
        <div <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>>


            <a><input type="password" placeholder="Confirm Password" minlength="8" value="<?php echo $confirm_password; ?>"></a>
            <span><?php echo $confirm_password_err; ?></span>

        </div>
        <div <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>>
            <a> <input type="text" placeholder="Enter E-mail" value="<?php echo $email; ?>"></a>
            <span><?php echo $email_err; ?></span>

        </div>
        <div <?php echo (!empty($age_err)) ? 'has-error' : ''; ?>>

            <a> <input type="text" placeholder="Enter Your age" value="<?php echo $age; ?>"></a>
            <span><?php echo $age_err; ?></span>

        </div>
        <div <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>>

            <a> <input type="text" placeholder="Enter Gender" value="<?php echo $gender; ?>"></a>
            <span><?php echo $gender_err; ?></span>

        </div>
        <div <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>>

            <a> <input type="text" placeholder="Enter Phone" maxlength="10" value="<?php echo $phone; ?>"></a>
            <span><?php echo $phone_err; ?></span>

        </div>

        <div class=button>
            <input type="button" value="Submit">
        </div>
    </form>


    <footer>
        <h6>Developed By Jhenkar K C , Vinayak R K , Rohit R</h6>
    </footer>

</body>

</html>