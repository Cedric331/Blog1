<template>
    <div class="container mt-5">
        <section class="text-justify">
            <h1 class="m-auto text-center">{{article.title}}</h1>
            <hr>
            <figure class="figure" v-if="article.image">
                <img :src="'/storage/images/'+article.image" class="figure-img img-fluid z-depth-1"
                    :alt="article.title">
            </figure>

            <div class="container-fluid text-center" v-for="contenu in article.contenu" :key="contenu.id">
                <h3 class="text-primary lead" v-if="contenu.title">{{ contenu.title }}</h3>

                <figure class="rounded d-block" v-if="contenu.image">
                    <img :src="'/storage/images/'+contenu.image" class="imageArticle figure-img img-fluid z-depth-1"
                        :alt="contenu.title">
                </figure>

                <p class="text-primary lead" v-if="contenu.content">{{ contenu.content }}</p>
            </div>
            <p>
                Tags: <small v-for="(tag,index) in article.tag" :key="tag.id" class="d-inline">#{{tag.name}}<em
                        v-if="index+1 != article.tag.length"> - </em></small>
            </p>
        </section>
        <hr>

        <div class="container my-3 py-5 px-md-5 z-depth-1">

            <section class="text-center text-lg-left dark-grey-text">

                <div class="text-center font-weight-bold mb-5">
                   <span>({{commentaires.length}}) </span>
                   Commentaires - <like class="d-inline" :article="article" :user="user"></like>
               </div>
                     

                <div v-for="(commentaire, index) in commentaires" :key="commentaire.id">
                    <div v-if="count > index" class="media d-block d-md-flex mt-3 shadow p-1 mb-2 bg-white rounded">
                        <div class="media-body text-center text-md-left ml-md-3 ml-0">
                            <em>Posté le: {{ commentaire.created_at }} <strong
                                    v-if="commentaire.created_at != commentaire.updated_at">- modifié</strong></em>
                            <p style="white-space: pre-line;">
                                {{ commentaire.user.name }}: {{ commentaire.commentaire }}
                            </p>
                            <div v-if="commentEditFormVisible === commentaire.id"
                                class="form-group shadow-lg p-3 mb-5 bg-light rounded">
                                <div v-if="errorsEdit" class="alert alert-danger">
                                    <div v-for="err in errorsEdit" :key="err.message">
                                        <p v-for="error in err" :key="error" class="text-sm">
                                            {{ error }}
                                        </p>
                                    </div>
                                </div>
                                <label for="commentaire">Modifier le commentaire: </label>
                                <textarea class="form-control bg-white border border-dark" id="commentaire" rows="3"
                                    spellcheck="false" data-gramm="false" v-model="commentEditVisible"
                                    style="line-height: 21px;"></textarea>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary mt-3" @click.prevent="editComment">Envoyer</button>
                                </div>
                            </div>

                        </div>

                        <ul v-if="user && user.id == commentaire.user.id">
                            <li class="nav-item dropdown">
                                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                    aria-expanded="false"><i class="fas fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                    <a type="button" @click="formEditComment(commentaire)"
                                        class="dropdown-item rounded">Modifier</a>
                                    <a type="button" @click="deleteComment(commentaire.id)"
                                        class="dropdown-item rounded">Supprimer</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-5" v-if="count<commentaires.length">
                    <button class="btn btn-outline-primary btn-sm m-auto d-flex" @click="commentCount">Afficher plus de
                        commentaire
                    </button>
                </div>
            </section>


        </div>

        <div v-if="user" class="form-group shadow-lg p-3 mb-5 bg-light rounded">
            <div v-if="errors" class="alert alert-danger">
                <div v-for="err in errors" :key="err.message">
                    <p v-for="error in err" :key="error" class="text-sm">
                        {{ error }}
                    </p>
                </div>
            </div>
            <label for="commentaire">Poster un commentaire: </label>
            <textarea class="form-control bg-white border border-dark" v-model="commentaire" id="commentaire" rows="3"
                spellcheck="false" data-gramm="false" style="line-height: 21px;"></textarea>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary mt-3" @click.prevent="storeComment">Envoyer</button>
            </div>
        </div>


    </div>

</template>
<script>
  import Like from './LikeArticle'
    export default {
       components: {
          Like
       },
        data() {
            return {
                commentEditFormVisible: Number,
                commentEditVisible: String,
                count: 5,
                commentaire: '',
                commentaires: this.article.commentaires,
                errors: null,
                errorsEdit: null
            }
        },
        methods: {
            storeComment() {
               if (!this.user) {
                  window.location = '/login'
               } else {
                 axios.post('/commentaire', {
                    commentaire: this.commentaire,
                    article: this.article.id
                }).then(res => {
                    this.errors = null
                    this.errorsEdit = null
                    this.commentaire = ''
                    this.commentaires = res.data
                }).catch(err => {
                    this.errors = err.response.data.errors
                })
               }

            },
            commentCount() {
                this.count += 5;
            },
            formEditComment(commentaire) {
               if (!this.user) {
                  window.location = '/login'
               } else {
                if (commentaire.id == this.commentEditFormVisible) {
                    this.commentEditFormVisible = Number
                } else {
                    this.commentEditFormVisible = commentaire.id
                    this.commentEditVisible = commentaire.commentaire
                }
               }
            },
            editComment() {
                axios.patch('/commentaire/edit', {
                    id: this.commentEditFormVisible,
                    commentaire: this.commentEditVisible,
                }).then(res => {
                    this.errorsEdit = null
                    this.errors = null
                    this.commentaires = res.data
                    this.commentEditVisible = String
                    this.commentEditFormVisible = Number
                }).catch(err => {
                    this.errorsEdit = err.response.data.errors
                })
            },
            deleteComment(id) {
               let message = "Voulez-vous supprimer le commentaire ?";
 
               let options = {
                   html: false, // set to true if your message contains HTML tags. eg: "Delete <b>Foo</b> ?"
                   loader: true, // set to true if you want the dailog to show a loader after click on "proceed"
                   reverse: true, // switch the button positions (left to right, and vise versa)
                   okText: 'Oui',
                   cancelText: 'Annuler',
                   animation: 'fade', // Available: "zoom", "bounce", "fade"
                   type: 'basic', // coming soon: 'soft', 'hard'
                   verification: 'continue', // for hard confirm, user will be prompted to type this to enable the proceed button
                   verificationHelp: 'Type "[+:verification]" below to confirm', // Verification help text. [+:verification] will be matched with 'options.verification' (i.e 'Type "continue" below to confirm')
                   clicksCount: 3, // for soft confirm, user will be asked to click on "proceed" btn 3 times before actually proceeding
                   backdropClose: true, // set to true to close the dialog when clicking outside of the dialog window, i.e. click landing on the mask
                   customClass: '' // Custom class to be injected into the parent node for the current dialog instance
               };
                this.$dialog
                    .confirm(message, options)
                    .then(dialog => {
                        axios.delete('/commentaire/delete/' + id).then(res => {
                            this.errorsEdit = null
                            this.errors = null
                            this.commentaires = res.data
                            this.commentEditVisible = String
                            this.commentEditFormVisible = Number
                        }).catch(err => {})
                        setTimeout(() => {
                            dialog.close();
                        }, 500);
                    })
            },
        },

        props: ['article', 'user'],
    }

</script>
