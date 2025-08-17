<h2>Register</h2>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form action="/capstone4-mvc-ch4/public/register" method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
    <button type="submit">Register</button>
</form>

<p>Already have an account? <a href="/capstone4-mvc-ch4/public/login">Login here</a></p>
