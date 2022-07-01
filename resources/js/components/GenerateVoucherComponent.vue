<template>
    <div>
        <button class="btn btn-primary float-end" @click="process">Generate</button>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Generating Voucher</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h2>{{code}}</h2>
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
                code:"",
        
            }
        },

        methods:
        {
            process: function (event){
                $('#myModal').modal('show');

                let uri = `/voucher-code/store`;

                axios.post(uri, {
                    // firstName: 'Fred',
                    // lastName: 'Flintstone',
                })
                .then(response => 
                {
                    this.code = response.data;
                    $('#example').DataTable().ajax.reload();
                })
                .catch(e => {console.log(e);})

            
            }
        }
    }
</script>