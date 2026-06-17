<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<h1 class="page-title">Connexion</h1>
<p class="page-sub">Accédez à votre espace.</p>

<div class="card form-card">
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif ?>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
    <?php endif ?>

    <?php if (isset($validation)) : ?>
        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif ?>

    <form method="post" action="/login">
        <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= set_value('email') ?>" placeholder="vous@exemple.mg" required>
        </div>
        <div class="field">
            <label for="mot_de_passe">Mot de passe</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
    </form>
</div>
<?= $this->endSection() ?>
