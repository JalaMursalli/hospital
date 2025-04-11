const hamburger=document.querySelector(".hamburger")
const closeMenu=document.querySelector(".closeMenu")
const asideMenuContainer=document.querySelector(".aside-menu-container")
hamburger?.addEventListener("click",()=>{
  asideMenuContainer.style.right="0"
})
closeMenu?.addEventListener("click",()=>{
  asideMenuContainer.style.right="-100%"
})
const current_langs=document.querySelectorAll(".current-lang")
current_langs.forEach(current_lang=>{
  current_lang?.addEventListener("click",()=>{
    current_lang.parentElement.classList.toggle("active")
  })
})
document.addEventListener("click", (e) => {
  current_langs.forEach((btn) => {
    const parent = btn.parentElement;
    if (!parent.contains(e.target)) {
      parent.classList.remove("active");
    }
  });
});
document.addEventListener("DOMContentLoaded", () => {
  const menuItems = document.querySelectorAll('.menuItem');
  const prevButton = document.querySelector('.menu-prev');
  const nextButton = document.querySelector('.menu-next');
  const menuBoxes = document.querySelectorAll(".menu-boxes");

  const thirtItem= menuItems[2];
  if(thirtItem){
    thirtItem.classList.add("active")
    const thirtId=thirtItem.querySelector(".menuItem-inner p").id
    document.querySelector(`.menu-boxes[data-id="${thirtId}"]`).style.display="grid"
  }

  const slideMenu = (direction) => {
      const items = [...menuItems].map(item => item.querySelector('.menuItem-inner').innerHTML);

      if (direction === 'next') {
          items.unshift(items.pop());
      } else if (direction === 'prev') {
          items.push(items.shift());
          menuBoxes.forEach(item => item.style.display = "grid");
      }

      menuItems.forEach((item, index) => {
          item.querySelector('.menuItem-inner').innerHTML = items[index];
          if(item.classList.contains("active")){
              menuBoxes.forEach(item => item.style.display = "none");
              const id=item.querySelector(".menuItem-inner p").id
              document.querySelector(`.menu-boxes[data-id="${id}"]`).style.display="grid"
          }
      });
  };

  prevButton?.addEventListener('click', () => slideMenu('prev'));
  nextButton?.addEventListener('click', () => slideMenu('next'));
});

var customer_review_slide = new Swiper(".customer-review-slide", {
  speed:1800,
  loop:true,
  slidesPerView:"auto",
  autoplay:{
      delay:2500
  },
  spaceBetween:20,
  pagination: {
    el: ".swiper-pagination",
    clickable:true
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  }
});

var doctors_slide = new Swiper(".doctors-slide", {
  speed:1800,
  loop:true,
  slidesPerView:"auto",
  autoplay:{
      delay:2500
  },
  spaceBetween:20,
  pagination: {
    el: ".swiper-pagination",
    clickable:true
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  }
});
var partners_slide = new Swiper(".partners-slide", {
  speed:1800,
  loop:true,
  slidesPerView:"auto",
  breakpoints:{
    1250:{
      spaceBetween:80
    },
    992:{
      spaceBetween:60
    },
    768:{
      spaceBetween:40
    },
    0:{
      spaceBetween:20
    }
  }

});
document.addEventListener("DOMContentLoaded", function () {
  const customselectTrigger = document.querySelector(".select-trigger");
  const customSelectCurrent = document.querySelector(".select-current");
  const customSelectoptions = document.querySelector(".select-options");

  customSelectCurrent?.addEventListener("click", () => {
    customSelectCurrent.parentElement.classList.toggle("active");
  });
  if(customSelectoptions){
    customSelectoptions.querySelectorAll(".option_item").forEach(option => {
        option?.addEventListener("click", () => {
          customselectTrigger.innerHTML = option.innerHTML;
          customSelectCurrent.parentElement.classList.remove("active");
        });
    });
  }


  document.addEventListener("click", (e) => {
      if (!customSelectCurrent.contains(e.target)) {
        customSelectCurrent.parentElement.classList.remove("active");
      }
  });
});

document.querySelectorAll('.file-area input[type="file"]').forEach((input) => {
  input?.addEventListener("change", function () {
    let fileArea = this.closest(".file-area"); // Parent olan file-area'yı bul
    let fileNameSpan = fileArea.querySelector(".fileName");

    if (this.files.length > 0) {
      fileNameSpan.textContent = this.files[0].name; // Dosya adını yazdır
      fileArea.classList.add("active"); // active sınıfını ekle
    } else {
      fileNameSpan.textContent = ""; // Dosya seçilmezse boş bırak
      fileArea.classList.remove("active"); // active sınıfını kaldır
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const seminarTabBtns = document.querySelectorAll(".seminarTabBtn");
  const seminarCards = document.querySelector(".seminar-cards");
  const classListToRemove = ["allInfos", "allSeminars", "all"];

  seminarTabBtns.forEach((seminarTabBtn) => {
    if (seminarTabBtn.id === "all") {
      seminarTabBtn.classList.add("active");
      seminarCards.classList.add("all");
    }

    seminarTabBtn?.addEventListener("click", () => {
      seminarTabBtns.forEach(btn => btn.classList.remove("active"));

      classListToRemove.forEach(className => {
        if (seminarCards.classList.contains(className)) {
          seminarCards.classList.remove(className);
        }
      });
      seminarTabBtn.classList.add("active");
      if (seminarTabBtn.id === "all") {
        seminarCards.classList.add("all");
      }
      else if(seminarTabBtn.id === "information"){
        seminarCards.classList.add("allInfos");
      }
      else if(seminarTabBtn.id === "seminar"){
        seminarCards.classList.add("allInfos");
      }
    });
  });
});
