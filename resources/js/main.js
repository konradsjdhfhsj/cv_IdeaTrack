    const divProfil = document.getElementById('profil');
    const divForum = document.getElementById('forum');
    const divProjekty = document.getElementById('projekty');

    document.getElementById('btn-profil').addEventListener('click', () => pokaz('profil'));
    document.getElementById('btn-projekty').addEventListener('click', () => pokaz('projekty'));
    document.getElementById('btn-forum').addEventListener('click', () => pokaz('forum'));

    function pokaz(nazwa) {
        divProfil.style.display = "none";
        divProjekty.style.display = "none";
        divForum.style.display = "none";

        document.getElementById(nazwa).style.display = "block";
    }


    document.getElementById('avatarInput').addEventListener('change', function (e) {
  const file = e.target.files[0];
  if (file) {
    document.getElementById('podglad').src = URL.createObjectURL(file);
  }
});
