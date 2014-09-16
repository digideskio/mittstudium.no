<?php include "mittstudium.php" ?>
<?php include "head.php" ?>
<body>

    <div class="wrapper">

        <?php include "header.php" ?>

        <div class="content page-<?php echo $site->current_page->url ?>">
            <h1><?php echo $site->current_page->long_title ?></h1>
            <?php include $site->current_page->template ?>
        </div>

        <?php include "footer.php" ?>

    </div>

</body>
</html>
