<template>
<main class="container">
  <h2>I miei post:</h2>
  <PostItem 
    v-for="post in posts"
    :key="post.id"
    :post="post" />
</main>
  
</template>

<script>
import PostItem from './partials/PostItem.vue'

export default {
  name: 'Posts',
  components:{
    PostItem
  },
  data(){
    return{
      apiUrl: 'http://127.0.0.1:8000/api/posts',
      posts: null,
    }
  },
  mounted(){
    this.getPosts();
  },
  methods:{
    getPosts(){
      axios.get(this.apiUrl)
        .then(res => {
          this.posts = res.data
          console.log(res.data);
        })
        
    }
  }
}
</script>

<style>

</style>