<template>
  <section id="dashboard-analytics">
    <b-row >
      <b-col
        md="12"
      
      >
          <carousel-vsupport />
      </b-col>
      <b-col
       
        md="12"
      >

      <carousel-interval/>
        
   
      </b-col>

       <b-col
        lg="12"
        sm="12"
      >

      <b-row>
       <b-col
        lg="3"
        sm="3"
        class="add-margin"
      >

       <img alt="" title="" src="https://godisciples.id/assets/gkdi-img/new/blog.jpg"  class="classWithPad">
       </b-col>


        <b-col
        lg="3"
        sm="3"
        class="add-margin"
      >

       <img alt="" title="" src="https://godisciples.id/assets/gkdi-img/new/instagram.jpg" class="classWithPad">
       </b-col>

    
      </b-row>
      
       
      </b-col>
     
    </b-row>
 </section>
</template>

<script>
import { BRow, BCol,BCard,BImg } from 'bootstrap-vue'

import CarouselVsupport from './CarouselVsupport.vue';

import CarouselInterval from './CarouselInterval.vue';



export default {
  components: {
    BRow,
    BCol,
    CarouselVsupport,
    CarouselInterval,
    BCard,
    BImg
  },
  data() {
    return {
      data: {

        image1:require('@/assets/images/slider/01.jpg'),

      },
    }
  },
  created() {
    // data
    this.$http.get('/analytics/data')
      .then(response => { this.data = response.data })
  },
  
}
</script>
<style>
  .category-slider{
    margin-top:10px;
  }
  div#carousel-interval___BV_inner_ {
    height: 106px;
}
.grid-container{
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}

.flex_col{
  flex:25%;
}

@media screen and (min-width:768px) {
 .flex_col{
  flex:50%;
}

span.video_title {
     margin: 0px 19px;
         
    display: inline-block;
    text-decoration: none;
    color: black;
}
}





span.video_title {
     margin: 0px 19px;
     margin-top: 24px;
    display: inline-block;
    text-decoration: none;
    color: black;
}



.add-margin{
margin:25px;
}

</style>
