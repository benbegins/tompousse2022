import gsap from "gsap"

const customCursor = () => {
	const cursor = document.querySelector(".custom-cursor")

	if (cursor) {
		window.addEventListener("pointermove", (e) => {
			gsap.to(cursor, {
				x: e.clientX,
				y: e.clientY,
				duration: 0.5,
				ease: "Power2.easeOut",
			})
		})

		// Over Links
		const links = document.querySelectorAll("a, .link, button")
		links.forEach((link) => {
			// Liste des liens pour lesquels il n'y a pas de custom cursor
			const classes = [
				"livre-card",
				"btn-secondary",
				"btn-primary",
				"no-cursor",
			]

			if (!classes.some((classe) => link.classList.contains(classe))) {
				link.addEventListener("mouseenter", () => {
					cursor.classList.add("active")
				})
				link.addEventListener("mouseleave", () => {
					cursor.classList.remove("active")
				})
			}
		})
	}
}

export default customCursor
