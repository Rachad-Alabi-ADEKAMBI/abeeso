<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main class="main">
        Here is a simple HTML code for the `register` form:
        ```html
        <form method="post" action="api/api.php?action=register">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="confirm_password">Confirmer le mot de passe</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br><br>

            <button type="submit">S'inscrire</button>
            <a href="#" class="cancel-btn">Annuler</a>

            <p id="error-message"></p>

            <?php if (isset($_SESSION['login'])): ?>
                <script>
                    alert('<?php echo $_SESSION['login']['email']; ?>');
                    if (<?php echo $_SESSION['login']['error_message']; ?>) {
                        window.history.back();
                    }
                </script>
            <?php endif; ?>
        </form>
        ```
        This form includes fields for the username, password, and confirmation of the
    </main>

</body>

</html>