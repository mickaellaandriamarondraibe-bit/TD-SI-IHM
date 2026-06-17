<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<h2>Caisse</h2>
<select id="produit_id">
    <?php foreach ($produits as $p): ?>
        <option value="<?= $p['id'] ?>">
            <?= $p['designation'] ?>
        </option>
    <?php endforeach; ?>
</select>

<input type="number" id="quantite" min="1" value="1">

<button type="button" onclick="ajouter()">Ajouter</button>

<hr>

<h3>🛒 Panier</h3>

<table border="1" width="100%">
    <thead>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
        </tr>
    </thead>
    <tbody id="panierTable"></tbody>
</table>

<br>

<form action="<?= base_url('/achat/cloturer') ?>" method="post" onsubmit="envoyerPanier(event)">
    <input type="hidden" name="panier" id="panierInput">
    <button type="submit">Clôturer achat</button>
</form>

<script>
let panier = [];

function ajouter() {
    const produitId = document.getElementById('produit_id').value;
    const quantite = document.getElementById('quantite').value;

    panier.push({
        produit_id: produitId,
        quantite: quantite
    });

    afficher();
}

function afficher() {
    let table = document.getElementById('panierTable');
    table.innerHTML = "";

    panier.forEach((item, index) => {
        table.innerHTML += `
            <tr>
                <td>${item.produit_id}</td>
                <td>${item.quantite}</td>
            </tr>
        `;
    });
}

function envoyerPanier(event) {
    document.getElementById('panierInput').value = JSON.stringify(panier);
}
</script>

<?= $this->endSection() ?>