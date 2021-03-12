<template>

    <div class="container my-5">
        <section class="text-center dark-grey-text mb-5">
            <div class="card">
                <div class="card-body rounded-top border-top p-5">


                       <section v-if="show" class="text-center px-md-5 mx-md-5 dark-grey-text">
                           <div class="alert alert-dismissible alert-success">
                              <strong>Merci. Votre message est bien envoyé !</strong>
                           </div>
                       </section>
      

                    <h3 class="font-weight-bold my-4">Contact</h3>
                    <div class="mb-4 mx-md-5">

                           <div v-if="errors" class="alert alert-danger">
                               <div v-for="(err, index) in errors" :key="err.message">
                                   <p v-for="error in err" :key="error" class="text-sm">
                                      {{ index }}: {{ error }}
                                   </p>
                               </div>
                           </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <input v-if="user" type="text" id="name" v-model="name" class="form-control">
                                <input v-else type="text" id="name" v-model="name" class="form-control" placeholder="Votre nom">
                            </div>
                            <div class="col-md-6 mb-4">
                                <input v-if="user" type="email" v-model="email" id="email" class="form-control">
                                <input v-else type="email" v-model="email" id="email" class="form-control" placeholder="Votre Email">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <input v-model="sujet" type="text" id="sujet" class="form-control" placeholder="Sujet">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-4">
                                    <textarea v-model="message" class="form-control rounded" id="message" rows="3"
                                        placeholder="Votre message"></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="button" @click="post" class="btn btn-primary btn-md">Envoyer</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>
</template>


<script>
    export default {
  methods: {
     post(){
        this.show = false
        this.errors = null
        axios.post('/contact',{
            email: this.email,
            name: this.name,
            message: this.message,
            sujet: this.sujet,
        }).then(res => {
           if (res.status == 200) {
              this.show = true
               this.message = ''
               this.sujet = ''
           }
        }).catch(err =>{
           this.errors = err.response.data.errors
        })
     }
  },
  data () {
    return {
       email: '',
       name: '',
       message: '',
       sujet: '',
       errors: null,
       show: false
    }
  },
  props: ['user'],

  mounted(){
     if (this.user) {
       this.email = this.user.email
       this.name = this.user.name
     }
  }

    }

</script>

<style>
    .border-top {
        border-top: 5px solid #2b2d2e !important;
        border-top-left-radius: .25rem !important;
        border-top-right-radius: .25rem !important;
    }

</style>
