<form action="config/update-password.php" method="post">
    <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
    <label for="password">Password Baru:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Ubah Password</button>
</form>
