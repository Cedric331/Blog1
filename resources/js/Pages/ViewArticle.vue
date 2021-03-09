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
         <div class="form-group shadow-lg p-3 mb-5 bg-light rounded">
            <label for="commentaire">Poster un commentaire: </label>
            <textarea class="form-control bg-white border border-dark" id="commentaire" rows="3" spellcheck="false" data-gramm="false" style="line-height: 21px;"></textarea>
         <div class="d-flex justify-content-end">
            <button class="btn btn-primary mt-3">Envoyer</button>
         </div>
         </div>
    </div>

</template>
<script>
    export default {
  props: ['article'],
    }

</script>
