import Alpine from 'alpinejs'
import ListingProjects from "./components/ListingProjects.js";

window.Alpine = Alpine

Alpine.data('ListingProjects', ListingProjects)

Alpine.start()