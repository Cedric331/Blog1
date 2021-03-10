<template>
<div class="border border-light p-5">

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
            this.email = res.data.user.email
            this.name = res.data.user.name
        }).catch(err => {
           this.errors = err.response.data.errors
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
