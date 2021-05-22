<template>
  <section id="dashboard-analytics">
    <b-row >
      <b-col
        md="12"
        class="main-carousel"
      >
          <carousel-vsupport />
      </b-col>
      <b-col

        md="12"
        class="secondary-small-carousel"
      >

      <carousel-interval/>


      </b-col>

       <b-col
        lg="12"
        sm="12" class="image-video-listing"
      >

      <b-row>
       <b-col
        lg="3"
        sm="3"
        class="add-margin list-carding"
      >

       <img alt="" title="" src="https://godisciples.id/assets/gkdi-img/new/blog.jpg"  class="classWithPad">
       </b-col>


        <b-col
        lg="3"
        sm="3"
        class="add-margin list-carding"
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


section#dashboard-analytics {
    float: left;
    width: 100%;
}

section#dashboard-analytics .main-carousel {
    float: left;
    width: 100%;
    margin-bottom: 20px;
    max-height: 350px;
    overflow: hidden;
    border-radius: 0.428rem;
}

section#dashboard-analytics .main-carousel  .carousel-indicators {
    margin-bottom: 0 !important;
}

section#dashboard-analytics .main-carousel a.carousel-control-prev {
    width: 120px;
    background: linear-gradient(90deg, #00000073, transparent);
    border-radius: 0.428rem 0 0 0.428rem;
}

section#dashboard-analytics .main-carousel a.carousel-control-next {
    width: 120px;
    background: linear-gradient(90deg, transparent, #00000073);
    border-radius: 0 0.428rem 0.428rem 0;
}

section#dashboard-analytics .main-carousel .revolution-slider-height {border-radius: 0.428rem;}

/**section#dashboard-analytics .main-carousel .carousel-inner .carousel-item {position: relative;min-height: 250px;}

section#dashboard-analytics .main-carousel .carousel-inner .carousel-item img {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 100% !important;
}**/


section#dashboard-analytics .secondary-small-carousel .card-body {
    padding: 0;
}

.secondary-small-carousel .card {
    float: left;
    width: 100%;
    margin: 0;
    border-radius: 0.428rem;
}

.secondary-small-carousel .card div#carousel-interval___BV_inner_ {
    height: 180px;
    border-radius: 0.428rem;
}

.secondary-small-carousel .card div#carousel-interval___BV_inner_ .carousel-item {
    max-height: 180px;
    min-height: 180px;
    float: left;
    width: 100%;
    text-align: center;
}

.secondary-small-carousel .card div#carousel-interval___BV_inner_ .carousel-item img.img-fluid {
    max-width: 100%;
    width: 100% !important;
    display: inline-block !important;
}

.secondary-small-carousel .card-body {
    padding: 0;
}

.image-video-listing {float: left;width: 100%;margin-top: 10px;}

.image-video-listing .list-carding {
    margin: 10px 1%;
    width: 23% !important;
    max-width: none !important;
    border-radius: 0.428rem;
    overflow: hidden;
    float: initial;
    display: inline-block;
    padding: 0;
    max-height: 190px;
    flex: none !important;
    text-align: center;
}


.image-video-listing .row {
    margin: 0;
}

.image-video-listing .list-carding img {
    max-width: 100%;
}

@media only screen and (max-width: 767px) {
.secondary-small-carousel .card {max-height:140px;}
section#dashboard-analytics .main-carousel .carousel-inner .carousel-item {border-radius:0.428rem; overflow:hidden;}
  /**section#dashboard-analytics .main-carousel .carousel-inner {max-height: 140px;overflow: hidden;border-radius: 0.428rem;}**/
  section#dashboard-analytics .main-carousel a.carousel-control-next,
  section#dashboard-analytics .main-carousel a.carousel-control-prev {width:60px;}
  .image-video-listing .col-sm-3 {width:48% !important; }
  .secondary-small-carousel .card div#carousel-interval___BV_inner_ {height:100px;}
  .image-video-listing .list-carding {max-height: 150px;}
  section#dashboard-analytics .main-carousel .carousel-item {
      min-height: 150px;
  }

  section#dashboard-analytics .main-carousel .carousel-item img {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
  }
}


</style>
