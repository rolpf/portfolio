import Swiper from "swiper/bundle";
import 'swiper/css/bundle';
export default function LastProjectSlider() {
    return {
        swiper: null,
        init() {
            this.swiper = new Swiper(".last-projects-slider", {
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: "auto",
                rewind: true,
                initialSlide: 1,
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: true,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                spaceBetween: 100,
            });

            return this;
        }
    }
}