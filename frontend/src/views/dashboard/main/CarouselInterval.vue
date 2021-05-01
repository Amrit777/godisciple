<template>
  <b-card
   
  >
   

    <b-carousel
      id="carousel-interval"
    >
      <b-carousel-slide :img-src="require('@/assets/images/slider/01.jpg')"  />
      <b-carousel-slide :img-src="require('@/assets/images/slider/02.jpg')" />
      <b-carousel-slide :img-src="require('@/assets/images/slider/03.jpg')" />
    </b-carousel>

    
  </b-card>
</template>

<script>
import { BCarousel, BCarouselSlide, BCardText ,BCard} from 'bootstrap-vue'
import BCardCode from '@core/components/b-card-code'
  import { codeCarouselInterval } from './code'

export default {
  components: {
    BCard,
    BCarousel,
    BCarouselSlide,
    BCardText,
  },
  data() {
    return {
      codeCarouselInterval,
    }
  },
}
</script>
