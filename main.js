const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn.querySelector("i");

menuBtn.addEventListener("click", () => {
  navLinks.classList.toggle("open");
  const isOpen = navLinks.classList.contains("open");
  menuBtnIcon.setAttribute("class", isOpen ? "ri-close-line" : "ri-menu-line");
});

const scrollRevealOption = {
  origin: "bottom",
  distance: "50px",
  duration: 1000,
};

ScrollReveal().reveal(".header__container h1", scrollRevealOption);
ScrollReveal().reveal(".header__container form", { ...scrollRevealOption, delay: 500 });
ScrollReveal().reveal(".range__card", { interval: 300 });

// Market values for featured livestock
const prices = ["4,500", "2,800", "5,200", "1,200", "3,900"];
const priceEl = document.getElementById("select-price");
const selectCards = document.querySelectorAll(".select__card");

// Initialize first card
selectCards[0].classList.add("show__info");

const swiper = new Swiper(".swiper", {
  loop: true,
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  coverflowEffect: {
    rotate: 0,
    depth: 200,
    modifier: 1,
    scale: 0.8,
    slideShadows: false,
    stretch: -50,
  },
  on: {
    slideChange: function () {
      const index = this.realIndex;
      priceEl.innerText = prices[index];
      selectCards.forEach((card) => card.classList.remove("show__info"));
      selectCards[index].classList.add("show__info");
    },
  },
});