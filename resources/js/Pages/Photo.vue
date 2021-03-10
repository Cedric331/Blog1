<template>
<div class="container mt-5">

         <div class="text-center my-3">
            <h4>Ajouter une photo</h4><br>
            <div style="max-width: 500px; margin: 0 auto;">
                <form @submit="submitForm" enctype="multipart/form-data">
                     <div class="form-group">
                        <label for="titre" class="form-label">Titre de la photo</label>
                          <input type="text" v-model="titre" class="form-control" id="titre" placeholder="Titre de la photo..." required>
                     </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <div class="btn btn-primary btn-sm float-left">
                                <span>Choisir un fichier</span>
                                <input type="file" name="filename" id="inputFileUpload" v-on:change="onFileChange">
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

  <section>
    <div class="row">

      <div v-for="photo in allPhoto" :key="photo.id" class=" col-lg-4 col-md-6 mb-4">
        <div class="z-depth-1 rounded mb-2">
           <a data-toggle="modal" @click="size(photo)" data-target="#modalYT">
            <img :src="'/storage/photos/'+photo.photo"
              class="img-fluid rounded-bottom imageSize" :alt="photo.title">
              </a>
            <div class="mask rgba-stylish-strong">
            </div>
        </div>
            <h4 class="card-title font-weight-bold">
              <strong class="text-primary">{{photo.title}}</strong>
            </h4>
      </div>

      
    </div>
  </section>



<div v-if="modalPhoto" class="modal fade" id="modalYT" tabindex="-1" role="dialog" aria-labelledby="Photo en grand"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body mb-0 p-0">
        <div>
         <a data-dismiss="modal">
          <img :src="'/storage/photos/'+modalPhoto"  
              class="img-fluid rounded-bottom">
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
                modalPhoto: ''
            };
        },
  methods: {
     size(photo){
        this.modalPhoto = photo.photo
     },
      onFileChange(e) {
            this.file = e.target.files[0];
            },
            submitForm(e) {
                e.preventDefault();
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    }
                }

                let formData = new FormData();
                formData.append('file', this.file);
                formData.append('title', this.titre);

                axios.post('/photo/store', formData, config)
                    .then(res => {
                       this.allPhoto = res.data
                       this.titre = ''
                       e.target.reset();
                    })
                    .catch(err => {
              
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