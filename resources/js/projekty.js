// Elementy w sekcji "projekty"
const twojeProjekty = document.getElementById('twojeprojekty');
const formularzProjektu = document.getElementById('formularzprojektu');

// na starcie pokaz tylko listę twoich projektów, formularz ukryj
twojeProjekty.style.display = "block";
formularzProjektu.style.display = "none";

// obsługa kliknięć
document.getElementById('zobacz').addEventListener('click', () => pokazProjekty('twojeprojekty'));
document.getElementById('dodaj').addEventListener('click', () => pokazProjekty('formularzprojektu'));

function pokazProjekty(nazwa) {
    // ukryj oba
    twojeProjekty.style.display = "none";
    formularzProjektu.style.display = "none";

    // pokaz właściwy
    document.getElementById(nazwa).style.display = "block";
}
