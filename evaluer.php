<?php $secure = $_GET['secure'] == 1; ?>
<?php if ($secure): ?>
<div class="secure">
    <p>🔒 Kryptert skjema</p>
</div>
<?php else: ?>
<p class="note">Ønsker du å evaluere studiet anonymt? Prøv vår sikre <a class="new-window" href="?<?php echo $site->page_route ?>=<?php echo $site->current_page->url ?>&amp;secure=1">evalueringsside</a>.</p>
<?php endif; ?>


<div class="register-form <?php if ($secure): ?>secure-form<?php endif; ?>">
    <form>
        <div class="input-group">
            <label for="name">Navn på studium</label>
            <select id="name">
                <option>Informasjonsvitenskap (Universitet i Bergen)</option>
                <option>Kognitiv vitenskap (Universitet i Bergen)</option>
            </select>
        </div>
        <div class="input-group">
            <label for="rating">Karakter</label>
            <select id="rating">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
            </select>
        </div>
        <div class="input-group">
            <label for="accept">Jeg har gått på dette kurset</label>
            <input type="checkbox" id="accept">
        </div>
        <div class="input-group">
            <button>Evaluer</button>
        </div>
    </form>
</div>
