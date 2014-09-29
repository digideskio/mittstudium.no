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
        'long_title' => 'Hva er ' . $site->name . '?',
        'template' => 'hjem.php',
        'url' => 'home',
        'in_menu' => true,
        'keywords' => array('mittstudium', 'hjem', 'forsiden')
    ),
    'evaluer' => (object) array(
        'id' => 1,
        'title' => 'Evaluer',
        'long_title' => 'Evaluer studium',
        'template' => 'evaluer.php',
        'url' => 'evaluer',
        'in_menu' => true,
        'keywords' => array('evaluering')
    ),
    'registrer' => (object) array(
        'id' => 1,
        'title' => 'Registrer',
        'long_title' => 'Registrer studium',
        'template' => 'registrer.php',
        'url' => 'registrer',
        'in_menu' => true,
        'keywords' => array('registrering', 'registrer', 'studium')
    ),
    'resultater' => (object) array(
        'id' => 1,
        'title' => 'Resultater',
        'long_title' => 'Resultater',
        'template' => 'resultater.php',
        'url' => 'resultater',
        'in_menu' => true,
        'keywords' => array('resultater', 'oppsummering', 'skoler', 'studier', 'institusjoner', 'studium'),
        'resultater' => array(
            (object) array(
                'id' => 0,
                'institusjon' => 'Universitetet i Bergen',
                'studium' => 'Informasjonsvitenskap',
                'extra' => '<p>Vil du finne fram til gode dataløysingar for banksystem, helsesektoren, oljebransjen eller morgondagens skole? Vil du lære god interaksjonsdesign? Drøymer du om å utvikle den neste store appen?</p> <p>Gjennom studiet i informasjonsvitskap utviklar du evner til samarbeid, kritisk tenking og kreativitet ¿ noko som er sentralt i arbeidet med å lage dei beste løysningane for brukarane. Du lærer korleis behandling av kunnskap, informasjon og data kan bli, bør bli og faktisk blir støtta av informasjons- og kommunikasjonsteknologi (IKT). IKT kan for eksempel vere informasjonssystem, program, databasar, datamaskinar, datanettverk og internett. Desse kunnskapane blir nytta til aktiv problemløysing og produktutvikling. Som informasjonsvitar vil du kunne fungere som bindeledd mellom praktiske utviklarar av programvare og andre grupper i organisasjonen.</p>',
                'karakter' => 6
            ),
            (object) array(
                'id' => 1,
                'institusjon' => 'Universitetet i Bergen',
                'studium' => 'Kognitiv vitenskap',
                'extra' => '<p>Korleis fungerer hjernen? Kva er kunstig intelligens? Korleis får ein ei datamaskin til å spele sjakk og attpåtil slå dei beste sjakkspelarane i verda?</p> <p>Kva eigenskapar må ein robot ha for å kunne bevege seg i ulendt terreng? Menneskeleg tenking blir til i eit samspel mellom sansing, minne, språk, problemløysing og kjensler. I kognitiv vitskap prøver vi å forstå korleis desse ulike evnene til den menneskelege hjernen fungerer kvar for seg og samla.</p> <p>Det gjer vi blant anna ved å lage dataprogram som skal simulere desse ¿evnene, for å sjå om dataprogramma er i stand til å framvise åtferd som liknar menneskeleg intelligens. Slik prøver vi å skaffe betre kunnskap om korleis ein intelligent hjerne fungerer, og vidare om korleis vi kan konstruere dataprogram som har kunstig ¿intelligens.</p> <p>I praksis kan slik kunnskap blant anna brukast til å lage dataspel, datasystem med talegjenkjenning eller dataprogram for medisinsk diagnose.</p>',
                'karakter' => 3
            ),
            (object) array(
                'id' => 2,
                'institusjon' => 'Handelshøyskolen BI',
                'studium' => 'Bachelor of Business Administration',
                'extra' => '<p>Som du sikkert vet, blir arbeidslivet bare mer og mer internasjonalt. Store selskaper og organisasjoner ser på hele verden som sitt marked, og rekrutterer folk fra ulike land. I denne typen jobber sier det seg selv at både kultur og arbeidsspråk ofte er mest mulig felles og enhetlig på tvers av landegrensene.</p> <p>En internasjonal utdanning. Studiet gjennomføres i sin helhet på engelsk, og er åpent for både utenlandske og norske studenter. I fjor startet det studenter fra hele 63 forskjellige land. Sjansen for å knytte kontakter og vennskap utover Norges grenser er dermed stor. Spesialisering i Shipping eller International Business. I det tredje året kan du velge mellom spesialisering i enten Shipping Management eller Internasjonal Business.</p>',
                'karakter' => 1
            )
        )
    ),
    'p404' => (object) array(
        'id' => 2,
        'title' => 'Ikke funnet',
        'long_title' => 'Side ikke funnet',
        'template' => '404.php',
        'url' => '404',
        'in_menu' => false,
        'keywords' => array()
    ),
    'soek' => (object) array(
        'id' => 3,
        'title' => 'Søk',
        'long_title' => 'Søkeresultater',
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
    } else if ($req_page === '' || !$req_page) {
        $site->current_page = $pages['home'];
        break;
    }
    $site->current_page = $pages['p404'];
}

$minimal_version = $_GET['min'] == 1;

?>
