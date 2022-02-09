<template>
  <div>
    <Header />
    <Posts />
    <Footer />
  </div>
</template>

<script>
import Header from './components/partials/Header.vue'
import Posts from './components/Posts.vue'
import Footer from './components/partials/Footer.vue'

export default {
  name: 'App',
  components:{
    Header,
    Posts,
    Footer
  }
}
</script>

<style lang="scss">

</style>