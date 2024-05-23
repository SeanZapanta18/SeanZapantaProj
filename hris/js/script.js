let pass1 = document.querySelector('.pass1');
let pass2 = document.querySelector('.pass2');
let res = document.querySelector('h5');
function checkPassword(){
    res.innerText = pass1.value == pass2.value ? 'Password Matched' : 'Password Not Matched';
}
pass1.addEventListener('keyup', () =>{
    if(pass2.value.length != 0) checkPassword();
})
pass2.addEventListener('keyup', checkPassword);

function eyeHidden(){
    var x = document.getElementById("myInput");
    var y = document.getElementById("eye-hide1");
    var z = document.getElementById("eye-hide2");

    if(x.type === 'password'){
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
    }
    else{
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
    }
}
function eyeHidden2(){
    var x = document.getElementById("myInput2");
    var y = document.getElementById("eye-hide3");
    var z = document.getElementById("eye-hide4");

    if(x.type === 'password'){
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
    }
    else{
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
    }
}