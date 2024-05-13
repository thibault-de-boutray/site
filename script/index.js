const slide = ["photo1.png", "photo2.png", "photo3.png"];
let numero = 0;
const monElement = document.getElementById("slider");

function ChangeSlide(sens) {
    if ((numero + sens) < 0) {
        numero = slide.length - 1;
    }
    if ((numero + sens) >= slide.length) {
        numero = 0;
    } else {
        numero += sens;
    }   
    document.getElementById("image_slide").src = "./img/" + slide[numero];
}

function autoScrollIfNotOnSlider() {
    var slider = document.getElementById("slider");
    var cursorOnSlider = false;

    slider.addEventListener("mouseover", function() {
        cursorOnSlider = true;
    });

    slider.addEventListener("mouseout", function() {
        cursorOnSlider = false;
    });

    setInterval(function() {
        if (!cursorOnSlider) {
            ChangeSlide(1);
        }
    }, 5000);
}
autoScrollIfNotOnSlider();

function scrollToSection(sectionId) {
    var section = document.getElementById(sectionId);
    if (section) {
        section.scrollIntoView({ behavior: 'smooth' });
    }
}