<?php
session_start();
include 'db.php';


function newsletters()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("
        SELECT n1.*
        FROM newsletters n1
        JOIN (
            SELECT username, MAX(id) AS max_id
            FROM newsletters
            WHERE username IS NOT NULL
            GROUP BY username
        ) n2 ON n1.username = n2.username AND n1.id = n2.max_id
        ORDER BY n1.id DESC
    ");
    $req->execute();
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();

    sendJSON($datas);
}


function login()
{

    // Establish database connection
    $pdo = getConnexion();

    // Retrieve and sanitize the input
    $username = verifyInput($_POST['username']);
    $password = verifyInput($_POST['password']);

    $req = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $req->execute(array($username));
    $user = $req->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verify the password using bcrypt
        if (password_verify($password, $user['password'])) {
            session_start();
            // start a session called user
            $_SESSION['user'] = [
                'user_id' => $user['id']
            ];
            header("Location: ../dashboard.php");
            exit();
        } else {
            $_SESSION['login']['username'] = $username;
?>
            <script>
                alert('Identifiants incorrects !');
                window.history.back();
            </script>
        <?php
        }
    } else {
        $_SESSION['login']['username'] = $username;
        ?>
        <script>
            alert('Identifiants incorrects !');
            window.history.back();
        </script>
    <?php
    }
}

function register()
{

    // Establish database connection
    $pdo = getConnexion();

    // Retrieve and sanitize input
    $username = verifyInput($_POST['username']);
    $password = verifyInput($_POST['password']);
    $confirmPassword = verifyInput($_POST['confirm_password']);


    // echo $username.' '.$password;

    // Check if passwords match
    if ($password !== $confirmPassword) {
    ?>
        <script>
            alert('Les mots de passe ne correspondent pas !');
            window.history.back();
        </script>
    <?php
        exit();
    }

    // Check if the username is already registered
    $req = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $req->execute(array($username));
    $user = $req->fetch(PDO::FETCH_ASSOC);

    if ($user) {
    ?>
        <script>
            alert('Cet username est déjà enregistré !');
            window.history.back();
        </script>
    <?php
        exit();
    }

    // Hash the password using bcrypt
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert the new user into the database with the default role as 'user'
    $insert = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $isInserted = $insert->execute(array($username, $hashedPassword));

    if ($isInserted) {
    ?>
        <script>
            alert('Inscription réussie ! Veuillez vous connecter.');
            window.location.href = '../login.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Une erreur s\'est produite lors de l\'inscription. Veuillez réessayer.');
            window.history.back();
        </script>
<?php
    }
}

function logout()
{
    unset($_SESSION['user']);

    header('Location: ../index.php');
}


function sendJSON($infos)
{
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    echo json_encode($infos, JSON_UNESCAPED_UNICODE);
}

function verifyInput($inputContent)
{
    $inputContent = htmlspecialchars($inputContent);
    $inputContent = trim($inputContent);
    return $inputContent;
}
