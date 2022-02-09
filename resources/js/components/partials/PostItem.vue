<template>
  <article>
    <h3> <a href="#">{{post.title}}</a> </h3>
    <p class="date"> {{formatDate}}</p>
    <p class="text"> {{troncateText}} </p>
  </article>
</template>

<script>
export default {
  name:'PostItem',
  props:{
    'post': Object
  },
  computed:{
    troncateText(){
      return this.post.content.substr(0, 50) + '...';
    },
    formatDate(){
      const d = new Date(this.post.created_at);
      let day = d.getDay();
      let month = d.getMonth();
      const year = d.getFullYear();

      if(day < 10) day = '0'+day;
      if(month < 10) month = '0'+month;
      
      return `${day}/${month}/${year}`;
    }
  }
}
</script>

<style lang="scss" scoped>
article{
  margin: 20px 0;
  a{
    text-decoration: none;
    color: black;
    &:hover{
      color: rgb(255, 68, 68);
    }
  }
  .date{
    font-size: 0.8rem;
    font-style: italic;
  }
  .text{
    padding: 5px 0;
  }
}

</style>