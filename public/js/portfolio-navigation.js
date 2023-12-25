document.addEventListener('DOMContentLoaded', function () {
    let carouselItems = document.querySelectorAll('.carousel__item');
    carouselItems[0].classList.add('active');
    
    let total = carouselItems.length;
    let current = 0;

    let moveRightBtn = document.getElementById('right__navigation');
    let moveLeftBtn = document.getElementById('left__navigation');

    // Case when clicked
    moveRightBtn.addEventListener('click', function () {
        let next = current;
        current += 1;
        setSlide(next, current);
    });

    moveLeftBtn.addEventListener('click', function () {
        let previous = current;
        current -= 1;
        setSlide(previous, current);
    });

    // Case when press right and left key on keyboard
    document.addEventListener('keydown', function (event) {
        if (event.key === "ArrowRight") {
            let next = current;
            current += 1;
            setSlide(next, current);
        } 

        if (event.key === "ArrowLeft") {
            let previous = current;
            current -= 1;
            setSlide(previous, current);
        }
    });

    function setSlide(previous, next) {
        let slide = current;
        
        if (next > total - 1) {
            slide = 0;
            current = 0;
        }

        if (next < 0) {
            slide = total - 1;
            current = total - 1;
        }
        
        carouselItems[previous].classList.remove('active');
        carouselItems[slide].classList.add('active');
        setTimeout(() => {}, 800);
        console.log('current ', + current);
        console.log('previous ', + previous);
    }
});