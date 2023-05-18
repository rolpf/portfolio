import Swiper from "swiper/bundle";
import 'swiper/css/bundle';

export default function BasicSlider() {
    return {
        swipers: null,
        instances: [],
        init() {
            this.swipers = document.querySelectorAll(".basic-slider");
            this.swipers.forEach((swiper) => {
                this.instances.push(new Swiper(swiper, {
                    speed: 1000,
                    pagination: {
                        el: ".swiper-pagination-basic",
                        clickable: true,
                    },
                    spaceBetween: 30,
                    slidesPerView: 1.3,
                }));
            });
            return this;
        }
    }
}