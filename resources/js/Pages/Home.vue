<template>
<div>

   <headerHome></headerHome>
   <div v-if="article">
   <h1 class="mt-5 text-center">Article du moment</h1>
      <hr class="my-3">
     <div class="container mt-5">

              <section class="text-justify">
                 <h1>{{article.title}}</h1>
                    <figure class="figure" v-if="article.image">
                      <img :src="'storage/images/'+article.image" class="figure-img img-fluid z-depth-1"
                        :alt="article.title">
                    </figure>

               <div class="container-fluid text-center" v-for="contenu in article.contenu" :key="contenu.id">
                  <h3 class="text-primary lead" v-if="contenu.title">{{ contenu.title }}</h3>

                  <figure class="rounded d-block" v-if="contenu.image">
                      <img :src="'storage/images/'+contenu.image" class="imageArticle figure-img img-fluid z-depth-1"
                        :alt="contenu.title">
                  </figure>

                    <p class="text-primary lead" v-if="contenu.content">{{ contenu.content }}</p>
               </div>
               <p>
                  Tags: <small v-for="(tag,index) in article.tag" :key="tag.id" class="d-inline">#{{tag.name}}<em v-if="index+1 != article.tag.length"> - </em></small>
               </p>
              </section>
      </div>
   </div>

</div>
<!-- <img :src="'storage/images/home.jpg'">  -->

</template>
<script>
import headerHome from './HomeHeader.vue'
export default {
  components: {
    headerHome
  },
  props:['article'],

}
</script>
