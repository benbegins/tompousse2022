import { gsap } from "gsap"
import { ScrollTrigger } from "gsap/ScrollTrigger"

gsap.registerPlugin(ScrollTrigger)

const parallax = () => {
	// HOME
	if (document.querySelector(".home") && window.innerWidth >= 1024) {
		const imageLeft = document.querySelector(".hero__images .left")
		const imageRight = document.querySelector(".hero__images .right")
		const textContent = document.querySelector(".hero .text-content")

		gsap.to(imageLeft, {
			transformOrigin: "top left",
			xPercent: -30,
			// yPercent: -50,
			rotate: 20,
			opacity: 0,
			ease: "none",
			scrollTrigger: {
				trigger: imageLeft,
				scrub: 0.2,
				start: "bottom bottom",
				end: "200% top",
			},
		})

		gsap.to(imageRight, {
			transformOrigin: "top right",
			xPercent: 30,
			// yPercent: -50,
			rotate: -20,
			opacity: 0,
			ease: "none",
			scrollTrigger: {
				trigger: imageRight,
				scrub: 0.2,
				start: "bottom bottom",
				end: "200% top",
			},
		})

		gsap.to(textContent, {
			yPercent: 100,
			ease: "none",
			scrollTrigger: {
				scrub: true,
				trigger: imageLeft,
				start: "bottom bottom",
				end: "bottom top",
			},
		})
	}
}
export default parallax
