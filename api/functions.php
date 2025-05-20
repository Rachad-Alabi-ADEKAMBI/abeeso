<?php
session_start();
include 'db.php';
function newSurvey()
{
    // Assuming `getConnexion()` returns a PDO instance connected to your database
    $pdo = getConnexion();

    // Sanitize and retrieve input values
    $last_name = verifyInput($_POST['last_name']);
    $first_name = verifyInput($_POST['first_name']);
    $phone = verifyInput($_POST['phone']);
    $birth_date = verifyInput($_POST['birth_date']);
    $sex = verifyInput($_POST['sex']);
    $category = verifyInput($_POST['category']);
    $status = verifyInput($_POST['status']);
    $area = verifyInput($_POST['area']);
    $household_size = verifyInput($_POST['household_size']);
    $vegetables_in_diet = verifyInput($_POST['vegetables_in_diet']);
    $vegetable_list = verifyInput($_POST['vegetable_list']);
    $land_space = verifyInput($_POST['land_space']);
    $alternative_space = verifyInput($_POST['alternative_space']);
    $space_size = verifyInput($_POST['space_size']);
    $space_observation = verifyInput($_POST['space_observation']);
    $nutritional_importance = verifyInput($_POST['nutritional_importance']);
    $interested_in_production = verifyInput($_POST['interested_in_production']);
    $interested_in_installation = verifyInput($_POST['interested_in_installation']);
    $available_time = verifyInput($_POST['available_time']);
    $waste_management = verifyInput($_POST['waste_management']);
    $gardener_experience = verifyInput($_POST['gardener_experience']);
    $gardening_tools = verifyInput($_POST['gardening_tools']);
    $tools_list = verifyInput($_POST['tools_list']);
    $weekly_hours = verifyInput($_POST['weekly_hours']);
    $objectives = verifyInput($_POST['objectives']);
    $composting = verifyInput($_POST['composting']);
    $cooking_fuel = verifyInput($_POST['cooking_fuel']);
    $cooking_frequency = verifyInput($_POST['cooking_frequency']);
    $monthly_budget = verifyInput($_POST['monthly_budget']);
    $biogas_pack_interest = verifyInput($_POST['biogas_pack_interest']);

    try {
        // Prepare the SQL statement
        $sql = $pdo->prepare('INSERT INTO survey (
            last_name, first_name, birth_date, sex, area, phone, category, status,
            household_size, vegetables_in_diet, vegetable_list, land_space, alternative_space, space_size, space_observation, nutritional_importance,
            interested_in_production, interested_in_installation, available_time, waste_management, gardener_experience, gardening_tools, tools_list, weekly_hours,
            objectives, composting, cooking_fuel, cooking_frequency, monthly_budget, biogas_pack_interest
        ) VALUES (
            ?, ?, ?, ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?, ?
        );');

        // Execute the statement with parameters
        $sql->execute([
            $last_name,
            $first_name,
            $birth_date,
            $sex,
            $area,
            $phone,
            $category,
            $status,
            $household_size,
            $vegetables_in_diet,
            $vegetable_list,
            $land_space,
            $alternative_space,
            $space_size,
            $space_observation,
            $nutritional_importance,
            $interested_in_production,
            $interested_in_installation,
            $available_time,
            $waste_management,
            $gardener_experience,
            $gardening_tools,
            $tools_list,
            $weekly_hours,
            $objectives,
            $composting,
            $cooking_fuel,
            $cooking_frequency,
            $monthly_budget,
            $biogas_pack_interest
        ]);

        echo '<script>
            alert("Formulaire enregistré avec succès !");
            window.history.back();
        </script>';
    } catch (PDOException $e) {
        echo '<script>
            alert("Une erreur est survenue: ' . addslashes($e->getMessage()) . '");
            window.history.back();
        </script>';
    }
}

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
    /*
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
    */
    echo 'ok';
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
