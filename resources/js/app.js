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
        errors: [],
        fillUser: {'id': '', 'name': '', 'surname': '', 'document': '', 'phone': '', 'email': ''}
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
                this.errors = error.response.data.errors
            })
        },
        viewUser: function(users){
            this.fillUser.id = users.id
            this.fillUser.name = users.name
            this.fillUser.surname = users.surname
            this.fillUser.document = users.document
            this.fillUser.phone = users.phone
            this.fillUser.email = users.email
            $("#view").modal("show")
        },
        updateUser: function(users){
            var urlUpdate = "users/" + users.id
            axios.put(urlUpdate, {
                name: users.name,
                surname: users.surname,
                document: users.document,
                phone: users.phone,
                email: users.email
            }).then(response => {
                this.getAllUsers()
                this.name = ""
                this.surname = ""
                this.document = ""
                this.phone = ""
                this.email = ""
                this.errors = []
                $("#view").modal("hide")
                toastr.success("Modificado Correctamente.")
            }).catch(error => {
                this.errors = error.response.data.errors
            })
        }
    }
})