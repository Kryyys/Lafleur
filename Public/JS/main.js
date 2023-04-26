// REDUCTION DE LA BARRE DE NAVIGATION

document.addEventListener("scroll", (event) => {
  if (document.documentElement.scrollTop > 50) {
    document.getElementById("big").className = "reduced";
    document.getElementById("big_logo").className = "reduced_logo";
  } else {
    document.getElementById("big").className = "";
    document.getElementById("big_logo").className = "";
  }
});

// BANNIERE DEFILEMENT IMAGE

let scrollbar = document.querySelector(".scrollbar");
let imagesContainer = scrollbar.querySelector(".images-container");
let images = imagesContainer.querySelectorAll("img");
let prevButton = scrollbar.querySelector(".prev-button");
let nextButton = scrollbar.querySelector(".next-button");
let currentIndex = 0;

setInterval(function () {
  currentIndex++;
  if (currentIndex >= images.length) {
    currentIndex = 0;
  }
  let distance = currentIndex * (images[0].width + 10);
  imagesContainer.style.transform = `translateX(-${distance}px)`;
}, 14000);

prevButton.addEventListener("click", function () {
  currentIndex--;
  if (currentIndex < 0) {
    currentIndex = images.length - 1;
  }
  let distance = currentIndex * (images[0].width + 10);
  imagesContainer.style.transform = `translateX(-${distance}px)`;
});

nextButton.addEventListener("click", function () {
  currentIndex++;
  if (currentIndex >= images.length) {
    currentIndex = 0;
  }
  let distance = currentIndex * (images[0].width + 10);
  imagesContainer.style.transform = `translateX(-${distance}px)`;
});

// QUANTITE PAGE ARTICLE

function increaseCount(a, b) {
  let input = b.previousElementSibling;
  let value = parseInt(input.value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  input.value = value;
}

function decreaseCount(a, b) {
  let input = b.nextElementSibling;
  let value = parseInt(input.value, 10);
  if (value > 1) {
    value = isNaN(value) ? 0 : value;
    value--;
    input.value = value;
  }
}

// <!-- <?php if (prix total < 50) {
//   rajoute frais de livraisons
//   span prix total 
// } else {
//   Frais de livraison gratuit
//   span prix total
// }?> -->
