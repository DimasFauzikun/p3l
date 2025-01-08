"use strict";

/**
 * navbar toggle
 */

const navbar = document.querySelector("[data-navbar]");
const navbarLinks = document.querySelectorAll("[data-nav-link]");
const menuToggleBtn = document.querySelector("[data-menu-toggle-btn]");

menuToggleBtn.addEventListener("click", function () {
  navbar.classList.toggle("active");
  this.classList.toggle("active");
});

for (let i = 0; i < navbarLinks.length; i++) {
  navbarLinks[i].addEventListener("click", function () {
    navbar.classList.toggle("active");
    menuToggleBtn.classList.toggle("active");
  });
}

/**
 * header sticky & back to top
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

window.addEventListener("scroll", function () {
  if (window.scrollY >= 100) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
  } else {
    header.classList.add("active");
    backTopBtn.classList.add("active");
    // header.classList.remove("active");
    // backTopBtn.classList.remove("active");
  }
});

/**
 * search box toggle
 */

const searchBtn = document.querySelector("[data-search-btn]");
const searchContainer = document.querySelector("[data-search-container]");
const searchSubmitBtn = document.querySelector("[data-search-submit-btn]");
const searchCloseBtn = document.querySelector("[data-search-close-btn]");

const searchBoxElems = [searchBtn, searchSubmitBtn, searchCloseBtn];

for (let i = 0; i < searchBoxElems.length; i++) {
  searchBoxElems[i].addEventListener("click", function () {
    searchContainer.classList.toggle("active");
    document.body.classList.toggle("active");
  });
}

/**
 * move cycle on scroll
 */

const deliveryBoy = document.querySelector("[data-delivery-boy]");

let deliveryBoyMove = -80;
let lastScrollPos = 0;

window.addEventListener("scroll", function () {
  let deliveryBoyTopPos = deliveryBoy.getBoundingClientRect().top;

  if (deliveryBoyTopPos < 500 && deliveryBoyTopPos > -250) {
    let activeScrollPos = window.scrollY;

    if (lastScrollPos < activeScrollPos) {
      deliveryBoyMove += 1;
    } else {
      deliveryBoyMove -= 1;
    }

    lastScrollPos = activeScrollPos;
    deliveryBoy.style.transform = `translateX(${deliveryBoyMove}px)`;
  }
});

// Format input as currency
function formatCurrency(input) {
  let value = input.value.replace(/[^\d]/g, ""); // Menghapus semua non-digit
  if (value.length > 0) {
    value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."); // Menambahkan titik setiap 3 digit
    input.value = "Rp " + value;
  } else {
    input.value = "";
  }
}

// validasi nomor telpon
function validatePhone() {
  const phoneInput = document.getElementById("phone");
  const errorElement = document.getElementById("phone-error");

  // Hapus karakter non-numerik
  const sanitizedValue = phoneInput.value.replace(/[^0-9]/g, "");

  // Jika ada karakter non-numerik yang dihapus, tampilkan pesan error
  if (phoneInput.value !== sanitizedValue) {
    errorElement.style.display = "block"; // Tampilkan pesan error
    phoneInput.value = sanitizedValue; // Perbarui nilai input hanya dengan angka
  } else {
    errorElement.style.display = "none"; // Sembunyikan pesan error
  }
}

// hari tidak boleh sama dengan hari ini dan sebelumnya
document.addEventListener("DOMContentLoaded", function () {
  const dateInput = document.getElementById("date");

  function setMinDate() {
    const today = new Date();
    today.setDate(today.getDate());

    const minDate = today.toISOString().split("T")[0];
    dateInput.setAttribute("min", minDate);
  }
  setMinDate();

  dateInput.addEventListener("click", function () {
    const today = new Date();
    today.setDate(today.getDate());

    const minDate = today.toISOString().split("T")[0];
    dateInput.setAttribute("min", minDate);
  });
});

// validasi cek budget harus berupa angka
function validateBudget() {
  const budgetInput = document.getElementById("budget");
  const errorElement = document.getElementById("budget-error");
  const inputValue = budgetInput.value.replace(/[^0-9]/g, "");

  if (inputValue === "") {
    errorElement.style.display = "block";
    budgetInput.value = "";
    return;
  }

  const formattedValue =
    "Rp." + parseInt(inputValue, 10).toLocaleString("id-ID");
  budgetInput.value = formattedValue;

  errorElement.style.display = "none";
}

// menyalakan opsi wedding packages jika opsi = wedding organizer
function toggleWeddingPackages() {
  const weddingOrganizerCheckbox = document.getElementById("wedding-organizer");
  const packagesContainer = document.getElementById(
    "wedding-packages-container"
  );

  if (weddingOrganizerCheckbox.checked) {
    packagesContainer.style.display = "block";
  } else {
    packagesContainer.style.display = "none";
  }
}

// Memastikan input hanya angka ketika form disubmit
document.querySelector("form").addEventListener("submit", function (event) {
  let budgetField = document.getElementById("budget");
  let budgetValue = budgetField.value.replace(/[^\d]/g, ""); // Hapus simbol 'Rp' dan titik
  budgetField.value = budgetValue; // Simpan hanya angka tanpa simbol
});

// sweet allert
document
  .getElementById("contactForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    const form = event.target;

    let valid = true;
    form
      .querySelectorAll("input[required], select[required], textarea[required]")
      .forEach((input) => {
        if (!input.value.trim()) {
          valid = false;
        }
      });

    if (valid) {
      Swal.fire({
        icon: "success",
        title: "Success",
        text: "Data berhasil disimpan!",
      }).then(() => {
        form.submit();
      });
    } else {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Harap lengkapi semua data yang diperlukan!",
      });
    }
  });
