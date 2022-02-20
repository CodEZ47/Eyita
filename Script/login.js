const useremail = document.getElementById('uemail').value;
const userpassword = document.getElementById('pswd').value;
function CheckValidaton(useremail, userpassword){
    if(Email.slice(-9, 0) != "@gmail.com"){
        window.alert("You have entered invalid email address!");
        return false;
    }
    else if(password.length < 6 || password.length > 10){
        window.alert("password length must be between 6 and 10 characters!");
        return false;
    }
    else
        return true;
}

const Loginemail = document.getElementById('loginemail').value;
const Loginpassword = document.getElementById('loginpassword').value;

function CheckRegistered(Loginemail, Loginpassword){
    if(Email.slice(-9, 0) != "@gmail.com"){
        window.alert("You have entered invalid email address!");
        return false;
    }
    else if(password.length < 6 || password.length > 10){
        window.alert("password length must be between 6 and 10 characters!");
        return false;
    }
    else
        return true;
}