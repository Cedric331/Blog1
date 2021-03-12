<template>
    <div class="container mt-5">
        <p class="text-center lead">Voici une fonction qui permet d'ajouter et de supprimer des photos, vous pouvez
            tester!</p>
        <notifications class="mt-5" group="success" position="right top" />
        <div class="text-center my-3">
            <h4>Ajouter une photo</h4><br>
            <div v-if="errors" class="alert alert-danger">
                <div v-for="err in errors" :key="err.message">
                    <p v-for="error in err" :key="error" class="text-sm">
                        {{ error }}
                    </p>
                </div>
            </div>
            <div style="max-width: 500px; margin: 0 auto;">
                <form @submit="submitForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="titre" class="form-label">Titre de la photo</label>
                        <input type="text" v-model="titre" class="form-control" id="titre"
                            placeholder="Titre de la photo..." required>
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <div class="btn btn-primary btn-sm float-left">
                                <span>Choisir un fichier</span>
                                <input type="file" name="filename" id="inputFileUpload" v-on:change="onFileChange"
                                    required>
                            </div>
                        </div>
                        <div class="input-group-append">
                            <input type="submit" class="btn btn-primary ml-2 btn-sm" value="Télécharger">
                        </div>
                    </div>
                </form>
            </div>
            <hr>
        </div>

        <nav v-if="allPhoto.data.length > 9" aria-label="pagination photo">
            <ul class="pagination">
                <li class="page-item" v-if="allPhoto.current_page != 1">
                    <a class="page-link" :href="allPhoto.path" tabindex="-1" aria-disabled="true">Début</a>
                </li>
                <li class="page-item" v-if="allPhoto.prev_page_url">
                    <a class="page-link" :href="allPhoto.prev_page_url" tabindex="-1"
                        aria-disabled="true">{{allPhoto.current_page-1}}</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" :href="'http://127.0.0.1:8000/photo?page='+allPhoto.current_page">
                        {{allPhoto.current_page}}
                    </a>
                </li>
                <li v-if="allPhoto.next_page_url" class="page-item">
                    <a class="page-link" :href="allPhoto.next_page_url">{{allPhoto.current_page+1}}</a>
                </li>
                <li class="page-item" v-if="allPhoto.current_page != allPhoto.last_page">
                    <a class="page-link" :href="allPhoto.last_page_url" tabindex="-1" aria-disabled="true">Dernière
                        page</a>
                </li>
            </ul>
        </nav>

        <section>
            <div class="row">

                <div v-for="photo in allPhoto.data" :key="photo.id" class=" col-lg-4 col-md-6 mb-4">
                    <div class="z-depth-1 rounded mb-2">
                        <a type="button" data-toggle="modal" @click="size(photo)" data-target="#modalYT">
                            <img :src="'/storage/photos/'+photo.photo" class="img-fluid rounded-bottom imageSize"
                                :alt="photo.title">
                        </a>
                        <div class="mask rgba-stylish-strong">
                        </div>
                    </div>
                    <h4 class="card-title font-weight-bold">
                        <strong class="text-primary">{{photo.title}}</strong>
                    </h4>
                    <button class="btn btn-primary" @click="deletePhoto(photo.id)">Supprimer</button>
                </div>

            </div>
        </section>



        <div v-if="modalPhoto" class="modal fade" id="modalYT" tabindex="-1" role="dialog"
            aria-labelledby="Photo en grand" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body mb-0 p-0">
                        <div class="m-auto">
                            <a data-dismiss="modal">
                                <img :src="'/storage/photos/'+modalPhoto" class="img-fluid rounded-bottom">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>


<script>
    export default {
        data() {
            return {
                file: '',
                titre: '',
                allPhoto: this.photos,
                modalPhoto: '',
                errors: null
            };
        },
        methods: {
            deletePhoto(photo) {
                axios.delete('/photo/' + photo).then(res => {
                    this.allPhoto = res.data
                    console.log(res.data)
                    this.$notify({
                        group: 'success',
                        type: 'success',
                        title: 'Photo supprimée',
                        text: 'Votre photo est bien supprimée!'
                    });
                    window.location = document.location.href
                }).catch(err => {
                    this.$notify({
                        group: 'success',
                        type: 'warn',
                        title: 'Échec',
                        text: 'Oups il y a un problème!'
                    });
                })
            },
            size(photo) {
                this.modalPhoto = photo.photo
            },
            onFileChange(e) {
                this.file = e.target.files[0];
            },
            submitForm(e) {
                e.preventDefault();
                this.errors = null
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    }
                }

                let formData = new FormData();
                formData.append('file', this.file);
                formData.append('title', this.titre);

                axios.post('/photo', formData, config)
                    .then(res => {
                        this.$notify({
                            group: 'success',
                            type: 'success',
                            title: 'Ajout Photo',
                            text: 'Votre photo est en ligne!'
                        });
                        this.allPhoto = res.data
                        this.titre = ''
                        e.target.reset();
                    })
                    .catch(err => {
                        this.errors = err.response.data.errors
                        this.$notify({
                            group: 'success',
                            type: 'warn',
                            title: 'Échec du téléchargement',
                            text: 'Oups désolé il y eu une erreur!'
                        });
                    });
            }
        },
        props: ['photos'],

    }

</script>


<style>
    .news-tile .card-title {
        position: absolute;
        bottom: 15px;
        left: 40px;
    }

    .rgba-stylish-strong {
        background-color: rgba(62, 69, 81, .5);
    }

</style>
