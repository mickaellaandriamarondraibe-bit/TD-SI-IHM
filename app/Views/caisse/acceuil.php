<?= $this->extend('template') ?>
<?= $this->section('content') ?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= base_url('/achat') ?>" method="post">
        <select name="caisse_id" id="caisse_id">
            <option value="">Sélectionnez une caisse</option>
            <?php foreach ($caisses as $caisse): ?>
                <option value="<?= $caisse['id'] ?>"><?= $caisse['nom'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit"> Valider</button>
    </form>
</body>
</html>