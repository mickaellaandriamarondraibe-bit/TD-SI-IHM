<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<h2>Caisse n°<?= esc($caisse_id) ?></h2>

<select id="produit_id">
<?php foreach ($produits as $p): ?>
<option value="<?= $p['id'] ?>"><?= esc($p['designation']) ?></option>
<?php endforeach; ?>
</select>
<input type="number" id="quantite" min="1" value="1">
<button type="button" onclick="ajouter()">Ajouter</button>

<hr>
<h3>Panier</h3>
<table border="1" width="100%">
<thead>
<tr>
<th>Produit</th>
<th>Prix unit</th>
<th>Quantité</th>
<th>Montant</th>
</tr>
</thead>
<tbody id="panierTable"></tbody>
<tfoot>
<tr>
<td colspan="3"><strong>Total</strong></td>
<td id="totalCell"><strong>0</strong></td>
</tr>
</tfoot>
</table>
<br>

<form action="<?= base_url('/achat/cloturer') ?>" method="post" onsubmit="envoyerPanier(event)">
<input type="hidden" name="panierInput" id="panierInput">
<button type="submit">Clôturer achat</button>
</form>

<script>
const produits = <?= json_encode($produits) ?>;
let panier = [];

function ajouter() {
    const produitId = document.getElementById('produit_id').value;
    const quantite = parseInt(document.getElementById('quantite').value, 10);
    const produit = produits.find(p => p.id == produitId);

    panier.push({
        produit_id: produit.id,
        designation: produit.designation,
        prix_unitaire: produit.prix,
        quantite: quantite
    });

    afficher();
}

function afficher() {
    let table = document.getElementById('panierTable');
    table.innerHTML = "";
    let total = 0;

    panier.forEach((item) => {
        const montant = item.prix_unitaire * item.quantite;
        total += montant;
        table.innerHTML += `
            <tr>
                <td>${item.designation}</td>
                <td>${item.prix_unitaire}</td>
                <td>${item.quantite}</td>
                <td>${montant}</td>
            </tr>
        `;
    });

    document.getElementById('totalCell').innerHTML = `<strong>${total}</strong>`;
}

function envoyerPanier(event) {
    document.getElementById('panierInput').value = JSON.stringify(panier);
}
</script>

<?= $this->endSection() ?>