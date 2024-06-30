// const nav=document.querySelector('nav');
// const menu=document.querySelector('.menu').addEventListener('click',open);
// function open(){
//     nav.classList.toggle('display');
// }


const menu=document.querySelector(".menu").addEventListener("click",open);
function open(){
    const nav=document.querySelector("nav");
    nav.classList.toggle("display");
}

// open dropdown 
const drop=document.querySelector(".btndrop").addEventListener("click", opendrop);
const dropdown=document.querySelector(".dropdown");
function opendrop(){
    dropdown.classList.toggle("dropdownopen");
}


