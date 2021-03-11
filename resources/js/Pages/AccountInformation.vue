<template>
<div class="border border-light p-5">
<notifications class="mt-5" group="success" position="right top" />
    <p class="h4 mb-4 text-center">Mes Informations</p>

            <div v-if="errors" class="alert alert-danger">
                <div v-for="err in errors" :key="err.message">
                    <p v-for="error in err" :key="error" class="text-sm">
                        {{ error }}
                    </p>
                </div>
            </div>

   <label for="name">Nom</label>
    <input type="text" id="name" v-model="name" class="form-control mb-4">

   <label for="email">Email</label>
    <input type="email" id="email" v-model="email" class="form-control mb-4">

    <button class="btn btn-info btn-block my-4" @click="save" type="submit">Mettre à jour</button>
   <a class="btn btn-primary my-4" href="/password/reset" type="button">Modifier mon mot de passe</a>

</div>
</template>

<script>
export default {
  methods: {
     save(){
        this.errors = null
        axios.post('/account/update',{
           name: this.name,
           email: this.email
        }).then(res => {
            this.$notify({
               group: 'success',
               type: 'success',
               title: 'Modification du compte',
               text: 'Vos informations sont à jour!'
            });
        }).catch(err => {
           this.errors = err.response.data.errors
            this.$notify({
               group: 'success',
               type: 'warn',
               title: 'Modification du compte',
               text: 'Oups désolé il y eu une erreur!'
            });
        })
     }
  },
  data () {
    return {
       email: this.user.email,
       name: this.user.name,
       errors: null
    }
  },
  props: ['user'],
   
}
</script>
