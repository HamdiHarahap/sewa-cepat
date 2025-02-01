const navbar = document.getElementById("navbar");

window.addEventListener("scroll", () => {
    if (window.scrollY > 5) {
        navbar.classList.add("bg-blue-900");
    } else {
        navbar.classList.remove("bg-blue-900");
    }
});
