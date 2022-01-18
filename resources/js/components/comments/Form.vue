<template>
    <form v-on:submit.prevent="store()">
        <div class="form-floating mb-3">
            <input type="text" :class="`form-control is-${(errors && errors.title) ? 'invalid' : ''}`" id="text" placeholder="Write Title"  v-model="fields.title">
            <label for="text">Title:</label>
            <div class="invalid-feedback">
                {{ (errors && errors.title) ? errors.title[0] : ''}}
            </div>
        </div>
        <div class="form-floating mb-3">
            <textarea :class="`form-control is-${(errors && errors.comment_text) ? 'invalid' : ''}`" placeholder="Write Comment" id="comment" style="height: 200px" v-model="fields.comment_text"></textarea>
            <label for="comment">Comment Text:</label>
            <div class="invalid-feedback">
                {{ (errors && errors.comment_text) ? errors.comment_text[0] : ''}}
            </div>
        </div>
        <div >
            <input type="reset" value="Reset" class="btn btn-outline-danger me-3" v-on:click.prevent="resetData()">
            <button type="submit" :class="`btn btn-success ${ loading ? 'disabled' : ''}`" :disabled="loading">
                <span v-if="!loading">Submit</span>
                <div v-else>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    {{ fields.id ? 'updating' : 'Saving' }}...
                </div>
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        data(){
            return {
                loading: false,
                fields:{
                    id: null,
                    title: "",
                    comment_text: "",
                },

                errors: {}
            }
        },
        mounted(){
            if(this.$route.params.id) this.getData()
        },
        methods:{
            async getData(){
                await axios
                    .get(`/api/comments/${this.$route.params.id}`)
                    .then(res => {
                        this.fields =   res.data.data
                    })
            },

            async store(){
                if(this.loading) return

                this.loading = true

                this.fields.id ? this.update() : this.insert()


            },

            async insert(){
                await axios
                    .post('/api/comments', this.fields)
                    .then(res => {
                        this.$swal({
                            icon: 'success',
                            title: 'Saved correct'
                        }).then((result) => {
                            this.$router.push('/')
                        })
                    })
                    .catch(error => {
                        this.$swal({
                            icon: 'error',
                            title: 'Required fields'
                        }).then((result) => {
                            if(error.response.status === 422) this.errors = error.response.data.errors
                            this.loading = false
                        })
                    })
            },

            async update(){
                await axios
                    .put(`/api/comments/${this.$route.params.id}`, this.fields)
                    .then(res => {
                        this.$swal({
                            icon: 'succes',
                            title: 'Saved correct'
                        }).then((result) => {
                            this.$router.push('/')
                        })
                    })
                    .catch(error => {
                        this.$swal({
                            icon: 'error',
                            title: 'Required fields'
                        }).then((result) => {
                            if(error.response.status === 422) this.errors = error.response.data.errors
                            this.loading = false
                        })
                    })
            },
            resetData(){
                this.loading = false,

                this.fields.title = ''
                this.fields.comment_text = ''
                this.errors = {}
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
