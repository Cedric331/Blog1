<template>
    <div class="container mt-5">

        <section class="dark-grey-text text-center">

            <h2 class="font-weight-bold mb-4 pb-2">Articles</h2>
            <p class="text-center mx-auto w-responsive mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam
                eum porro a pariatur veniam.</p>

            <div class="row">

                <div v-for="article in articles" :key="article.id" class="my-2 col-lg-4 col-md-6 mb-4 shadow-lg p-3">
                    <div class="view overlay rounded z-depth-2 mb-4">
                        <img class="img-fluid" :src="'/storage/images/'+article.image"
                            :alt="article.title">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <h4 class="font-weight-bold mb-3"><strong>{{article.title}}</strong></h4>
                        <p class="d-inline font-weight-bold">par Natalie SMITH, {{article.created_at}}</p>
                        <p class="mt-2">
                           Tags: <small v-for="(tag,index) in article.tag" :key="tag.id" class="d-inline">#{{tag.name}}<em v-if="index+1 != article.tag.length"> - </em></small>
                        </p>
                    <a :href="'/articles/'+article.slug" class="mb-4 btn btn-info btn-rounded btn-md">Lire l'article</a>
                     <p class="font-weight-bold">J'aime({{ article.likes.length }}) - Commentaire({{ article.commentaires.length }})</p>
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
