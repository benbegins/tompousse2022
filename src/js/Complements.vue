<script>
import axios from "axios"

export default {
	props: {
		id: String,
	},
	data() {
		return {
			pageComplement: null,
		}
	},
	computed: {
		listeComplements() {
			if (this.pageComplement) {
				return this.pageComplement.acf.complements
			}
		},
	},
	methods: {
		getComplementsList() {
			axios
				.get(
					`http://tompousse.local/wp-json/wp/v2/complement/${this.id}`
				)
				.then((response) => {
					this.pageComplement = response.data
				})
				.catch((error) => {
					console.log(error)
				})
		},
	},
	mounted() {
		this.getComplementsList()
	},
	// template: `
	//     <h2 class="section-title">Documents PDF</h2>
	//     <ul>
	//         <li v-for="complement in listeComplements">
	//             <div v-if="complement.acf_fc_layout === 'document_pdf'">
	//             Document téléchargeable
	//             </div>
	//         </li>
	//     </ul>
	//     `,
}
</script>

<style></style>
