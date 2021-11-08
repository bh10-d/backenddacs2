function select() {
    document.querySelector(".drop").classList.toggle("show");
}

//dropdown for nav-mobile
function dropdownnav() {
    document.querySelector(".arrow i").classList.toggle("rotage0");
    document.querySelector(".responsive__nav--list").classList.toggle("show");
}

//login-signup
function changetosignup() {
    document.querySelector(".login__block--signup").classList.remove("hidden")
    document.querySelector(".login__block").classList.add("hidden")
    document.querySelector("title").innerHTML = "Đăng ký"
    document.querySelector(".redirect").href = "signup.html"
    document.querySelector(".redirect").innerHTML = "Đăng ký"
}

function changetologin() {
    document.querySelector(".login__block--signup").classList.add("hidden")
    document.querySelector(".login__block").classList.remove("hidden")
    document.querySelector("title").innerHTML = "Đăng nhập"
    document.querySelector(".redirect").href = "login.html"
    document.querySelector(".redirect").innerHTML = "Đăng nhập"
}

//quantity
function quanityminus() {
    let count = parseInt(document.querySelector(".quantity").value)
    if (count !== 0) {
        count--
        document.querySelector(".quantity").value = count
        document.querySelector(".cart--count span").innerHTML = count
    }
    console.log(count)
}

function quantityplus() {
    let count = document.querySelector(".quantity").value
    count++
    document.querySelector(".quantity").value = count
    console.log('test: ' + document.querySelector(".quantity").value)
    document.querySelector(".cart--count span").innerHTML = count
}

//admin page 
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

closeBtn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
});

searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
    } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
    }
}