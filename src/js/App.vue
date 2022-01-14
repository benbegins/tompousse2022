<script>
export default {
    data(){
        return{
            menuActive: false,
            subMenuActive: false,
            menuCompact: false,
        }
    },
    methods:{
        closeSubMenu(){
            if(window.innerWidth >= 1024){
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
    },
    mounted(){
        this.menu()
    },
    watch:{
        menuActive: function(val){
            const body = document.querySelector('body');
            if(val == true){
                body.classList.add('overflow-hidden');
            } else {
                body.classList.remove('overflow-hidden');
            }
        }
    }
}
</script>