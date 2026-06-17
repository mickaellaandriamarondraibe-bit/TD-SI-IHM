<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<form action="<?= base_url('/caisse') ?>" method="post">
        <select name="caisse_id" id="caisse_id">
            <option value="">Sélectionnez une caisse</option>
            <?php foreach ($caisses as $caisse): ?>
                <option value="<?= $caisse['id'] ?>"><?= $caisse['nom'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit"> Valider</button>
</form>

<?= $this->endSection() ?>