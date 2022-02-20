const action = document.querySelectorAll('.action')
const comedy = document.querySelectorAll('.comedy')
const adv = document.querySelectorAll('.adv')
const horror = document.querySelectorAll('.horror')
const drama = document.querySelectorAll('.drama')
const card = document.querySelectorAll('.card')


function change(e){
    e.style = "visibility: visible; display: flex;";
}

function changeIn(e){
    e.style = "visibility: hidden; display: none;";
}

function getSelectValue() {
var selectedvalue = document.getElementById("list").value;
console.log(selectedvalue);
switch(selectedvalue){
    case 'action':
        card.forEach(changeIn);
        action.forEach(change);
        break;
    case 'comedy':
        card.forEach(changeIn);
        comedy.forEach(change);
        break;   
    case 'adv':
        card.forEach(changeIn);
        adv.forEach(change);
        break;  
    case 'drama':
        card.forEach(changeIn);
        drama.forEach(change);
        break;  
    case 'horror':
        card.forEach(changeIn);
        horror.forEach(change);
        break; 
    case 'all':
        card.forEach(change);
        break;
}
}