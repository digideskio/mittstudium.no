<?php include "mittstudium.php" ?>
<?php include "head.php" ?>
<body class="<?php if ($minimal_version): ?>minimal<?php endif; ?>">

    <div class="wrapper">

        <?php if (!$minimal_version): ?>
            <?php include "header.php" ?>
        <?php endif; ?>

        <div class="content page-<?php echo $site->current_page->url ?>">
            <h1><?php echo $site->current_page->long_title ?></h1>
            <?php include $site->current_page->template ?>
        </div>


        <?php if (!$minimal_version): ?>
            <?php include "footer.php" ?>
        <?php endif; ?>


    </div>

</body>
</html>
