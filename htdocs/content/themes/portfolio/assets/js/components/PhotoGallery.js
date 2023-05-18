import Swiper from "swiper/bundle";
import 'swiper/css/bundle';

export default function PhotoGallery(firstImage) {
    return {
        swiper: null,
        selected: null,
        init() {
            this.initSwiper();
            this.$nextTick(() => {
                this.selected = firstImage;
            })
        },
        initSwiper() {
            this.swiper = new Swiper(".slider-selector", {
                speed: 1000,
                slidesPerView: 3,
                spaceBetween: 10,
                navigation: {
                    nextEl: ".selector-next",
                    prevEl: ".selector-prev",
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    }
                }
            })

            return this;
        },
        handleClick(event) {
            this.selected = event.target.dataset.largeimage;
        }
    }
}