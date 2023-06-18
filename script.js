
//navbar start
const btn=document.querySelector(".heading>button");


function myFunction() {
  let x = document.querySelector(".vertical-link");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
    x.style.position="absolute";
  }
}

function funcName() {
    let x = document.querySelector(".vertical-link");
    x.style.display = "none";
}
btn.addEventListener("click",myFunction);
window.addEventListener('resize', funcName);

//navbar-end


//for search
function populate(s1,s2){
    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);
    s2.innerHTML ="";
    if(s1.value == "residential"){
        var optionArray=['|--SELECT LOCATION--','dhaka|Dhaka','chattogram|Chattogram','khulna|Khulna','rajshahi|Rajshahi','sylhet|Sylhet']
    }
    else if(s1.value=="commercial"){
        var optionArray=['|--SELECT LOCATION--','dhaka|Dhaka','chattogram|Chattogram','sylhet|Sylhet']
    }
    else if(s1.value=="condominium"){
        var optionArray=['|--SELECT LOCATION--','dhaka|Dhaka','chattogram|Chattogram','khulna|Khulna','rajshahi|Rajshahi']
    }
    else{
         var optionArray=['|--SELECT LOCATION--'];
    }
    for(var option in optionArray)
    {
        var pair=optionArray[option].split("|");
        var newoption=document.createElement("option");

        newoption.value=pair[0];
        newoption.innerHTML=pair[1];
        s2.options.add(newoption);
    }
}

// projects

let scrollContainer=document.querySelector(".projects")
let backBtn=document.getElementById('backBtn');
let nextBtn=document.getElementById('nextBtn');
function scrollcontrol(scrmedia2){
if(scrmedia2.matches){
    nextBtn.addEventListener("click",()=>{
        scrollContainer.style.scrollBehavior="smooth";
        scrollContainer.scrollLeft+=280;
    });
    backBtn.addEventListener("click",()=>{
        scrollContainer.style.scrollBehavior="smooth";
        scrollContainer.scrollLeft-=280;
    });
}else{
    nextBtn.addEventListener("click",()=>{
        scrollContainer.style.scrollBehavior="smooth";
        scrollContainer.scrollLeft+=500;
    });
    backBtn.addEventListener("click",()=>{
        scrollContainer.style.scrollBehavior="smooth";
        scrollContainer.scrollLeft-=500;
    });
}
}
var scrmedia2=window.matchMedia("(max-width: 600px)");
scrollcontrol(scrmedia2);




// about sec.
// let aboutscroll=document.getElementById("#aboutBody")
// function start() {

//     setTimeout(function( ) {
//         aboutscroll.style.scrollBehavior="smooth";
//         aboutscroll.scrollLeft+=768;


//       // Again
//       start();

//       // Every 3 sec
//     }, 1000);
// }

// Begins
// start();


//navbar link start
const homeLink = document.querySelector(".home-link");
homeLink.addEventListener("click",funcName);

const serLink = document.querySelector(".service-link");
serLink.addEventListener("click",funcName);

const proLink = document.querySelector(".project-link");
proLink.addEventListener("click",funcName);

const conLink = document.querySelector(".contact-link");
conLink.addEventListener("click",funcName);

const logLink = document.querySelector(".login-link");
logLink.addEventListener("click",funcName);

const signLink = document.querySelector(".signup-link");
signLink.addEventListener("click",funcName);

//navbar-link end



//for login page

