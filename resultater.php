<table>
    <thead>
        <tr>
            <th>Institusjon</th>
            <th>Studium</th>
            <th>Karakter</th>
        </tr>
    </thead>
    <tbody id="courses">
<!--         <?php foreach ($site->current_page->resultater as $resultat): ?>
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
        <?php endforeach; ?> -->
    </tbody>
</table>
<script>
function loadFile(filename)
{
    var xmlHTTP = new XMLHttpRequest();
    try
    {
        xmlHTTP.open('GET', filename, false);
        xmlHTTP.send(null);
    }
    catch (e) {
        console.error('Unable to load the requested file.');
        return;
    }

    return xmlHTTP.responseText;
}

parser = new DOMParser();
tree = parser.parseFromString(loadFile('studier.xml'),'text/xml');
courses = tree.getElementsByTagName('course');
parent = document.getElementById('courses');
for (var i = 0, j = courses.length; i < j; i++) {
    //console.log(courses[i]);
    var tr = document.createElement('tr');
    var institusjon = document.createElement('td');
    institusjon.appendChild(document.createTextNode(courses[i].getElementsByTagName('institution')[0].innerHTML));

    var studium = document.createElement('td');
    studium.appendChild(document.createTextNode(courses[i].getElementsByTagName('title')[0].innerHTML))

    var karakter = document.createElement('td');
    karakter.appendChild(document.createTextNode(courses[i].getElementsByTagName('grade')[0].innerHTML))

    tr.appendChild(institusjon);
    tr.appendChild(studium);
    tr.appendChild(karakter);
    parent.appendChild(tr);
}
</script>
