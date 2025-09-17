<!-- components/navbar.php -->
<nav>

    <ul>
        <li>MON PARCOURS</li>
        <li>RÉFLEXOLOGIE</li>
        <li>PRESTATIONS</li>
        <li>TARIFS</li>
        <li>CONTACT</li>
        <li><a href="<?= BASE_URL ?>/book" class="active">SPÉCIALISATIONS</a></li>
        <li id="custom">Bonjour <br> <?= htmlspecialchars($_SESSION['user_name']) ?> !</li>
        <?php if (isset($_SESSION['connected'])): ?>
            <?php if (!empty($_SESSION['id_roles']) && (int)$_SESSION['id_roles'] === 2): ?>
                <!-- Onglet Admin uniquement pour les admins -->
                <li><a href="<?= BASE_URL ?>/admin">ADMIN</a></li>
            <?php endif; ?>
            <!-- Afficher Se déconnecter si connecté -->
            <li><a href="<?= BASE_URL ?>/deconnexion">Se déconnecter</a></li>

        <?php else: ?>
            <!-- Afficher l'icône utilisateur si déconnecté -->
            <a href="<?= BASE_URL ?>/connexion">
                <img src="<?= BASE_URL ?>/public/image/user.png" alt="icône utilisateur">
            </a>
        <?php endif; ?>
    </ul>

    <div class="logo">
        <a href="<?= BASE_URL ?>/">
            <img id="logo" src="<?= BASE_URL ?>/public/image/logoHD.png" alt="Logo Violette Gilavert Reflexologie">
        </a>
        <div class="pink_line"></div>
    </div>
</nav>