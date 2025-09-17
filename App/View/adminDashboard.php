<h1>Back Office - Gestion des prestations</h1>

<a href="<?= BASE_URL ?>/admin/add">Ajouter une prestation</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($prestations as $prestation): ?>
        <tr>
            <td><?= htmlspecialchars($prestation['id']) ?></td>
            <td><?= htmlspecialchars($prestation['title']) ?></td>
            <td><?= htmlspecialchars($prestation['description']) ?></td>
            <td><?= htmlspecialchars($prestation['price']) ?></td>
            <td>
                <a href="<?= BASE_URL ?>/admin/edit/<?= $prestation['id'] ?>">Modifier</a>
                <a href="<?= BASE_URL ?>/admin/delete/<?= $prestation['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
