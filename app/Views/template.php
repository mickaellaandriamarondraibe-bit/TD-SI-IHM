<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TD-SI-IHM | Caisse</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <header> 
        <nav>
            <a href="">M&I market</a>
            <div>
            <a href="/">Acceuil</a>
            <?php if (session()->get('loggedIn')) : ?>
                <span class="nav-user"><?= esc(session()->get('nom')) ?></span>
                <a href="/logout">Déconnexion</a>
            <?php else : ?>
                <a href="/login">Se connecter</a>
            <?php endif ?>
            </div>
        </nav>
        <main>
            <?= $this->renderSection('content') ?>
        </main>
        <footer class="foot">
        Mini-blog — projet pédagogique ITUniversity · CodeIgniter 4 + SQLite
        ETU004074 & ETU004346
    </footer>
        
    </header>
</body>
</html>