<template>
    <div>
      <b-carousel
        id="carousel-1"
        v-model="slide"
        :interval="4000"
        controls
        indicators
        img-width="924"
        img-height="380"
        @sliding-start="onSlideStart"
        @sliding-end="onSlideEnd"
      >
        <!-- Text slides with image -->
        <b-carousel-slide  >

        <template #img>
            <img
              class="d-block img-fluid w-100  revolution-slider-height  "
              width="924"
              height="380"
              :src="image2"
              alt="image slot"
            >
          </template>

         </b-carousel-slide>

        <b-carousel-slide  >

        <template #img>
            <img
              class="d-block img-fluid w-100  revolution-slider-height  "
              width="924"
              height="380"
              :src="image1"
              alt="image slot"
            >
          </template>

         </b-carousel-slide>

        <!-- Slides with image only -->
        <b-carousel-slide  >

        <template #img>
            <img
              class="d-block img-fluid w-100  revolution-slider-height  "
              width="924"
              height="380"
              :src="image2"
              alt="image slot"
            >
          </template>

         </b-carousel-slide>


        <!-- Slides with img slot -->
        <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
        <b-carousel-slide>
          <template #img>
            <img
              class="d-block img-fluid w-100 revolution-slider-height"
              width="924"
              height="380"
              :src="image3"
              alt="image slot"
            >
          </template>
        </b-carousel-slide>
      </b-carousel>
    </div>
</template>

<script>
import BCardCode from '@core/components/b-card-code'
import { BCarousel, BCarouselSlide, BCardText } from 'bootstrap-vue'
import { codeVsupport } from './code'

export default {
  components: {
    BCardCode,
    BCarousel,
    BCarouselSlide,
    BCardText,
  },
  data() {
    return {
      slide: 0,
      sliding: null,
      codeVsupport,
      image1:"http://www.abfoodnutrition.co.uk/wp-content/uploads/2015/02/Small-Business-Saturday-UK-Facebook-Banner-2015.jpg",
      image2:"https://tpc.googlesyndication.com/simgad/5928956687406861336?sqp=4sqPyQQ7QjkqNxABHQAAtEIgASgBMAk4A0DwkwlYAWBfcAKAAQGIAQGdAQAAgD-oAQGwAYCt4gS4AV_FAS2ynT4&rs=AOga4ql3p1EjsiMsykgDyLj4Oi9N7DTv0g", 
      image3:"https://godisciples.id/menu/assets/images/faq.png"
    }
  },
  methods: {
    onSlideStart() {
      this.sliding = true
    },
    onSlideEnd() {
      this.sliding = false
    },
  },
}
</script>

<style>


@media screen and (min-width:768px) {
.revolution-slider-height{

max-height:300px;
border-radius:24px;
  

}

}
</style>