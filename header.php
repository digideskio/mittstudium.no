<header>

    <div class="logo">
        <a href="?<?php echo $site->page_route ?>=<?php echo $pages['home']->url ?>"><?php echo $site->name ?></a>
    </div>

    <nav clas="navigation">

        <ul class="pages">
            <?php
                foreach ($pages as $page):
                    if ($page->in_menu):
                        $active = $page === $site->current_page;
                    ?>
                        <li<?php if ($active): ?> class="active"<?php endif ?>>
                            <a href="?<?php echo $site->page_route ?>=<?php echo $page->url ?>">
                                <?php echo $page->title ?>
                            </a>
                        </li>
                    <?php endif;
                endforeach; ?>
        </ul>

        <div class="search">
            <form action="">
                <input type="hidden" name="<?php echo $site->page_route ?>" value="<?php echo $pages['soek']->url ?>">
                <input name="ord" class="search-input" type="search" placeholder="Søk etter studium">
            </form>
        </div>

    </nav>

</header>
