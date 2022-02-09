<template>
<main class="container">
  <h2>I miei post:</h2>
  <PostItem 
    v-for="post in posts"
    :key="post.id"
    :post="post" />

  <div>
    <button
    @click="getPosts(pagination.current -1)"
    :disabled="pagination.current === 1">
      <<
    </button>

    <button
    v-for="i in pagination.last"
    :key="i"
    @click="getPosts(i)"
    :disabled="pagination.current === i">
      {{i}}
    </button>

    <button
    @click="getPosts(pagination.current +1)"
    :disabled="pagination.current === pagination.last">
      >>
    </button>
  </div>
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
      apiUrl: 'http://127.0.0.1:8000/api/posts?page=',
      posts: null,
      pagination: {}
    }
  },
  mounted(){
    this.getPosts();
  },
  methods:{
    getPosts(page = 1){
      axios.get(this.apiUrl + page)
        .then(res => {
          this.posts = res.data.data;

          this.pagination = {
            current: res.data.current_page,
            last: res.data.last_page
          }
        })
        
    }
  }
}
</script>

<style lang="scss" scoped>
main{
  button{
    padding: 5px;
    margin: 5px;
  }
}
</style>