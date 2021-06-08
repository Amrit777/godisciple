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

        <template >
           
<video-player :options="videoOptions"/>

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

         <b-carousel-slide>
          <template #img>
            <img
              class="d-block img-fluid w-100 revolution-slider-height"
              width="924"
              height="380"
              :src="image4"
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
import VideoPlayer from './VideoPlayer.vue'
import 'video.js/dist/video-js.css'



export default {
  components: {
    BCardCode,
    BCarousel,
    BCarouselSlide,
    BCardText,
    VideoPlayer
  },
  data() {
    return {
      slide: 0,
      sliding: null,
      codeVsupport,
      image1:require('@/assets/images/slider/01.jpg'),
      image2:require('@/assets/images/slider/BedLinenWeb-40262.jpg'), 
      image3:require('@/assets/images/slider/carosol1.jpg'),
      image4:require('@/assets/images/slider/DressesFrocksWeb-7e519.jpg'),
      image5:require('@/assets/images/slider/01.jpg'),
      videoOptions: {
          controls: true,
          autoplay: false,
          muted: true,
          language: 'en',
          playbackRates: [0.7, 1.0, 1.5, 2.0],
          sources: [{
            type: "video/mp4",
            // mp4
            src: "http://vjs.zencdn.net/v/oceans.mp4",
            // webm
            // src: "https://cdn.theguardian.tv/webM/2015/07/20/150716YesMen_synd_768k_vp8.webm"
          }],
          poster: "https://surmon-china.github.io/vue-quill-editor/static/images/surmon-1.jpg",
        }
    }
  },

  computed: {
      player() {
        return this.$refs.videoPlayer.player
      }
    },
  methods: {
    onSlideStart() {
      this.sliding = true
    },
    onSlideEnd() {
      this.sliding = false
    },
          // listen event
      onPlayerPlay(player) {
        // console.log('player play!', player)
      },
      onPlayerPause(player) {
        // console.log('player pause!', player)
      },
      onPlayerEnded(player) {
        // console.log('player ended!', player)
      },
      onPlayerLoadeddata(player) {
        // console.log('player Loadeddata!', player)
      },
      onPlayerWaiting(player) {
        // console.log('player Waiting!', player)
      },
      onPlayerPlaying(player) {
        // console.log('player Playing!', player)
      },
      onPlayerTimeupdate(player) {
        // console.log('player Timeupdate!', player.currentTime())
      },
      onPlayerCanplay(player) {
        // console.log('player Canplay!', player)
      },
      onPlayerCanplaythrough(player) {
        // console.log('player Canplaythrough!', player)
      },
      // or listen state event
      playerStateChanged(playerCurrentState) {
        // console.log('player current update state', playerCurrentState)
      },
      // player is ready
      playerReadied(player) {
        // seek to 10s
        console.log('example player 1 readied', player)
        player.currentTime(10)
        // console.log('example 01: the player is readied', player)
      }
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