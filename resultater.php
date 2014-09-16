<h1>Resultater</h1>

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
            <tr>
                <td><?php echo $resultat->institusjon ?></td>
                <td><?php echo $resultat->studium ?></td>
                <td><?php echo $resultat->karakter ?></td>
                <td class="recommendation <?php echo karakter_til_css_class($resultat->karakter) ?>"></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
