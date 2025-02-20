<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="studentRegLog.css">
</head>
<body>
    <div class="main">
        <div class="container" id="form-container">
            <!-- Login Form -->
            <div id="login-form" style="display: block;">
                <h2>Student Login</h2>
                <form action="studentLogin.php" method="post" >
                    <label for="loginUsername">Email</label>
                    <span style="color: red;"></span>
                    <input type="text" name="loginUsername" placeholder="SamAsh123@gmail.com">

                    <label for="loginPassword">Password</label>
                    <span style="color: red;" ></span>
                    <input type="password" name="loginPassword" placeholder="Password">

                    <button type="submit" name="login">Login</button>
                </form>
                <p class="toggle-link" onclick="toggleForms()">Don't have an account? Sign up</p>
            </div>
            
            <!-- Signup Form -->
            <div id="signup-form" style="display: none;">
                <h2>Sign Up</h2>
                <!-- connected student_signup_db.php for store data on db -->
                <form action="studentRegInfoStore.php" method="post"> 
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" placeholder="Sam" required>

                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" placeholder="Ash" required>

                    <label for="stream">Stream</label>
                    <input type="text" name="stream" placeholder="BCA" required>

                    <label for="rollNum">Roll Number</label>
                    <input type="text" name="rollNum" placeholder="12374" required>

                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="samAsh123@gmail.com" required>

                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" required>

                    <button type="submit" name="signup">Sign Up</button>
                </form>
                <p class="toggle-link" onclick="toggleForms()">Already have an account? Login</p>
            </div>
        </div>
    </div>

    <script>
        function toggleForms() {
            const loginForm = document.getElementById("login-form");
            const signupForm = document.getElementById("signup-form");
            if (loginForm.style.display === "none") {
                loginForm.style.display = "block";
                signupForm.style.display = "none";
            } else {
                loginForm.style.display = "none";
                signupForm.style.display = "block";
            }
        }
    </script>
</body>
</html>