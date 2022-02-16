import { gsap } from "gsap"

gsap.defaults({
	ease: "power3.inOut",
})

const transition = () => {
	// Page transition IN
	const tlIntro = gsap.timeline({})
	tlIntro.fromTo(
		".site-intro",
		{
			scaleX: 1,
		},
		{
			scaleX: 0,
			transformOrigin: "left",
			ease: "Power3.out",
			duration: 1,
		}
	)
	tlIntro.from(
		"[data-reveal]",
		{
			x: 75,
			opacity: 0,
			duration: 1.5,
			ease: "power3.out",
			stagger: 0.25,
		},
		"-=1"
	)
	// Page transition Out
	const links = document.querySelectorAll("a")
	links.forEach((link) => {
		if (link.target == "_blank") {
			link.classList.add("no-transition")
		}
		link.addEventListener("click", (e) => {
			if (!link.classList.contains("no-transition")) {
				const href = link.href
				e.preventDefault()
				const tl = gsap.timeline()
				tl.to(".site-intro", {
					scaleX: 1,
					transformOrigin: "right",
					ease: "power3.in",
					duration: 1,
				})
				setTimeout(() => {
					window.location.assign(href)
				}, 1000)
			}
		})
	})
}

export default transition
