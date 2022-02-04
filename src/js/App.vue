<script>
export default {
	data() {
		return {
			menuActive: false,
			subMenuActive: false,
			menuCompact: false,
			menuFiltre: false,
			searchModal: false,
			commanderModal: false,
		}
	},
	methods: {
		closeSubMenu() {
			if (window.innerWidth >= 1024) {
				this.subMenuActive = false
			}
		},
		menu() {
			window.addEventListener("scroll", (e) => {
				if (window.scrollY > 100) {
					this.menuCompact = true
				} else {
					this.menuCompact = false
				}
			})
		},
		openSearchModal() {
			this.searchModal = true

			setTimeout(() => {
				this.$refs.inputSearchModal.focus()
			}, 250)
		},
		bodyOverflow(val) {
			const body = document.querySelector("body")
			if (val == true) {
				body.classList.add("overflow-hidden")
			} else {
				body.classList.remove("overflow-hidden")
			}
		},
		linkClasses() {
			if (this.$refs.richText) {
				const links = document.querySelectorAll(".rich-text a")
				links.forEach((link) => {
					if (link.firstChild.nodeName !== "IMG") {
						link.classList.add("link-basic")
					}
				})
			}
		},
	},
	mounted() {
		this.menu()
		this.linkClasses()
	},
	watch: {
		menuActive: function (val) {
			this.bodyOverflow(val)
		},
		menuFiltre: function (val) {
			this.bodyOverflow(val)
		},
	},
}
</script>
