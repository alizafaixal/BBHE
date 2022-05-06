// slide show 
// var img = document.querySelector('.img');
// var images = ['images/beach4.jpg', 'images/beach3.jfif', 'images/beach.jpg', 'images/luxury_townhouse.jpeg', 'images/walk_view.jpg', 'images/banner.jpg', 'images/beach1.jpg'];
// let i = 0; // current image index
// function prev() {
//     if (i <= 0) { i = images.length }
//     i--
//     return setImg()
// }
// function next() {
//     if (i >= images.length - 1) { i = -1 }
//     i++
//     return setImg()

// }
// function setImg() {
//     return img.setAttribute('src', images[i])
// }
 let refreshBtn = document.querySelector('.refreshBtn');

 refreshBtn.addEventListener("click" , ()=> window.history.go());

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
//form
function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}
//popup testimonal
function togglePopup() {
    document.getElementById("popup").classList.toggle("active");
}
//popup dropdown navbar
function showNavDropDown() {
    document.getElementById("dropDown").classList.toggle("active");

}
//popup dropdown navbar
function dropdown() {
    document.getElementById("userDropdown").classList.toggle("active");

}
//popup show all photos
// let ShowPhotos = document.getElementById("ShowPhotos");
// function ShowPhotos() {
//     let container = document.body;
//     let newImgWindow = document.createElement("div");
//     container.appendChild(newImgWindow);
// };
// more text 
function MoreText() {
    if (document.getElementById("text").style.display === "block") {
        document.getElementById("text").style.display = "none";
        document.getElementById("textBtn").innerHTML = 'Read more';
    } else {
        document.getElementById("text").style.display = "block";
        document.getElementById("textBtn").innerHTML = 'Read less';
    }
}
// function ShowPhotos() {
//     document.getElementsByClassName(".allPhotos").style.display = "block";
// }
function readMore() {
    if (document.getElementById("Moretext").style.display === "block") {
        document.getElementById("Moretext").style.display = "none";
        document.getElementById("ReadMore").innerHTML = 'Read more';
        document.querySelector('.descBox').style.height = 'auto';
    } else {
        document.getElementById("Moretext").style.display = "block";
        document.getElementById("ReadMore").innerHTML = 'Read less';
        document.querySelector('.descBox').style.height = 'auto';
    }
}
