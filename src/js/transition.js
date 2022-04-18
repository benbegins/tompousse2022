import { gsap } from "gsap"

gsap.defaults({
	ease: "power3.inOut",
})

const transition = () => {
	// Page transition IN
	const tlIntro = gsap.timeline({})
	tlIntro.fromTo(
		".page-transition__intro",
		{
			scaleX: 1,
		},
		{
			scaleX: 0,
			transformOrigin: "left",
			ease: "power3.inOut",
			duration: 1,
		}
	)
	tlIntro.to(
		".page-transition__loading",
		{
			opacity: 0,
			duration: 0.5,
			ease: "linear",
		},
		"-=1"
	)
	tlIntro.to(
		".page-transition__overlay",
		{
			opacity: 0,
			duration: 0.5,
			ease: "linear",
		},
		"-=0.5"
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
		"-=0.5"
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
				const tlOutro = gsap.timeline()

				tlOutro.to(".page-transition__overlay", {
					opacity: 0.85,
					duration: 0.5,
					ease: "linear",
				})

				tlOutro.to(
					".page-transition__loading",
					{
						opacity: 1,
						duration: 0.5,
						ease: "linear",
					},
					"-=0"
				)

				tlOutro.to(
					".page-transition__intro",
					{
						scaleX: 1,
						transformOrigin: "right",
						ease: "power3.inOut",
						duration: 1,
					},
					"-=1"
				)

				setTimeout(() => {
					window.location.assign(href)
				}, 1000)
			}
		})
	})
}

export default transition
