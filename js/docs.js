const testone = document.getElementById("test1")
const testtwo = document.getElementById("test2")
const content1 = document.getElementById("content1")
const content2 = document.getElementById("content2")

const navtab = document.getElementsByClassName("nav-item")
function onclick1() {
    if (content1.style.display = "none") {
        content1.style.display = "block"
        content2.style.display = "none";
    }
    testone.className = "nav-item active"
    testtwo.className = "nav-item"
}
function onclick2() {
    if (content2.style.display = "none") {
        content2.style.display = "block"
        content1.style.display = "none"
    }
    testtwo.className = "nav-item active"
    testone.className = "nav-item"
}

for (let i = 0; i < navtab.length; i++ ) {
    if (navtab[i].className.includes("active")) {
        navtab[i].ariaPressed = "true"
        console.log(navtab[i])
    } else {
        navtab[i].ariaPressed = "false"
    }
}



