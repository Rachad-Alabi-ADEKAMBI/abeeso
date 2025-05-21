<?php
session_start();
include 'db.php';


function getOrders()
{
    try {
        $pdo = getConnexion();
        $req = $pdo->prepare("
            SELECT *
            FROM orders 
            ORDER BY id DESC
        ");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        // Réponse structurée pour Axios
        echo json_encode([
            'success' => true,
            'data' => $datas
        ]);
    } catch (Exception $e) {
        // En cas d'erreur
        echo json_encode([
            'success' => false,
            'message' => 'Erreur serveur : ' . $e->getMessage()
        ]);
    }
}

function serveOrder()
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        sendJSON(['success' => false, 'message' => 'Méthode non autorisée'], 405);
        return;
    }

    $data = json_decode(file_get_contents("php://input"), true);
    if (!isset($data['orderId'])) {
        sendJSON(['success' => false, 'message' => 'ID de commande manquant'], 400);
        return;
    }

    $orderId = intval($data['orderId']);
    $pdo = getConnexion();

    // Vérifie si la commande existe
    $check = $pdo->prepare("SELECT * FROM orders WHERE id = ?");
    $check->execute([$orderId]);
    if ($check->rowCount() === 0) {
        sendJSON(['success' => false, 'message' => 'Commande introuvable'], 404);
        return;
    }

    // Met à jour le statut
    $update = $pdo->prepare("UPDATE orders SET status = 'delivered' WHERE id = ?");
    $success = $update->execute([$orderId]);

    if ($success) {
        sendJSON(['success' => true, 'message' => 'Commande mise à jour avec succès']);
    } else {
        sendJSON(['success' => false, 'message' => 'Échec de la mise à jour']);
    }
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
