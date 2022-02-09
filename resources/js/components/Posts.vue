<template>
<main class="container">
  <h2>I miei post:</h2>
</main>
  
</template>

<script>
export default {
  name: 'Posts',
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