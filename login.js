console.log("login.js chargé !");
document.getElementById("login-form").addEventListener("submit", function (e) {
  console.log("Form submitted !");
});

document.addEventListener("DOMContentLoaded", () => {
  // Toggle password visibility
  const togglePassword = document.getElementById("toggle-password");
  const passwordInput = document.getElementById("password");

  if (togglePassword && passwordInput) {
    togglePassword.addEventListener("click", function () {
      const type =
        passwordInput.getAttribute("type") === "password" ? "text" : "password";
      passwordInput.setAttribute("type", type);

      // Change the eye icon
      const eyeIcon = this.querySelector("i");
      eyeIcon.classList.toggle("fa-eye");
      eyeIcon.classList.toggle("fa-eye-slash");
    });
  }

  // Form validation
  const loginForm = document.getElementById("login-form");
  const usernameInput = document.getElementById("username");
  const usernameError = document.getElementById("username-error");
  const passwordError = document.getElementById("password-error");

  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();
      let isValid = true;

      // Validate username
      if (!usernameInput.value.trim()) {
        usernameError.textContent = "Le nom d'utilisateur est requis";
        isValid = false;
      } else if (usernameInput.value.trim().length < 3) {
        usernameError.textContent =
          "Le nom d'utilisateur doit contenir au moins 3 caractères";
        isValid = false;
      } else {
        usernameError.textContent = "";
      }

      // Validate password
      if (!passwordInput.value) {
        passwordError.textContent = "Le mot de passe est requis";
        isValid = false;
      } else if (passwordInput.value.length < 6) {
        passwordError.textContent =
          "Le mot de passe doit contenir au moins 6 caractères";
        isValid = false;
      } else {
        passwordError.textContent = "";
      }

      // If form is valid, submit (in this demo, just show an alert)
      if (isValid) {
        alert("Connexion réussie! (Ceci est une démo)");
        this.reset();
      }
    });

    // Clear error messages when typing
    usernameInput.addEventListener("input", () => {
      usernameError.textContent = "";
    });

    passwordInput.addEventListener("input", () => {
      passwordError.textContent = "";
    });
  }

  // Add animation to event details
  const eventDetails = document.querySelectorAll(".event-detail");
  eventDetails.forEach((detail, index) => {
    detail.style.opacity = "0";
    detail.style.transform = "translateX(-20px)";

    setTimeout(() => {
      detail.style.transition = "all 0.5s ease";
      detail.style.opacity = "1";
      detail.style.transform = "translateX(0)";
    }, 300 + index * 200);
  });
});
