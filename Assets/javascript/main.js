// --------- theme --------- //

  const ThemeButton = document.getElementById('theme-button')
  const StorageTheme = localStorage.getItem('selected-theme')

  if (StorageTheme) {
    if (StorageTheme == "light") {
      document.body.setAttribute("data-theme","light")
      ThemeButton.classList.remove("bi-moon-fill")
      ThemeButton.classList.add("bi-sun-fill")
    }else{
      document.body.setAttribute("data-theme","dark")
      ThemeButton.classList.remove("bi-sun-fill")
      ThemeButton.classList.add("bi-moon-fill")
    }
  }

  var Theme = getTheme()
  var Icon = getIcon()

  ThemeButton.addEventListener("click", () =>{
    setTheme(Theme);
    setNewInt()
  })

  function setNewInt(){
    document.body.style.transition = "background .5s ease-in-out"
  }

  function getTheme(){
    return document.body.getAttribute("data-theme")
  }

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