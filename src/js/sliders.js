import Swiper, { Navigation } from "swiper"
import "/node_modules/swiper/swiper.min.css"

Swiper.use([Navigation])

const sliders = () => {
	const swiperLivres = new Swiper(".slider-livres", {
		freeMode: true,
		speed: 400,
		breakpoints: {
			320: {
				slidesPerView: 1,
			},
			640: {
				slidesPerView: 2,
				slidesPerGroup: 2,
			},
			1024: {
				slidesPerView: 3,
				slidesPerGroup: 3,
				speed: 600,
			},
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	})

	const swiperArticles = new Swiper(".slider-articles", {
		breakpoints: {
			320: {
				slidesPerView: 1,
			},
			640: {
				slidesPerView: 2,
				slidesPerGroup: 2,
			},
			1024: {
				slidesPerView: 3,
			},
		},
	})
}

export default sliders
