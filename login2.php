<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'meta.php'; ?>

    <link rel="stylesheet" href="login.css" />

    <title>Connexion - Soirée Culturelle Africaine</title>
</head>

<body>
    <!-- Navigation -->
    <?php include 'header.php'; ?>

    <!-- Login Section -->
    <section class="login-section" id="app">
        <div class="login-container">
            <div class="login-card">
                <div class="login-header">
                    <div class="login-logo">
                        <i class="fas fa-drum"></i>
                    </div>
                    <h2>Connexion</h2>
                    <p>Accédez à votre espace personnel</p>
                </div>

                <form class="login-form" id="login-form" method="POST" action="">
                    <div class="form-group">
                        <label for="username"><i class="fas fa-user"></i> Nom d'utilisateur</label>
                        <input type="text" id="username" v-model="username" name="username" required>
                        <div v-if="errors.username" class="form-error">{{ errors.username }}</div>
                    </div>

                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock"></i> Mot de passe</label>
                        <div class="password-input-container">
                            <input v-model="password" type="password" id="password" name="password" required />
                            <button type="button" class="toggle-password" id="toggle-password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="form-error" id="password-error"></div>
                    </div>

                    <button type="submit" class="btn btn-primary login-btn">
                        <i class="fas fa-sign-in-alt"></i> Se connecter
                    </button>
                </form>
            </div>

            <div class="login-image">
                <div class="login-overlay"></div>
                <div class="login-content">
                    <h2>Soirée Culturelle Africaine</h2>
                    <p>31 MAI 2025 | 20H - 02H | FONBEAUZARD</p>
                    <div class="login-event-details">
                        <div class="event-detail">
                            <i class="fas fa-music"></i>
                            <span>DJ Animation</span>
                        </div>
                        <div class="event-detail">
                            <i class="fas fa-tshirt"></i>
                            <span>Défilé de Mode</span>
                        </div>
                        <div class="event-detail">
                            <i class="fas fa-drum"></i>
                            <span>Danses Folkloriques</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script src="script.js"></script>
    <script src="login.js"></script>


    <!-- Vue.js local -->
    <script src="vue.global.js"></script>

    <script>
        //axios
        import axios from 'axios';

        const {
            createApp
        } = Vue;

        createApp({
            data() {
                return {
                    username: '',
                    password: '',
                    errors: {}
                };
            },
            computed: {
                loginError() {
                    return Object.keys(this.errors).length > 0 ? this.errors : null
                }
            },
            methods: {
                togglePasswordVisibility() {
                    const passwordInput = document.getElementById('password')
                    if (passwordInput.type === 'password') {
                        passwordInput.type = ''
                    } else {
                        passwordInput.type = 'password'
                    }
                }
            },
            mounted() {
                alert('ok');
                this.loginError = null
                document.getElementById('login-form-submit').addEventListener('click', () => {
                    // Make API call to login endpoint here
                    const axios = require('axios')
                    axios.post('api/api.php?action=login', {
                            username: this.username,
                            password: this.password
                        })
                        .then(response => {
                            console.log(response.data)
                        })
                        .catch(error => {
                            console.error(error)
                        })
                })
            },
        }).mount("#app");
    </script>

</body>

</html>