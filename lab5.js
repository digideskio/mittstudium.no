var fakeAuthors = ['Enkefru Stengelføhn-Glad', 'Emanuel Desperados', 'Ludvig', 'Ben Redic Fy Fazan',
'Hallstein Bronskimlet', 'Jostein Kroksleiven', 'Rudolf Blodstrupmoen ', 'Reodor Felgen', 'Solan Gundersen'];

// Adds event listener to footer element
function footerSetup () {
    var button = document.getElementsByClassName('more-authors')[0];
    if (button) {
        button.addEventListener('click', footerScript, false);
    }
}

function footerTearDown() {
    var button = document.getElementsByClassName('more-authors')[0];
    button.removeEventListener('click', footerScript, false);
    button.parentNode.removeChild(button);
}

// Adds fake authors to credits
function footerScript () {

    // if there are no more fake authors, remove the event listener
    if (!fakeAuthors.length) {
        footerTearDown();
        return;
    }

    var credits = document.getElementById('footer').getElementsByClassName('credits')[0];
    var newCredit = document.createElement('li');
    newCredit.innerHTML = fakeAuthors.pop();
    credits.appendChild(newCredit);
}

/* Connects the ui to a javascript function, extrasToggle */
function extrasSetup () {
    var results = document.getElementsByClassName('result');

    for (var i = 0, j = results.length; i < j; i++) {
        results[i].addEventListener('click', extrasToggle, false);
    }
}

/* Toggles the hidden class when the user interacts with the UI */
function extrasToggle () {
    var extraId = this.dataset['id'];
    var extra = document.getElementsByClassName('extra-' + extraId)[0];
    extra.classList.toggle('hidden');
}

function newWindowSetup () {
    var links = document.getElementsByClassName('new-window');
    for (var i = 0, j = links.length; i < j; i++) {
        links[i].addEventListener('click', function (e) {
            window.open(this.href + '&min=1');
            e.preventDefault();
        }, false);
    }
}


function onLoad () {

    extrasSetup();

    footerSetup();

    newWindowSetup();

}

window.addEventListener('load', onLoad, false)
