var fakeAuthors = ['Enkefru Stengelføhn-Glad', 'Emanuel Desperados', 'Ludvig', 'Ben Redic Fy Fazan',
'Hallstein Bronskimlet', 'Jostein Kroksleiven', 'Rudolf Blodstrupmoen ', 'Reodor Felgen', 'Solan Gundersen'];

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

function contactsSetup () {
    var creditsElement = document.getElementsByClassName('credits')[0];
    var file = loadFile('kontaktinfo.json');
    var json;

    if (!creditsElement) {
        return;
    }

    if (!JSON) {
        console.warn('No JSON');
        return;
    }

    try {
        json = JSON.parse(file);
    } catch (e) {
        console.error('Failed parson json', e);
        return;
    }

    json['contacts'].forEach(function (contact) {
        creditsElement.appendChild(renderContact(contact));
    });

}

// return li node
function renderContact (contact) {
    var li = document.createElement('li');
    var refNode = li;

    if (contact.email) {
        var emailNode = document.createElement('a');
        emailNode.href = 'mailto:' + contact.email;
        li.appendChild(emailNode);
        refNode = emailNode;
    }

    refNode.appendChild(document.createTextNode(contact.first_name + ' ' + contact.last_name));

    if (contact.telephone) {
        var telephoneNode = document.createElement('span');
        telephoneNode.appendChild(document.createTextNode(' (' + contact.telephone + ')'));
        li.appendChild(telephoneNode)
    }
    return li;
}

function coursesSetup () {
    var json;
    var courses;
    var parent = document.getElementById('courses');

    if (!parent) {
        return;
    }

    try {
        json = JSON.parse(loadFile('studier.json'));
    } catch (e) {
        console.error('Failed to parse studier.json', e);
        return;
    }
    courses = json['courses'];
    courses.forEach(function (course) {
        parent.appendChild(renderCourse(course));
    });

}

// return table row
function renderCourse (course) {
    var tr = document.createElement('tr');
    var institusjon = document.createElement('td');
    institusjon.appendChild(document.createTextNode(course.institution));

    var studium = document.createElement('td');
    studium.appendChild(document.createTextNode(course.title))

    var karakter = document.createElement('td');
    karakter.appendChild(document.createTextNode(course.grade))

    tr.appendChild(institusjon);
    tr.appendChild(studium);
    tr.appendChild(karakter);
    return tr;
}

function onLoad () {

    extrasSetup();

    footerSetup();

    newWindowSetup();

    contactsSetup();

    coursesSetup();

}

window.addEventListener('load', onLoad, false);
