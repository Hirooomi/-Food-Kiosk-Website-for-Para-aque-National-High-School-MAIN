let topText = document.getElementById("topText")

function expandtopText(){
    topText.style.whiteSpace = "initial"
    topText.style.height = "intiail"
}
function collapsetopText(){
    topText.style.whiteSpace = "nowrap"
    topText.style.height = ""
}

function colOrex(){
    if (topText.style.whiteSpace == "initial") {
        collapsetopText()
    }else{
        expandtopText()
    }
}
function openNavBar(){
    document.getElementById("dimPane").style.display = "block"
}

function openDim(){
    document.getElementById("dimPane").style.display = "block"
}

function closeDim(){
    document.getElementById("dimPane").style.display = "none"
    closeSideBar()
}

function openSideBar(){
    document.getElementById("sideBar").style.width = "70%"
    document.getElementById("sideBar").style.display = "block"
    openDim()
}

function closeSideBar(){
    document.getElementById("sideBar").style.width = "0"
    document.getElementById("sideBar").style.display = "none"
    closeDim()
}               