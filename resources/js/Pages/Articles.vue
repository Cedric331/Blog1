<template>
    <div class="container mt-5">

        <section class="dark-grey-text text-center">

            <h2 class="font-weight-bold mb-4 pb-2">Recent posts</h2>
            <p class="text-center mx-auto w-responsive mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam
                eum porro a pariatur veniam.</p>

            <div class="row">

                <div v-for="article in articles" :key="article.id" class="col-lg-4 col-md-6 mb-4">

                    <div class="view overlay rounded z-depth-2 mb-4">
                        <img class="img-fluid" :src="'storage/images/'+article.image"
                            alt="Sample image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <h4 class="font-weight-bold mb-3"><strong>{{article.title}}</strong></h4>
                    <p>by <a class="font-weight-bold">Billy Forester</a>, {{article.created_at}}</p>
                    <p class="dark-grey-text">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                        fugit, sed
                        quia consequuntur magni dolores eos qui ratione.</p>
                    <a :href="'articles/'+article.slug" class="btn btn-info btn-rounded btn-md">Lire l'article</a>
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
