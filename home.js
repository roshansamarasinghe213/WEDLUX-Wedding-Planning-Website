
    document.addEventListener('DOMContentLoaded', function () {
        let slideImages = document.querySelectorAll('.slide-container .slides img');
        let next = document.querySelector('.next');
        let prev = document.querySelector('.prev');
        let dots = document.querySelectorAll('.dot');
        var counter = 0;
        let deleteInterval;

        next.addEventListener('click', sliderNext);
        function sliderNext() {
            slideImages[counter].style.animation = 'next1 1s ease-in forwards';
            if (counter >= slideImages.length - 1) {
                counter = 0;
            } else {
                counter++;
            }
            slideImages[counter].style.animation = 'next2 1s ease-in forwards';
            indicators();
        }

        prev.addEventListener('click', sliderPrev);
        function sliderPrev() {
            slideImages[counter].style.animation = 'prev1 1s ease-in forwards';
            if (counter == 0) {
                counter = slideImages.length - 1;
            } else {
                counter--;
            }
            slideImages[counter].style.animation = 'prev2 1s ease-in forwards';
            indicators();
        }

        function autoSliding() {
            deleteInterval = setInterval(timer, 5000);
            function timer() {
                sliderNext();
                indicators();
            }
        }
        autoSliding();

        const container = document.querySelector('.slide-container');
        container.addEventListener('mouseover', function () {
            clearInterval(deleteInterval);
        });
        container.addEventListener('mouseout', autoSliding);

        function indicators() {
            for (let i = 0; i < dots.length; i++) {
                dots[i].classList.remove('active');
            }
            dots[counter].classList.add('active');
        }

        function switchImage(currentImage) {
            currentImage.classList.add('active');
            var imageId = currentImage.getAttribute('attr');
            if (imageId > counter) {
                slideImages[counter].style.animation = 'next1 0.5s ease-in forwards';
                counter = imageId;
                slideImages[counter].style.animation = 'next2 0.5s ease-in forwards';
            } else if (imageId == counter) {
                return;
            } else {
                slideImages[counter].style.animation = 'prev1 0.5s ease-in forwards';
                counter = imageId;
                slideImages[counter].style.animation = 'prev2 0.5s ease-in forwards';
            }
            indicators();
        }
    });
