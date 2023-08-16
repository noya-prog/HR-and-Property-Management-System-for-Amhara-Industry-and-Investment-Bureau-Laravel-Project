const swiper = new Swiper(".swiper", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    effect: "fade",
    autoplay: {
        delay: 4500,
        disableOnInteraction: false,
    },
    cubeEffect: {
        shadow: true,
        slideShadows: true,
        shadowOffset: 20,
        shadowScale: 0.94,
    },

    // If we need pagination
    pagination: {
        // el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    // And if we need scrollbar
    // scrollbar: {
    //     el: '.swiper-scrollbar',

    // },
});

var multipleCardCarousel = document.querySelector("#carouselExampleControls");
if (window.matchMedia("(min-width: 768px)").matches) {
    var carousel = new bootstrap.Carousel(multipleCardCarousel, {
        interval: false,
    });
    var carouselWidth = $(".carousel-inner")[0].scrollWidth;
    var cardWidth = $(".carousel-item").width();
    var scrollPosition = 0;
    $("#carouselExampleControls .carousel-control-next").on(
        "click",
        function () {
            if (scrollPosition < carouselWidth - cardWidth * 4) {
                scrollPosition += cardWidth;
                $("#carouselExampleControls .carousel-inner").animate(
                    { scrollLeft: scrollPosition },
                    600
                );
            }
        }
    );
    $("#carouselExampleControls .carousel-control-prev").on(
        "click",
        function () {
            if (scrollPosition > 0) {
                scrollPosition -= cardWidth;
                $("#carouselExampleControls .carousel-inner").animate(
                    { scrollLeft: scrollPosition },
                    600
                );
            }
        }
    );
} else {
    $(multipleCardCarousel).addClass("slide");
}
