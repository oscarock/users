new Vue({
    el: '#app',
    created: function(){
        this.getAll()
        this.getAllVotes()
    },
    data: {
        superhero: [],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0
        },
        fillsuperhero: {'id': '', 'name': '', 'picture': '', 'publisher':'', 'info':'info'},
        votesSuperhero: [],
    },
    computed: {
		isActived: function() {
			return this.pagination.current_page;
		},
		pagesNumber: function() {
			if(!this.pagination.to){
				return [];
			}

			var from = this.pagination.current_page - this.offset; 
			if(from < 1){
				from = 1;
			}

			var to = from + (this.offset * 2); 
			if(to >= this.pagination.last_page){
				to = this.pagination.last_page;
			}

			var pagesArray = [];
			while(from <= to){
				pagesArray.push(from);
				from++;
			}
			return pagesArray;
		}
	},
    methods: {
        getAll: function(page){
            var urlsuperhero = "api/superheros?page=" + page
            axios.get(urlsuperhero).then(response => {
                this.superhero = response.data.superheros.data
                this.pagination = response.data.pagination
            })
        },
        localStorageState: function(id,state){
            localStorage.setItem(id, state);
            if(state == "like"){
                toastr.success("me gusta")
            }else{
                toastr.error("no me gusta")
            }
        },
        viewSuperhero: function(superhero){
            this.fillsuperhero.id = superhero.id
            this.fillsuperhero.name = superhero.name
            this.fillsuperhero.picture = superhero.picture
            this.fillsuperhero.publisher = superhero.publisher
            this.fillsuperhero.info = superhero.info

            $("#view").modal("show")
        },
        voteSuperhero: function(superhero){
            var urladdvote = 'addVote'
            axios.get(urladdvote, {
                params: {
                  id: superhero
                }
                }).then(response => {
                    $("#view").modal("hide")
                    toastr.success("Voto Agregado!!")
            })
        },
        getAllVotes: function(){
            var urlgetvotes = "votesSuperheros"
            axios.get(urlgetvotes).then(response => {
                this.votesSuperhero = response.data
            })
        },
        changePage: function(page) {
			this.pagination.current_page = page;
			this.getAll(page);
		}
    }
})