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
                  Tags: <small v-for="(tag,index) in article.tag" :key="tag.id" class="d-inline">#{{tag.name}}<em v-if="index+1 != article.tag.length"> - </em></small>
               </p>
              </section>


            <hr>

  <div class="container my-3 py-5 px-md-5 z-depth-1">

    <section class="text-center text-lg-left dark-grey-text">

        <div class="text-center font-weight-bold mb-5"><span>({{commentaires.length}}) </span>Commentaires</div>

         <div v-for="(commentaire, index) in commentaires" :key="commentaire.id">
             <div v-if="count > index" class="media d-block d-md-flex mt-3 shadow p-3 mb-2 bg-white rounded">
            <div class="media-body text-center text-md-left ml-md-3 ml-0">
              <p class="font-weight-bold my-0">
               {{ commentaire.user.name }}:
              </p>
              {{ commentaire.commentaire }}
            </div>
            Posté le: {{ commentaire.created_at }}
            </div>
         </div>
         <div class="mt-5" v-if="count<commentaires.length">
               <button class="btn btn-outline-primary btn-sm m-auto d-flex" @click="commentCount">Afficher plus de commentaire</button>
         </div>
    </section>


  
  </div>

         <div class="form-group shadow-lg p-3 mb-5 bg-light rounded">
            <label for="commentaire">Poster un commentaire: </label>
            <textarea class="form-control bg-white border border-dark" v-model="commentaire" id="commentaire" rows="3" spellcheck="false" data-gramm="false" style="line-height: 21px;"></textarea>
         <div class="d-flex justify-content-end">
            <button class="btn btn-primary mt-3" @click="storeComment">Envoyer</button>
         </div>
         </div>


    </div>

</template>
<script>
    export default {
  data () {
    return {
         count: 1,
         commentaire: '',
         commentaires: this.article.commentaires
    }
  },
  methods: {
     storeComment(){
        axios.post('/commentaire',{
           commentaire: this.commentaire,
           article: this.article.id
        }).then(res => {
           this.commentaire = ''
           this.commentaires = res.data
        }).catch()
     },
     commentCount(){
        this.count++;
     }
  },

  props: ['article'],
    }

</script>
