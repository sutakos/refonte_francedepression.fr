
    document.addEventListener("DOMContentLoaded", () => {
    const signinTab = document.getElementById("signin-tab");
    const signupTab = document.getElementById("signup-tab");
    const signinPane = document.getElementById("signin");
    const signupPane = document.getElementById("signup");

    // Fonction pour afficher le formulaire de connexion
    const showSignin = () => {
    signinTab.classList.add("active");
    signupTab.classList.remove("active");
    signinPane.classList.add("show", "active");
    signupPane.classList.remove("show", "active");
};

    // Fonction pour afficher le formulaire d'inscription
    const showSignup = () => {
    signinTab.classList.remove("active");
    signupTab.classList.add("active");
    signinPane.classList.remove("show", "active");
    signupPane.classList.add("show", "active");
};

    // Gestion des clics sur les liens
    signinTab.addEventListener("click", (e) => {
    e.preventDefault();
    showSignin();
});

    signupTab.addEventListener("click", (e) => {
    e.preventDefault();
    showSignup();
});

    // Affiche le formulaire de connexion par défaut
    showSignin();
});
