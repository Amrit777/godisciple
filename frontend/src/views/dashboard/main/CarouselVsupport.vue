<template>
    <div>
      <b-carousel
        id="carousel-1"
        v-model="slide"
        :interval="4000"
        controls
        indicators
        background="#ababab"
        img-width="924"
        img-height="380"
        @sliding-start="onSlideStart"
        @sliding-end="onSlideEnd"
      >
        <!-- Text slides with image -->
        <b-carousel-slide
          text="Nulla vitae elit libero, a pharetra augue mollis interdum."
          :img-src="require('@/assets/images/slider/05.jpg')"
        />

        <!-- Slides with custom text -->
        <b-carousel-slide :img-src="require('@/assets/images/slider/06.jpg')" />

        <!-- Slides with image only -->
        <b-carousel-slide :img-src="require('@/assets/images/slider/03.jpg')" />

        <!-- Slides with img slot -->
        <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
        <b-carousel-slide>
          <template #img>
            <img
              class="d-block img-fluid w-100"
              width="924"
              height="380"
              :src="require('@/assets/images/slider/04.jpg')"
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
