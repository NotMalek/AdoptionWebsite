function display(){
    let refresh=1000;
    mytime=setTimeout('display_()',refresh)
}

function display_() {
    let today = new Date()
    document.getElementById('time').innerHTML = today;
    display();
}

function validateForm() {
    let x = document.forms["myForm"]["fname"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}

var a = 123;
var b = new String("123");
console.log(a==b);



