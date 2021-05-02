<template>
  <section id="dashboard-analytics">
    <b-row >
      <b-col
        lg="6"
        md="6"
      >
          <carousel-vsupport />
      </b-col>
      <b-col
        lg="6"
        sm="6 "
      >

      <div class="category-slider">

        <carousel-interval/>
        
      </div>
       
      </b-col>

       <b-col
        lg="12"
        sm="12"
        class="menu-list"
      >
      <b-card
      
      title="Video"
      >

     <div class="grid-container">

     <div class="flex_col">

        <div class="video-container">

          <b-img
          :src="require('@/assets/images/slider/01.jpg')"
          :width="75"   
          class="width-size"
        

          />
          <span class="video_title">video</span>
        </div>

    
      
      </div>

        <div class="flex_col">
  

        <div class="video-container">

          <b-img
          :src="require('@/assets/images/slider/01.jpg')"
          :width="75" 
          class="width-size"  
          />
     <span class="video_title">video</span>

        </div>

     
      
      </div>


        <div class="flex_col">

        <div class="video-container">

          <b-img
          :src="require('@/assets/images/slider/01.jpg')"
        :width="75"   
        class="width-size"

          />
                    <span class="video_title">video</span>

        </div>

     
      
      </div>


   <div class="flex_col">
  

        <div class="video-container">

          <b-img
          :src="require('@/assets/images/slider/01.jpg')"
        :width="75"   
        class="width-size"
        

          />
                    <span class="video_title">video</span>

        </div>

      
      </div>

 <div class="flex_col">
  

        <div class="video-container">

          <b-img
          :src="require('@/assets/images/slider/01.jpg')"
        :width="75"   
        class="width-size"
        

          />
                    <span class="video_title">video</span>

        </div>

      
      </div>
       <div class="flex_col">
  

        <div class="video-container">

          <b-img
          :src="require('@/assets/images/slider/01.jpg')"
        :width="75"   
        class="width-size"
        

          />
                    <span class="video_title">video</span>

        </div>

      
      </div>

      </div>
      

      </b-card>
       
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



</style>
