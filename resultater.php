<table>
    <thead>
        <tr>
            <th>Institusjon</th>
            <th>Studium</th>
            <th>Karakter</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($site->current_page->resultater as $resultat): ?>
            <tr class="result" data-id="<?php echo $resultat->id ?>">
                <td><?php echo $resultat->institusjon ?></td>
                <td><?php echo $resultat->studium ?></td>
                <td><?php echo $resultat->karakter ?></td>
                <td class="recommendation <?php echo karakter_til_css_class($resultat->karakter) ?>"></td>
                <td><button class="extra-button">Mer</button></td>
            </tr>
            <tr class="extra-information extra-<?php echo $resultat->id ?> hidden">
                <td colspan="5">
                    <div class="information-content"><?php echo $resultat->extra ?></div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
