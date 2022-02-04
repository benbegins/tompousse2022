import gsap from "gsap"

const bulles = () => {
	const pageContainer = document.querySelector(".page-container")

	// Check if page container exist and there is no '.no-bulles' class
	if (pageContainer && !pageContainer.classList.contains("no-bulles")) {
		// Create bulles container
		const bulles = document.createElement("div")
		bulles.classList.add("bulles")
		bulles.setAttribute("data-reveal", "")
		pageContainer.append(bulles)

		// Create bulles items
		const nombreDeBulles = 5
		let listeBulles = []

		for (let n = 0; n < nombreDeBulles; n++) {
			const bulle = document.createElement("div")
			bulle.classList.add("bulles__item")
			bulles.append(bulle)
			listeBulles.push(bulle)

			// Random position
			const top = (Math.random() * 100).toFixed()
			const left = (
				Math.random() * (100 / nombreDeBulles) +
				(100 / nombreDeBulles) * n
			).toFixed()
			bulle.style.top = `${top}%`
			bulle.style.left = `${left}%`
			// console.log("bulle : " + n + ", top : " + top, ",left : " + left)

			// Bulle size
			const size = (Math.random() * 8).toFixed()
			bulle.style.width = `calc(2rem + ${size}vw)`
			bulle.style.height = `calc(2rem + ${size}vw)`

			// Bulle Velocity (depends on bulle size)
			const velocity = size * 2
			bulle.setAttribute("data-velocity", velocity)
		}

		// Animate on mouse move
		window.addEventListener("pointermove", (e) => {
			if (window.innerWidth >= 1024) {
				listeBulles.forEach((bulle) => {
					gsap.to(bulle, {
						x: `${
							(e.clientX - window.innerWidth / 2) *
							0.005 *
							Number(bulle.dataset.velocity)
						}`,
						y: `${(e.clientY - window.innerHeight / 2) * 0.05}`,
						duration: 3,
						ease: "Power2.easeOut",
					})
				})
			}
		})
	}
}

export default bulles
