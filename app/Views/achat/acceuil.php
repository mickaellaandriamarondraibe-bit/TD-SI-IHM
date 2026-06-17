<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<?= $idcaisse = $this->request->getPost('caisse_id'); ?>

<h1>Bienvenue sur la caisse n° <?= $idcaisse ?></h1>
<form action="<?= base_url('/achat') ?>" method="post">
    <label for="produit_id">Produit :</label>
    <select name="produit_id" id="produit_id">
    <?php foreach ($produits as $produit): ?>
        <option value="<?= $produit['id'] ?>"><?= $produit['nom'] ?></option>
    <?php endforeach; ?>
    </select>

    <label for="quantite">Quantité :</label>
    <input type="number" name="quantite" id="quantite" min="1" value="1">

    <button type="submit"> Valider</button>
</form>
<!-- On vas creer un genre de panier temporaire apres avoir cliqué sur valider  et afficher tout -->
<script>
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche l'envoi du formulaire

        const produitId = document.getElementById('produit_id').value;
        const quantite = document.getElementById('quantite').value;

        // Affiche les valeurs sélectionnées (vous pouvez les envoyer au serveur ici)
        alert(`Produit ID: ${produitId}, Quantité: ${quantite}`);
    });