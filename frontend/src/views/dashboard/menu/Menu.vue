<template>
  <section id="dashboard-menu">
    <b-row >
      <b-col lg="6" md="6">

     <div class="wrapper" >
    <div class="card-form">
      <div class="card-list">
        <div class="card-item" v-bind:class="{ '-active' : isCardFlipped }">
          <div class="card-item__side -front">
            <div class="card-item__focus" v-bind:class="{'-active' : focusElementStyle }" v-bind:style="focusElementStyle" ref="focusElement"></div>
            <div class="card-item__cover">
              <img
              v-bind:src="require('@/assets/images/banner/card.jpeg')" class="card-item__bg">
            </div>
            
            <div class="card-item__wrapper">
              <div class="card-item__top">
                <img v-bind:src="require('@/assets/images/banner/chip.png')" class="card-item__chip">
                <div class="card-item__type">
                  <transition name="slide-fade-up">
                    <img v-bind:src="require('@/assets/images/banner/visa.png')" v-if="getCardType" v-bind:key="getCardType" alt="" class="card-item__typeImg">
                  </transition>
                </div>
              </div>
              <label for="cardNumber" class="card-item__number" ref="cardNumber">
                <template v-if="getCardType === 'amex'">
                 <span v-for="(n, $index) in amexCardMask" :key="$index">
                  <transition name="slide-fade-up">
                    <div
                      class="card-item__numberItem"
                      v-if="$index > 4 && $index < 14 && cardNumber.length > $index && n.trim() !== ''"
                    >*</div>
                    <div class="card-item__numberItem"
                      :class="{ '-active' : n.trim() === '' }"
                      :key="$index" v-else-if="cardNumber.length > $index">
                      {{cardNumber[$index]}}
                    </div>
                    <div
                      class="card-item__numberItem"
                      :class="{ '-active' : n.trim() === '' }"
                      v-else
                      :key="$index + 1"
                    >{{n}}</div>
                  </transition>
                </span>
                </template>

                <template v-else>
                  <span v-for="(n, $index) in otherCardMask" :key="$index">
                    <transition name="slide-fade-up">
                      <div
                        class="card-item__numberItem"
                        v-if="$index > 4 && $index < 15 && cardNumber.length > $index && n.trim() !== ''"
                      >*</div>
                      <div class="card-item__numberItem"
                        :class="{ '-active' : n.trim() === '' }"
                        :key="$index" v-else-if="cardNumber.length > $index">
                        {{cardNumber[$index]}}
                      </div>
                      <div
                        class="card-item__numberItem"
                        :class="{ '-active' : n.trim() === '' }"
                        v-else
                        :key="$index + 1"
                      >{{n}}</div>
                    </transition>
                  </span>
                </template>
              </label>
              <div class="card-item__content">
                <label for="cardName" class="card-item__info" ref="cardName">
                  <div class="card-item__holder">Card Holder</div>
                  <transition name="slide-fade-up">
                    <div class="card-item__name" v-if="cardName.length" key="1">
                      <transition-group name="slide-fade-right">
                        <span class="card-item__nameItem" v-for="(n, $index) in cardName.replace(/\s\s+/g, ' ')" v-if="$index === $index" v-bind:key="$index + 1">{{n}}</span>
                      </transition-group>
                    </div>
                    <div class="card-item__name" v-else key="2">Full Name</div>
                  </transition>
                </label>
                <div class="card-item__date" ref="cardDate">
                  <label for="cardMonth" class="card-item__dateTitle">Expires</label>
                  <label for="cardMonth" class="card-item__dateItem">
                    <transition name="slide-fade-up">
                      <span v-if="cardMonth" v-bind:key="cardMonth">{{cardMonth}}</span>
                      <span v-else key="2">MM</span>
                    </transition>
                  </label>
                  /
                  <label for="cardYear" class="card-item__dateItem">
                    <transition name="slide-fade-up">
                      <span v-if="cardYear" v-bind:key="cardYear">{{String(cardYear).slice(2,4)}}</span>
                      <span v-else key="2">YY</span>
                    </transition>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="card-item__side -back">
            <div class="card-item__cover">
              <img
              v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + currentCardBackground + '.jpeg'" class="card-item__bg">
            </div>
            <div class="card-item__band"></div>
            <div class="card-item__cvv">
                <div class="card-item__cvvTitle">CVV</div>
                <div class="card-item__cvvBand">
                  <span v-for="(n, $index) in cardCvv" :key="$index">
                    *
                  </span>

              </div>
                <div class="card-item__type">
                    <img v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + getCardType + '.png'" v-if="getCardType" class="card-item__typeImg">
                </div>
            </div>
          </div>
        </div>
      </div>
     
     </div>
   </div>
         
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
     

      image1:require('@/assets/images/slider/01.jpg'),
      image2:require('@/assets/images/pages/world-mastercard-card.jpg'),
      currentCardBackground: Math.floor(Math.random()* 25 + 1), // just for fun :D
      cardName: "",
      cardNumber: "",
      cardMonth: "",
      cardYear: "",
      cardCvv: "",
      minCardYear: new Date().getFullYear(),
      amexCardMask: "#### ###### #####",
      otherCardMask: "#### #### #### ####",
      cardNumberTemp: "",
      isCardFlipped: false,
      focusElementStyle: null,
      isInputFocused: false

     
    }
  },
  mounted() {
    this.cardNumberTemp = this.otherCardMask;
  //  document.getElementById("cardNumber").focus();
  },
  computed: {
    getCardType () {
      let number = this.cardNumber;
      let re = new RegExp("^4");
      if (number.match(re) != null) return "visa";

      re = new RegExp("^(34|37)");
      if (number.match(re) != null) return "amex";

      re = new RegExp("^5[1-5]");
      if (number.match(re) != null) return "mastercard";

      re = new RegExp("^6011");
      if (number.match(re) != null) return "discover";
      
      re = new RegExp('^9792')
      if (number.match(re) != null) return 'troy'

      return "visa"; // default type
    },
		generateCardNumberMask () {
			return this.getCardType === "amex" ? this.amexCardMask : this.otherCardMask;
    },
    minCardMonth () {
      if (this.cardYear === this.minCardYear) return new Date().getMonth() + 1;
      return 1;
    }
  },
  watch: {
    cardYear () {
      if (this.cardMonth < this.minCardMonth) {
        this.cardMonth = "";
      }
    }
  },
  methods: {
    flipCard (status) {
      this.isCardFlipped = status;
    },
    focusInput (e) {
      this.isInputFocused = true;
      let targetRef = e.target.dataset.ref;
      let target = this.$refs[targetRef];
      this.focusElementStyle = {
        width: `${target.offsetWidth}px`,
        height: `${target.offsetHeight}px`,
        transform: `translateX(${target.offsetLeft}px) translateY(${target.offsetTop}px)`
      }
    },
    blurInput() {
      let vm = this;
      setTimeout(() => {
        if (!vm.isInputFocused) {
          vm.focusElementStyle = null;
        }
      }, 300);
      vm.isInputFocused = false;
    }
  }
  
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
