var myIndex = 0;

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");

    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {
        myIndex = 1;
    }
    x[myIndex - 1].style.display = "block";
    setTimeout(carousel, 3000); // Change image every 3 seconds
}

function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    expandImg.src = imgs;
    expandImg.parentElement.style.display = "block";
}

function openNav() {
    document.getElementById("mySidenav").style.width = "90%";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.body.style.backgroundColor = "white";
}

const append = (element1, price, element2) => {
    curr1 = parseInt(document.getElementById(element1).value);
    console.log(curr1);
    document.getElementById(element1).value = curr1 + 1;
    document.getElementById(element2).innerHTML =
        Math.round((curr1 + 1) * price * 100) / 100;
};

const prepand = (element1, price, element2) => {
    curr1 = parseInt(document.getElementById(element1).value);
    console.log(curr1);
    if (curr1 > 1) {
        document.getElementById(element1).value = curr1 - 1;
        document.getElementById(element2).innerHTML =
            Math.round((curr1 - 1) * price * 100) / 100;
    }
};

function hide1(prod1) {
    var x = document.getElementById(prod1);
    x.style.display = "none";
}
