<template>

    <div class="container-fluid my-3 px-5 pt-5 pb-1 z-depth-1">
         
        <section class="text-center">

            <h2 class="font-weight-bold mb-5">Mon Compte</h2>

            <div class="row mb-5">

                <div class="col-12">

                    <ul class="nav md-pills nav-justified mb-4 mt-2">
                        <li class="nav-item">
                            <a class="nav-link mt-2 btn btn-primary rounded" data-toggle="tab" href="#panel100"
                                role="tab">Mes Informations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mt-2 btn btn-primary rounded" data-toggle="tab" href="#panel101"
                                role="tab">Mes commentaires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mt-2 btn btn-primary rounded" type="button" @click="deleteUser">Supprimer
                                mon compte</a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane fade in show active" id="panel100" role="tabpanel">
                            <div class="view rounded z-depth-1-half mx-4">
                                <information :user="user"></information>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="panel101" role="tabpanel">
                            <div class="view rounded z-depth-1-half mx-4">
                                <comment :comments="comments"></comment>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>
    </div>
</template>


<script>
    import information from './AccountInformation'
    import comment from './AccountComment'
    export default {
        methods: {
            deleteUser() {
                let message = "Voulez-vous supprimer votre compte?";

                let options = {
                    html: false,
                    loader: true, 
                    reverse: true,
                    okText: 'Oui',
                    cancelText: 'Annuler',
                    animation: 'zoom', 
                    type: 'basic',  
                    backdropClose: true,
                    customClass: '' 
                };

                this.$dialog.confirm(message, options)
                    .then(dialog => {
                        axios.post('/account/delete/' + this.user.id,{
                           _method: 'delete',
                        }).then(res => {
                        if (res.status == 200) {
                           window.location = '/'
                        }
                     }).catch(err => {

                        })
                    })
                    .catch(function () {
                        // This will be triggered when user clicks on cancel
                    });
            }
        },
        props: ['user', 'comments'],
        components: {
            information,
            comment
        }
    }

</script>

<style>
.dg-btn--ok {
  background-color: green;
  border-color: green;
  color: white;
}
.dg-btn--cancel{
   background-color: red;
   border-color: red;
   color: white;
}
</style>