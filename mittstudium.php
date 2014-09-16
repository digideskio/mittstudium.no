<?php

$site = (object) array(
    'name' => 'MittStudium.no',
    'author' => 'Jonas G. Drange',
    'author_email' => 'jonas.drange@student.uib.no',

    // this is the GET parameter we use to navigate the site
    'page_route' => 'site',
    'current_page' => null
);

$pages = array(
    'home' => (object) array(
        'id' => 0,
        'title' => 'Hjem',
        'template' => 'hjem.php',
        'url' => 'home',
        'in_menu' => true,
        'keywords' => array('mittstudium', 'hjem', 'forsiden')
    ),
    'evaluer' => (object) array(
        'id' => 1,
        'title' => 'Evaluer',
        'template' => 'evaluer.php',
        'url' => 'evaluer',
        'in_menu' => true,
        'keywords' => array('evaluering')
    ),
    'registrer' => (object) array(
        'id' => 1,
        'title' => 'Registrer',
        'template' => 'registrer.php',
        'url' => 'registrer',
        'in_menu' => true,
        'keywords' => array('registrering', 'registrer', 'studium')
    ),
    'resultater' => (object) array(
        'id' => 1,
        'title' => 'Resultater',
        'template' => 'resultater.php',
        'url' => 'resultater',
        'in_menu' => true,
        'keywords' => array('resultater', 'oppsummering', 'skoler', 'studier', 'institusjoner', 'studium'),
        'resultater' => array(
            (object) array(
                'institusjon' => 'Universitetet i Bergen',
                'studium' => 'Informasjonsvitenskap',
                'karakter' => 6
            ),
            (object) array(
                'institusjon' => 'Universitetet i Bergen',
                'studium' => 'Kognitiv vitenskap',
                'karakter' => 3
            ),
            (object) array(
                'institusjon' => 'Handelshøyskolen BI',
                'studium' => 'Bachelor of Business Administration',
                'karakter' => 1
            )
        )
    ),
    'p404' => (object) array(
        'id' => 2,
        'title' => 'Ikke funnet',
        'template' => '404.php',
        'url' => '404',
        'in_menu' => false,
        'keywords' => array()
    ),
    'soek' => (object) array(
        'id' => 3,
        'title' => 'Søk',
        'template' => 'soek.php',
        'url' => 'soek',
        'in_menu' => false,
        'keywords' => array()
    )
);

/*
    A function that returns a css class based on a grade

        $k a number from 0 to 6
        returns a string
*/
function karakter_til_css_class($k) {
    if ($k >= 0 && $k <= 2) {
        return 'bad';
    } else if ($k >= 3 && $k <= 5) {
        return 'ok';
    } else if ($k >= 6) {
        return 'great';
    } else {
        return 'unknown';
    }
}

/*
    Set the current page. If the relevant GET parameter
    is empty, set to home. If none found, set to 404.
*/
$req_page = $_GET[$site->page_route];
foreach ($pages as $page) {
    if ($page->url === $req_page) {
        $site->current_page = $page;
        break;
    } else if ($req_page === '') {
        $site->current_page = $pages['home'];
        break;
    }
    $site->current_page = $pages['p404'];
}

?>
