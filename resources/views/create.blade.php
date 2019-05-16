<!-- The Modal -->
<form method="POST" v-on:submit.prevent="createUser">
    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Usuario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" v-model="name">
                    </div>
                    <div class="col-md-6">
                        <label for="surname">Apellido</label>
                        <input type="text" name="surname" class="form-control" v-model="surname">
                    </div>
                    <div class="col-md-12">
                        <label for="document">Numero Documento</label>
                        <input type="text" name="document" class="form-control" v-model="document">
                    </div>
                    <div class="col-md-12">
                        <label for="phone">Telefono</label>
                        <input type="text" name="phone" class="form-control" v-model="phone">
                    </div>
                    <div class="col-md-12">
                        <label for="phone">Email</label>
                        <input type="email" name="email" class="form-control" v-model="email">
                    </div>
                    <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Guardar">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</form>