// function isInViewport(el) {
//     const rect = el.getBoundingClientRect();
//     // console.log(rect)
//     return (
//         rect.top >= 0 &&
//         rect.left >= 0 &&
//         rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
//         rect.right <= (window.innerWidth || document.documentElement.clientWidth)
//
//     );
// }
// function onClickSideBar(id) {
//     const elements = document.querySelectorAll(".sidebar-item")
//     const getId = document.getElementById(`${id}`)
//     console.log(getId)
//     for (let i = 0; i < elements.length; i++) {
//         if (getId === elements[i]) {
//             console.log("ENTRY FOUND! " + elements[i])
//         } else {
//             console.log('No entry found w/ ' + elements[i])
//
//         }
//     }
//     // console.log(elements)
// }
// console.log('hi', document, window)

// const html = document.querySelector("#home")
// const element = document.querySelector("#para");
// document.addEventListener("scroll", function() {
//     // isInViewport(html) ? console.log('The box is visible in the viewport') : console.log('The box is not visible in the viewport');
//     const messageText = isInViewport(html) ?
//         'The box is visible in the viewport' :
//         'The box is not visible in the viewport';
//     element.textContent = messageText;
// })
function sidebarChange() {}
