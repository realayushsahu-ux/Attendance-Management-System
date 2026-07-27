<?php
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<div class="container">

    <div class="card login-card">

        <h2>Login</h2>

        <?php
        session_start();

        if (isset($_SESSION['error'])) {
            echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        ?>

        <form action="login_process.php" method="POST" id="loginForm">

            <div class="form-group">
                <label>Username</label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    placeholder="Enter Username"
                    required
                    maxlength="50"
                >
            </div>

            <div class="form-group">
                <label>Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Enter Password"
                    required
                >
            </div>

            <div class="form-group">
                <label>Login As</label>

                <select name="role" id="role" required>
                    <option value="">Select Role</option>
                    <option value="Admin">Admin</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Student">Student</option>
                </select>

            </div>

            <button type="submit" class="btn">
                Login
            </button>

        </form>

    </div>

</div>

<?php
require_once 'includes/footer.php';
?>