const complements = () => {
	const pageComplement = document.querySelector(".page-complement")

	if (pageComplement) {
		const audioFiles = pageComplement.querySelectorAll("audio")

		audioFiles.forEach((audio, index) => {
			audio.addEventListener("play", (event) => {
				audioFiles.forEach((audio) => {
					if (audio !== event.target) {
						audio.pause()
						audio.currentTime = 0
					}
				})
			})
		})
	}
}

export default complements
