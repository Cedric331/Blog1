<template>

    <div class="container mt-5">
        <section class="">

            <h3 class="text-center font-weight-bold mb-5">Articles</h3>
            <hr>
            <div v-if="articles.length == 0" class="text-center">
               <h5>Aucun article dans cette catégorie</h5>
            </div>
            <div class="row my-5">
                <div v-for="article in articles" :key="article.id" class="col-lg-4 col-md-12 mb-lg-0 mb-4">
                    <div class="card hoverable">
                        <img class="card-img-top" :src="'/storage/images/'+article.image" :alt="article.title">
                        <div class="card-body">
                            <h4 class="black-text">{{article.title}}</h4>
                            <p class="card-title text-muted font-small mt-3 mb-2">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Eius iusto excepturi voluptates ut reiciendis nulla nam, provident
                                vero! Blanditiis, labore.</p>
                            <p class="mt-2">
                                Tags: <small v-for="(tag,index) in article.tag" :key="tag.id"
                                    class="d-inline">#{{tag.name}}<em v-if="index+1 != article.tag.length"> -
                                    </em></small>
                            </p>

                            <p class="font-weight-bold">J'aime({{ article.likes.length }}) -
                                Commentaire({{ article.commentaires.length }})</p>
                            <a type="button" :href="'/articles/'+article.slug"
                                class="btn btn-primary btn-block p-0 mx-0">Lire l'article</a>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>




</template>


<script>
    export default {
        props: ['articles'],

    }

</script>
