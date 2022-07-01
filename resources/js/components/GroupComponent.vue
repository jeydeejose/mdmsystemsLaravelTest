<template>
<div>
                    <button class="btn btn-primary float-end" @click="updateBtn(0, '')">Create</button>
                    <table class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Group Name</th>
                                <th>Admin</th>
                                <th>Actions</th>
                       
                            </tr>
                        </thead>
                        <tbody>
                                <td v-if='list.length === 0' colspan='3'>There are no data yet!</td>
                                <tr v-for="(data, index) in list">

                                <td>{{data.name}}</td>
                                <td>{{data.admin_user_id}}</td>
                      
                                <td>
                                    <a v-bind:href=" '/groups/' + data.id "><input type="button" class="btn btn-primary" value="View users"></a>
                                    <button class="btn btn-warning" @click="updateBtn(data.id, data.name, data.admin_user_id)">Update</button>
                                    <button class="btn btn-danger" @click="remove(data.id)">Delete</button>
                                </td>
             
                    
            
                                </tr>
                        </tbody>
                    </table>
                    <div class="modal" id="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">{{modalHeader}}</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">

                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="data.name"> 
                       
                                    <label>Admin</label>
                                    <input type="text" class="form-control" v-model="data.admin_user_id" > 

                                    <button v-if="data.id==''" @click="store()" class="btn btn-primary">Create</button>
                    
                                    <button v-if="data.id!=''" @click="update(data.id, data.name, data.admin_user_id)" class="btn btn-primary">Update</button>
                                    
                                    
                                    
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>

</div>


</template>




<script>
    export default {
        mounted() {


        },
        data(){ 
            return{
                list: [],
                data: {
                    id:"",
                    name:"",
                    admin_user_id:""
                },
                modalHeader:""
            
            }
        },
        created() {
            this.fetchData();
        },

        methods:
        {
            fetchData() {
                axios.get('/groups/datatable').then((res) => {
                    this.list = res.data;
                })
                .catch(e => {console.log(e);})
            },
            updateBtn(id, name, userid) {
                if(id!=0)
                {
                    this.data.id=id;
                    this.data.name=name;
                    this.data.admin_user_id=userid;

                    this.openModal('modal', 'show', 'Updating Group');
                }
                else
                {
                    this.data.id="";
                    this.data.name="";
                    this.data.admin_user_id="";

                    this.openModal('modal', 'show', 'Creating Group');
                }

                
            },
            store() {
                axios.post('/groups/store', {
                    name: this.data.name,
                    admin_user_id: this.data.admin_user_id
                })
                .then((res) => {
                    console.log(res.data);
                    this.openModal('modal', 'hide');
                    this.fetchData();
                })
                .catch((err) => console.error(err));

            },            
            update(id, name, admin_user_id) {

                console.log(id+" - "+name);
                axios.post('/groups/update', {
                    id: id,
                    name: name,
                    admin_user_id: admin_user_id
                })
                .then((res) => {
                    console.log(res.data);
                    this.openModal('modal', 'hide');
                    this.fetchData();
                })
                .catch((err) => console.error(err));

            },
            remove(id) {
                axios.post('/groups/destroy/', {
                    id: id,
                })
                .then((res) => {
                    console.log(res.data);
                    this.fetchData();
                })
                .catch((err) => console.error(err));


            },          
            openModal(id, action, header) {
                this.modalHeader = header;
                $('#'+id).modal(action);
            },   
        }
    }
</script>