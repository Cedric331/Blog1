<template>
   <div>
      <em>-</em>
      <button v-if="show" class="btn btn-info rounded btn-sm" @click="like">
         J'aime ({{ likes.length }})
      </button>
      <button v-else class="btn btn-danger rounded btn-sm" @click="dislike">
        Je n'aime plus ({{ likes.length }})
      </button>
   </div>
</template>

<script>
export default {
  data () {
    return {
       show: true,
       likes: Array
    }
  },
  methods: {
     like(){
        axios.post('/like/article',{
           id: this.article.id
        }).then(res => {
           this.likes = res.data
           this.show = false
        }).catch(err => {

        })
     },
      dislike(){
        axios.post('/dislike/article',{
           id: this.article.id
        }).then(res => {
           this.likes = res.data
           this.show = true
        }).catch(err => {

        })
     }
  },
  props: ['user', 'article'],
   mounted(){
      this.likes = this.article.likes
   this.article.likes.forEach(element => {
      if (element.user_id == this.user.id) {
             this.show = false
          }
   });
   }
}
</script>
