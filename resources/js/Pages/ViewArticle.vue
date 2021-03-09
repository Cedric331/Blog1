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

                <div class="text-center font-weight-bold mb-5"><span>({{commentaires.length}}) </span>Commentaires</div>

                <div v-for="(commentaire, index) in commentaires" :key="commentaire.id">
                    <div v-if="count > index" class="media d-block d-md-flex mt-3 shadow p-1 mb-2 bg-white rounded">
                        <div class="media-body text-center text-md-left ml-md-3 ml-0">
                            <em>Posté le: {{ commentaire.created_at }} <strong
                                    v-if="commentaire.created_at != commentaire.updated_at">- modifié</strong></em>
                            <p class="font-weight-bold my-0">
                                {{ commentaire.user.name }}:
                            </p>
                            <p style="white-space: pre-line;">
                                {{ commentaire.commentaire }}
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
                        <button v-if="user && user.id == commentaire.user.id" @click="formEditComment(commentaire)"
                            class="btn btn-info rounded mr-1 mt-1 btn-sm">Editer</button>
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
    export default {
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
            },
            commentCount() {
                this.count += 5;
            },
            formEditComment(commentaire) {
                if (commentaire.id == this.commentEditFormVisible) {
                    this.commentEditFormVisible = Number
                } else {
                    this.commentEditFormVisible = commentaire.id
                    this.commentEditVisible = commentaire.commentaire
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
        },

        props: ['article', 'user'],
    }

</script>
