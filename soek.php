<?php
$min = 3;
$term = htmlspecialchars($_GET['ord']);
if ($term && strlen($term) >= $min):

    $hits = array();

    foreach ($pages as $page):
        if ((strripos($page->title, $term) !== false) || (array_search($term, $page->keywords) !== false)):
            $hits[] = $page;
        endif;
    endforeach; ?>

    <?php if (count($hits) > 0): ?>
        <p>Du søkte etter <strong><?php echo $term ?></strong> og vi fant <?php echo count($hits) ?> sider:</p>

        <ol class="results">
            <?php foreach ($hits as $hit): ?>
            <li><a href="?<?php echo $site->page_route ?>=<?php echo $hit->url ?>"><?php echo $hit->title ?></a></li>
            <?php endforeach ?>
        </ol>
    <?php else: ?>
        <p>Ditt søk etter <strong><?php echo $term ?></strong> gav ingen resultater.</p>
    <?php endif ?>

<?php else: ?>

    <p>Vennligst oppgi et søkeord på minst <?php echo $min ?> bokstaver.</p>

<?php endif ?>
