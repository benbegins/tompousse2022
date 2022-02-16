import "../scss/style.scss"

import App from "./App.vue"
import transition from "./transition"
import sliders from "./sliders"
import filtreThematiques from "./filtre-thematiques"
import bulles from "./bulles"
import parallax from "./parallax"

Vue.createApp(App).mount("#page")

const init = () => {
	bulles()
	sliders()
	filtreThematiques()
	transition()
	parallax()
}

window.addEventListener("pageshow", init)
