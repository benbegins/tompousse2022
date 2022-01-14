module.exports = {
	content: [
		"./src/**/*.html",
		"./src/**/*.vue",
		"./src/**/*.jsx",
		"./**/*.php",
	],
	theme: {
		colors: {
			dark: "#333333",
			light: "#fff4e8",
			orange: "#d95c15",
			green: "#4f9a93",
		},
		container: {
			padding: {
				DEFAULT: "1.25rem",
				sm: "3rem",
				lg: "4vw",
			},
			center: true,
		},
		screens: {
			sm: "640px",
			md: "768px",
			lg: "1024px",
			xl: "1280px",
			xxl: "1480px",
		},
	},
	variants: {},
	plugins: [],
}
