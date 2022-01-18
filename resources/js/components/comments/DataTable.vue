<template>
    <div>
        <table class="table table-striped table-hover" id="table_id">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Id</th>
                    <th scope="col" class="text-center">Title</th>
                    <th scope="col" class="text-center">Comment</th>
                    <th scope="col" class="text-center">Date</th>
                    <th scope="col" class="text-center">buttons</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(comment, index) in comments" :key="index">
                    <td>{{ comment.id }}</td>
                    <td>{{ comment.title }}</td>
                    <td>{{ comment.short_comment }}</td>
                    <td>{{ comment.create }}</td>
                    <td class="d-flex justify-content-center">
                        <button class="btn btn-sm btn-outline-danger me-3" v-on:click.prevent="remove(comment.id)"><i class="fas fa-trash"></i></button>
                        <router-link :to="{ name: 'Form', params: {id: comment.id} }" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-edit"></i>
                        </router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                comments: [],
            }
        },
        mounted(){
            this.getData()
            // this.$swal('Hello Vue world!!!');
        },
        methods:{
            async getData(){
                await axios
                    .get('/api/comments')
                    .then(res => {
                        this.comments = res.data.data
                    })
            },

            async remove(idComment){
                this.$swal({
                    'icon': 'info',
                    'text': 'Seguro quieres eliminar este registro?',

                    showCancelButton: true,
                    cancelButtonText: 'No, cancelar!',
                    confirmButtonText: 'Si, eliminar!',

                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-danger me-2',
                        cancelButton: 'btn btn-outline-secondary'
                    },
                }).then(res => {
                    if(res.isConfirmed){
                        axios
                            .delete('api/comments/' + idComment)
                            .then(res => {
                                if(res.data.isConfirmed){
                                    this.$swal( 'Eliminado!', 'Se elimino con exito.', 'success' )
                                    this.getData()
                                } else{
                                    this.$swal( '', res.data.message, 'warning' )
                                }
                            })
                            .catch(err => {
                                this.$swal( 'error!', '', 'error' )
                                console.log(err)
                            })

                    }
                })
            }
        }

    }
</script>

<style lang="scss" scoped>

</style>
