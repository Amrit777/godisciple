<template>
  <section id="dashboard-menu">
    <b-row >
      <b-col lg="6" md="6">

           <b-img
           :src="require('@/assets/images/pages/world-mastercard-card.jpg')"
           class="set-card-width"
         
            

          />
         
      </b-col>


             <b-col
        lg="12"
        sm="12"
        class="menu-list"
      >
      <b-card
      
      title="Menu"
      >

     <div class="grid-container">

     <div class="flex_col">

        <div class="video-container" @click="$router.push({name:'apps-menu-view'})">

          <b-img
          :src="require('@/assets/images/slider/01.jpg')"
          :width="75"   
          class="width-size"
        

          />
          <span class="video_title" >Dtree View</span>
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
export default {
  components: {
    BRow,
    BCol,
    BCard,
    BImg
  },
  data() {
    return {
      data: {

      image1:require('@/assets/images/slider/01.jpg'),
      image2:require('@/assets/images/pages/world-mastercard-card.jpg'),

      },
    }
  },
  created() {
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

.set-card-width{
    width: 99%;
}

.menu-list.col-sm-12.col-lg-12 {
    margin-top: 10px;
}

</style>
