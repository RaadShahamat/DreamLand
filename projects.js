// let v1=document.querySelector(".btn1");
// let x1=document.querySelector(".view1");
// x1.style.display="none";
// v1.addEventListener("click",function details(){
//     if(x1.style.display=="none"){
//         x1.style.display="block";
//     }else{
//         x1.style.display="none";
//     }
// })

// let v2=document.querySelector(".btn2");
// let x2=document.querySelector(".view2");
// x2.style.display="none";
// v2.addEventListener("click",function details(){
//     if(x2.style.display=="none"){
//         x2.style.display="block";
//     }else{
//         x2.style.display="none";
//     }
// })

// let v3=document.querySelector(".btn3");
// let x3=document.querySelector(".view3");
// x3.style.display="none";
// v3.addEventListener("click",function details(){
//     if(x3.style.display=="none"){
//         x3.style.display="block";
//     }else{
//         x3.style.display="none";
//     }
// })

// let v4=document.querySelector(".btn4");
// let x4=document.querySelector(".view4");
// x4.style.display="none";
// v4.addEventListener("click",function details(){
//     if(x4.style.display=="none"){
//         x4.style.display="block";
//     }else{
//         x4.style.display="none";
//     }
// })
// let v5=document.querySelector(".btn5");
// let x5=document.querySelector(".view5");
// x5.style.display="none";
// v5.addEventListener("click",function details(){
//     if(x5.style.display=="none"){
//         x5.style.display="block";
//     }else{
//         x5.style.display="none";
//     }
// })
// let v6=document.querySelector(".btn6");
// let x6=document.querySelector(".view6");
// x6.style.display="none";
// v6.addEventListener("click",function details(){
//     if(x6.style.display=="none"){
//         x6.style.display="block";
//     }else{
//         x6.style.display="none";
//     }
// })
// let v7=document.querySelector(".btn7");
// let x7=document.querySelector(".view7");
// x7.style.display="none";
// v7.addEventListener("click",function details(){
//     if(x7.style.display=="none"){
//         x7.style.display="block";
//     }else{
//         x7.style.display="none";
//     }
// })
// let v8=document.querySelector(".btn8");
// let x8=document.querySelector(".view8");
// x8.style.display="none";
// v8.addEventListener("click",function details(){
//     if(x8.style.display=="none"){
//         x8.style.display="block";
//     }else{
//         x8.style.display="none";
//     }
// })
// let v9=document.querySelector(".btn9");
// let x9=document.querySelector(".view9");
// x9.style.display="none";
// v9.addEventListener("click",function details(){
//     if(x9.style.display=="none"){
//         x9.style.display="block";
//     }else{
//         x9.style.display="none";
//     }
// })




// //for pagination
// const paginationNumbers = document.getElementById("pagination-numbers");
// const paginatedList = document.getElementById("paginated-list");
// const listItems = paginatedList.querySelectorAll(".container-box");
// const nextButton = document.getElementById("next-button");
// const prevButton = document.getElementById("prev-button");

// const paginationLimit = 4;
// const pageCount = Math.ceil(listItems.length / paginationLimit);
// let currentPage = 1;

// const disableButton = (button) => {
//   button.classList.add("disabled");
//   button.setAttribute("disabled", true);
// };

// const enableButton = (button) => {
//   button.classList.remove("disabled");
//   button.removeAttribute("disabled");
// };

// const handlePageButtonsStatus = () => {
//   if (currentPage === 1) {
//     disableButton(prevButton);
//   } else {
//     enableButton(prevButton);
//   }

//   if (pageCount === currentPage) {
//     disableButton(nextButton);
//   } else {
//     enableButton(nextButton);
//   }
// };

// const handleActivePageNumber = () => {
//   document.querySelectorAll(".pagination-number").forEach((button) => {
//     button.classList.remove("active");
//     const pageIndex = Number(button.getAttribute("page-index"));
//     if (pageIndex == currentPage) {
//       button.classList.add("active");
//     }
//   });
// };

// const appendPageNumber = (index) => {
//   const pageNumber = document.createElement("button");
//   pageNumber.className = "pagination-number";
//   pageNumber.innerHTML = index;
//   pageNumber.setAttribute("page-index", index);
//   pageNumber.setAttribute("aria-label", "Page " + index);

//   paginationNumbers.appendChild(pageNumber);
// };

// const getPaginationNumbers = () => {
//   for (let i = 1; i <= pageCount; i++) {
//     appendPageNumber(i);
//   }
// };

// const setCurrentPage = (pageNum) => {
//   currentPage = pageNum;

//   handleActivePageNumber();
//   handlePageButtonsStatus();
  
//   const prevRange = (pageNum - 1) * paginationLimit;
//   const currRange = pageNum * paginationLimit;

//   listItems.forEach((item, index) => {
//     item.classList.add("hidden");
//     if (index >= prevRange && index < currRange) {
//       item.classList.remove("hidden");
//     }
//   });
// };

// window.addEventListener("load", () => {
//   getPaginationNumbers();
//   setCurrentPage(1);

//   prevButton.addEventListener("click", () => {
//     setCurrentPage(currentPage - 1);
//   });

//   nextButton.addEventListener("click", () => {
//     setCurrentPage(currentPage + 1);
//   });

//   document.querySelectorAll(".pagination-number").forEach((button) => {
//     const pageIndex = Number(button.getAttribute("page-index"));

//     if (pageIndex) {
//       button.addEventListener("click", () => {
//         setCurrentPage(pageIndex);
//       });
//     }
//   });
// });