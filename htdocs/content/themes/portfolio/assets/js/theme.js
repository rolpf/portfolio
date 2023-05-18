import Alpine from 'alpinejs'
import ListingProjects from "./components/ListingProjects.js";
import LastProjectSlider from "./blocks/LastProjectSlider.js";
import BasicSlider from "./components/BasicSlider.js";

window.addEventListener('DOMContentLoaded', function (){
    LastProjectSlider().init();
    BasicSlider().init();
})

window.Alpine = Alpine

Alpine.data('ListingProjects', ListingProjects)

Alpine.start()