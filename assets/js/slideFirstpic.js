var i = 0;
var images = [];
var time = 5000;

//Image list
images[0] = 'images/img/image1.jpg';
images[1] = 'images/img/image2.png';
images[2] = 'images/img/image3.png';


function changeImg() {
  document.slide.src = images[i];

  if (i < images.length -1) {
    i++;
  } else {
    i = 0;
  }
  setTimeout("changeImg()", time);
}

window.onload = changeImg;




coco = document.querySelector('.coco')
navbar = document.querySelector('.navbar')
navlist = document.querySelector('.navlist')
rightNavbar = document.querySelector('.right-navbar')

coco.addEventListener('click', () => {
    navlist.classList.toggle('visibility-resp')
    rightNavbar.classList.toggle('visibility-resp')
    navbar.classList.toggle('nav-height-resp')
})


$(document).ready(function() {
  

    $(".post-wrapper").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      nextArrow: $(".next"),
      prevArrow: $(".prev"),
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
  });
  
  