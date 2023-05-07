export default function ListingProjects() {
    return {
        selected: null,
        toggle(project) {
            if (this.selected === project) {

                this.selected = null;
            } else {
                this.selected = project;
            }
        }
    }
}