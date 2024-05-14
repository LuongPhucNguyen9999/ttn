const listImage = document.querySelector(".list-images");
const imgs = document.getElementsByClassName("slide-show-img");
const btnLeft = document.querySelector(".btn-left");
const btnRight = document.querySelector(".btn-right");
const length = imgs.length;
let current = 0;

const handleChangeSlide = () => {
  let width = imgs[0].offsetWidth; // Move this line outside of the if-else block

  if (current == length - 1) {
    current = 0;
    listImage.style.transform = `translateX(0)`;
  } else {
    current++;
    listImage.style.transform = `translateX(-${width * current}px)`; // Fix the translation
  }

  updateIndicator();
};

const updateIndicator = () => {
  document.querySelector(".active").classList.remove("active");
  document.querySelector(".index-item-" + current).classList.add("active");
};

let handleEventChangeSlide = setInterval(handleChangeSlide, 3000);

btnRight.addEventListener("click", () => {
  clearInterval(handleEventChangeSlide);
  handleChangeSlide();
  handleEventChangeSlide = setInterval(handleChangeSlide, 4000);
});

btnLeft.addEventListener("click", () => {
  clearInterval(handleEventChangeSlide);
  if (current == 0) {
    current = length - 1;
  } else {
    current--;
  }
  let width = imgs[0].offsetWidth;
  listImage.style.transform = `translateX(-${width * current}px)`; // Adjust here
  updateIndicator();
  handleEventChangeSlide = setInterval(handleChangeSlide, 4000);
});
