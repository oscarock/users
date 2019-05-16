new Vue({
    el: '#app',
    created: function(){
        this.getAllUsers()
    },
    data: {
        users: [],
        name: "",
        surname: "",
        document: "",
        phone: "",
        email: "",
        errors: []
    },

    methods: {
        getAllUsers: function(page){
            var urlUsers = "users"
            axios.get(urlUsers).then(response => {
                this.users = response.data
            })
        },
        createUser: function(){
            var urlCreate = "users"
            axios.post(urlCreate, {
                name: this.name,
                surname: this.surname,
                document: this.document,
                phone: this.phone,
                email: this.email
            }).then(response => {
                this.getAllUsers()
                this.name = ""
                this.surname = ""
                this.document = ""
                this.phone = ""
                this.email = ""
                this.errors = []
                $("#create").modal("hide")
                toastr.success("Agregado Correctamente.")
            }).catch(error => {
                //this.errors = error.response.data.errors
                if (error.response.status == 422){
                    this.errors = error.response.data.errors;
                    console.dir(this.errors.name[0])
                }
            })
        },
    }
})