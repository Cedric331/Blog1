<template>
<div>
  <div id="fontHome" class="view jarallax" data-jarallax='{"speed": 0.2}'>
    <div class="mask rgba-white-light d-flex justify-content-center align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-white text-center">
            <h1 class="display-3 mb-0 pt-md-5 pt-5 text-white font-weight-bold wow fadeInDown" data-wow-delay="3.3s">NATALIE SMITH</h1>
            <h1 class="text-uppercase mt-5 pt-md-5 pt-sm-2 pt-5 pb-md-5 pb-sm-3 pb-5 text-white font-weight-bold">Photographe</h1>
          </div>
        </div>
      </div>
    </div>
   </div>

   <h1 class="mt-5 text-center">Article du moment</h1>
      <hr class="my-3">
     <div class="container mt-5">

              <section class="text-justify">
                 <h1>{{article.title}}</h1>
                    <figure class="figure" v-if="article.image">
                      <img :src="'storage/images/'+article.image" class="figure-img img-fluid z-depth-1"
                        :alt="article.title">
                    </figure>

               <div v-for="contenu in article.contenu" :key="contenu.id">
                  <h3 class="text-primary lead" v-if="contenu.title">{{ contenu.title }}</h3>

                  <figure class="figure" v-if="contenu.image">
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
<!-- <img :src="'storage/images/home.jpg'">  -->

</template>
<script>

export default {
  props:['article'],

  mounted() {
     console.log(this.article.contenu)
  },

}
</script>
