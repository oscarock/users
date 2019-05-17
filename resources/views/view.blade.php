<!-- The Modal -->
<form method="POST" v-on:submit.prevent="viewUser(fillUser.id)">
    <div class="modal fade" id="view">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ver Usuario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="name">Nombre</label>
                        <span v-if="errors.name" :class="['text-danger']">@{{ errors.name[0] }}</span>
                        <input type="text" name="name" class="form-control" v-model="fillUser.name">
                    </div>
                    <div class="col-md-12">
                        <label for="surname">Apellido</label>
                        <span v-if="errors.surname" :class="['text-danger']">@{{ errors.surname[0] }}</span>
                        <input type="text" name="surname" class="form-control" v-model="fillUser.surname">
                    </div>
                    <div class="col-md-12">
                        <label for="document">Numero Documento</label>
                        <span v-if="errors.document" :class="['text-danger']">@{{ errors.document[0] }}</span>
                        <input type="text" name="document" class="form-control" v-model="fillUser.document">
                    </div>
                    <div class="col-md-12">
                        <label for="phone">Telefono</label>
                        <span v-if="errors.phone" :class="['text-danger']">@{{ errors.phone[0] }}</span>
                        <input type="text" name="phone" class="form-control" v-model="fillUser.phone">
                    </div>
                    <div class="col-md-12">
                        <label for="email">Email</label>
                        <span v-if="errors.email" :class="['text-danger']">@{{ errors.email[0] }}</span>
                        <input type="email" name="email" class="form-control" v-model="fillUser.email">
                    </div>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Actualizar" v-on:click.prevent="updateUser(fillUser)">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</form>