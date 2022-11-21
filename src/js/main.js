import "../scss/style.scss"

import App from "./App.vue"
import transition from "./transition"
import sliders from "./sliders"
import filtreThematiques from "./filtre-thematiques"
import bulles from "./bulles"
import parallax from "./parallax"
import customCursor from "./custom-cursor"
import complements from "./complements"

Vue.createApp(App).mount("#page")

const init = () => {
	bulles()
	sliders()
	filtreThematiques()
	transition()
	parallax()
	customCursor()
	complements()
}

window.addEventListener("pageshow", init)
