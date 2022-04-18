import axios from "axios"

const filtreThematiques = () => {
	const pageThematiques = document.querySelector(".page-thematiques")

	// On vérifie qu'on est bien sur une page Thématique
	if (pageThematiques) {
		const thematiques = pageThematiques.querySelectorAll(
			".livres__filter__item"
		)
		let thematiquesSelected = []

		// On détecte les changements dans chaque checkbox et on ajoute les données au tableau thematiquesSelected
		const init = () => {
			thematiques.forEach((thematique) => {
				const checkbox = thematique.querySelector(
					'input[type = "checkbox"]'
				)
				checkbox.addEventListener("change", () => {
					if (checkbox.checked == true) {
						// Si le checkbox est coché on ajoute la thématique au tableau et on formate les données
						thematiquesSelected.push(checkbox.name)
						formatDatas(thematiquesSelected)
					} else {
						// Si il est décoché, on enlève la thématique du tableau et on formate les données
						thematiquesSelected = thematiquesSelected.filter(
							(item) => {
								return item !== checkbox.name
							}
						)
						formatDatas(thematiquesSelected)
					}
					// Mets à jour les filtres actifs sur mobile
					setActifFilters(thematiquesSelected)
				})
			})
		}
		init()

		// On formate les données du tableau pour les envoyer à la fonction de requete Ajax
		const formatDatas = (datas) => {
			let thematiquesFormated = ""

			datas.forEach((data) => {
				if (thematiquesFormated) {
					thematiquesFormated += `&${data}`
				} else {
					thematiquesFormated += data
				}
			})
			// On envoie la requête
			getBooks(thematiquesFormated)
		}

		// Filtres actifs Mobile
		const setActifFilters = (datas) => {
			const filtresActifs = pageThematiques.querySelectorAll(
				".filtres-actifs__item"
			)
			filtresActifs.forEach((filtre) => {
				if (datas.includes(filtre.dataset.filtre)) {
					// On ajoute la classe active si le filtre est contenu dans la tableau de thématiques sélectionnées
					filtre.classList.add("active")

					// On ajoute l'événement au click
					filtre.addEventListener("click", () => {
						const checkboxes = pageThematiques.querySelectorAll(
							'input[type="checkbox"]'
						)
						checkboxes.forEach((checkbox) => {
							// En cliquant sur un filtre actif, on le supprime et on décoche la checkbox correspondante
							if (checkbox.name == filtre.dataset.filtre) {
								checkbox.checked = false
								filtre.classList.remove("active")
								thematiquesSelected =
									thematiquesSelected.filter((item) => {
										return item !== checkbox.name
									})
							}
						})
						// On met à jour les données
						formatDatas(thematiquesSelected)
					})
				} else {
					filtre.classList.remove("active")
				}
			})
		}
	}

	// Requete AJAX
	function getBooks(thematiques) {
		const thematiqueParent = pageThematiques.dataset.thematique
		const livresContainer = pageThematiques.querySelector(
			".livres__list-container"
		)
		const rechercheEnCours = pageThematiques.querySelector(
			".livres__list__search-progress"
		)

		// Fade out + Recherche en cours
		livresContainer.style.opacity = 0
		rechercheEnCours.style.display = "block"

		// Params
		let params = new URLSearchParams()
		params.append("action", "filtre_thematiques")
		params.append("thematiques", thematiques)
		params.append("thematique_parent", thematiqueParent)

		// Requete Ajax
		axios.post("/wp-admin/admin-ajax.php", params).then((response) => {
			if (response.data.data) {
				livresContainer.innerHTML = response.data.data
				livresContainer.style.opacity = 1
				rechercheEnCours.style.display = "none"
			} else {
				rechercheEnCours.style.display = "none"
				livresContainer.innerHTML =
					"Pas de livres correspondant à la recherche"
			}
		})
	}
}

export default filtreThematiques
