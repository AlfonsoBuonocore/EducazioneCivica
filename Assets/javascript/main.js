// --------- theme --------- //

  const ThemeButton = document.getElementById('theme-button')
  // vedo se nello storage del mio browser c'è salvato un attributo collegato al tema del sito
  const StorageTheme = localStorage.getItem('selected-theme')

  // se nello storage ci sono informazioni corrispondente all'attributo di cui gli ho dato il nome fa dei settaggi in base allinformazione che ha ottenuto 
  if (StorageTheme) {
    if (StorageTheme == "light") {
      // se l'informazione è light setto il data-theme del body a light e metto come icona dello switch-theme il sole togliendo la luna
      document.body.setAttribute("data-theme","light")
      ThemeButton.classList.remove("bi-moon-fill")
      ThemeButton.classList.add("bi-sun-fill")
    }else{
      // invece se l'informazione è dark o altro non corrispondente a light setto il data-theme del body a dark e metto come icona dello switch-theme la luna togliendo il sole
      document.body.setAttribute("data-theme","dark")
      ThemeButton.classList.remove("bi-sun-fill")
      ThemeButton.classList.add("bi-moon-fill")
    }
  }

  // attraverso due funzione attribuisco a due variabili che mi serviranno in seguito con il tema del sito e l'immagine dello swtch-theme corrispondente
  var Theme = getTheme()
  var Icon = getIcon()

  // quando lo switch-theme viene cliccato questa funzione chiama un'altra funzione simile alla funzione dei settaggi dallo storage che setta il tema al cambiamento da parte dell'utente
  ThemeButton.addEventListener("click", () =>{
    setTheme(Theme);
    setNewInt()
  })

  function setNewInt(){
    document.body.style.transition = "background .5s ease-in-out"
  }

  // funzioni che mi permettono di recuperare il tema e l'icona correnti nel sito
  // tema
  function getTheme(){
    return document.body.getAttribute("data-theme")
  }
  // icona
  function getIcon(){
    return ThemeButton.classList.contains("bi-moon-fill") ? "bi-moon-fill" : "bi-sun-fill"
  }

  function setTheme(theme){
    if (theme == "dark") {
      document.body.setAttribute("data-theme","light")
      ThemeButton.classList.remove("bi-moon-fill")
      ThemeButton.classList.add("bi-sun-fill")
    }else{
      document.body.setAttribute("data-theme","dark")
      ThemeButton.classList.remove("bi-sun-fill")
      ThemeButton.classList.add("bi-moon-fill")
    }
    Theme = getTheme();
    Icon = getIcon();
    // setto nello stoage locale il mio attributo corrispondente al tema del sito in modo che nel caricamento succesivo della pagina il tema sara gia attivo
    localStorage.setItem('selected-theme',Theme)
  }

// ------------- Registrazione articolo ------------ //

  const title = document.querySelector(".title");
  const content = document.querySelector(".content");
  const img = document.querySelector(".imgIns");
  const divIns = document.querySelector(".inserimento");

  const a = document.getElementById("active");

  const Article = {
    title:"",
    content:""
  }

  a.addEventListener("click", ()=>{
    if (img.classList.contains("active")) img.classList.remove("active")
    divIns.style.display = "block";
    title.classList.add("active");
  })

  function regTitle(){
    Article.title = document.getElementById("title").value;
    if (Article.title != "") {
      title.classList.remove("active");
      content.classList.add("active");
    }
    else alert("titolo vuoto");
  }

  function regContent(){
    Article.content = document.getElementById("content").value;
    if (Article.content != "") {
      content.classList.remove("active");
      img.classList.add("active");
    }
    else alert("contenuto vuoto");
  }