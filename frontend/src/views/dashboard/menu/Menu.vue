<template>
  <section id="dashboard-menu">
    <b-row>
      <b-col lg="3" md="3"></b-col>
      <b-col lg="6" md="6" class="creditcard-custom">
        <div class="wrapper">
          <div class="card-form">
            <div class="card-list">
              <div class="card-item" v-bind:class="{ '-active': isCardFlipped }">
                <div class="card-item__side -front">
                  <div
                    class="card-item__focus"
                    v-bind:class="{ '-active': focusElementStyle }"
                    v-bind:style="focusElementStyle"
                    ref="focusElement"
                  ></div>
                  <div class="card-item__cover">
                    <img
                      v-bind:src="require('@/assets/images/banner/card.jpeg')"
                      class="card-item__bg"
                    />
                  </div>

                  <div class="card-item__wrapper">
                    <div class="card-item__top">
                      <img
                        v-bind:src="require('@/assets/images/banner/chip.png')"
                        class="card-item__chip"
                      />
                      <div class="card-item__type">
                        <transition name="slide-fade-up">
                          <img
                            v-bind:src="require('@/assets/images/banner/visa.png')"
                            v-if="getCardType"
                            v-bind:key="getCardType"
                            alt=""
                            class="card-item__typeImg"
                          />
                        </transition>
                      </div>
                    </div>
                    <label for="cardNumber" class="card-item__number" ref="cardNumber">
                      <template v-if="getCardType === 'amex'">
                        <span v-for="(n, $index) in amexCardMask" :key="$index">
                          <transition name="slide-fade-up">
                            <div
                              class="card-item__numberItem"
                              v-if="
                                $index > 4 &&
                                $index < 14 &&
                                cardNumber.length > $index &&
                                n.trim() !== ''
                              "
                            >
                              *
                            </div>
                            <div
                              class="card-item__numberItem"
                              :class="{ '-active': n.trim() === '' }"
                              :key="$index"
                              v-else-if="cardNumber.length > $index"
                            >
                              {{ cardNumber[$index] }}
                            </div>
                            <div
                              class="card-item__numberItem"
                              :class="{ '-active': n.trim() === '' }"
                              v-else
                              :key="$index + 1"
                            >
                              {{ n }}
                            </div>
                          </transition>
                        </span>
                      </template>

                      <template v-else>
                        <span v-for="(n, $index) in otherCardMask" :key="$index">
                          <transition name="slide-fade-up">
                            <div
                              class="card-item__numberItem"
                              v-if="
                                $index > 4 &&
                                $index < 15 &&
                                cardNumber.length > $index &&
                                n.trim() !== ''
                              "
                            >
                              *
                            </div>
                            <div
                              class="card-item__numberItem"
                              :class="{ '-active': n.trim() === '' }"
                              :key="$index"
                              v-else-if="cardNumber.length > $index"
                            >
                              {{ cardNumber[$index] }}
                            </div>
                            <div
                              class="card-item__numberItem"
                              :class="{ '-active': n.trim() === '' }"
                              v-else
                              :key="$index + 1"
                            >
                              {{ n }}
                            </div>
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
                              <span
                                class="card-item__nameItem"
                                v-for="(n, $index) in cardName.replace(/\s\s+/g, ' ')"
                                v-if="$index === $index"
                                v-bind:key="$index + 1"
                                >{{ n }}</span
                              >
                            </transition-group>
                          </div>
                          <div class="card-item__name" v-else key="2">Full Name</div>
                        </transition>
                      </label>
                      <div class="card-item__date" ref="cardDate">
                        <label for="cardMonth" class="card-item__dateTitle"
                          >Expires</label
                        >
                        <label for="cardMonth" class="card-item__dateItem">
                          <transition name="slide-fade-up">
                            <span v-if="cardMonth" v-bind:key="cardMonth">{{
                              cardMonth
                            }}</span>
                            <span v-else key="2">MM</span>
                          </transition>
                        </label>
                        /
                        <label for="cardYear" class="card-item__dateItem">
                          <transition name="slide-fade-up">
                            <span v-if="cardYear" v-bind:key="cardYear">{{
                              String(cardYear).slice(2, 4)
                            }}</span>
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
                      v-bind:src="
                        'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' +
                        currentCardBackground +
                        '.jpeg'
                      "
                      class="card-item__bg"
                    />
                  </div>
                  <div class="card-item__band"></div>
                  <div class="card-item__cvv">
                    <div class="card-item__cvvTitle">CVV</div>
                    <div class="card-item__cvvBand">
                      <span v-for="(n, $index) in cardCvv" :key="$index"> * </span>
                    </div>
                    <div class="card-item__type">
                      <img
                        v-bind:src="
                          'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' +
                          getCardType +
                          '.png'
                        "
                        v-if="getCardType"
                        class="card-item__typeImg"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </b-col>
      <b-col lg="3" md="3"></b-col>

      <b-col
            lg="12"
            sm="12" class="credit-menus">
        <b-card>
          <div class="menu-list menu-customized">
            <h4 class="card-title">Menu</h4>

            <b-col xl="2" md="2" sm="4" class="menu-cardination">
              <b-card>
                <div
                  class="video-container"
                  @click="$router.push({ name: 'apps-menu-view' })"
                >
                  <b-img
                    :src="require('@/assets/images/slider/01.jpg')"
                    :width="75"
                    class="width-size"
                  />
                  <span class="video_title">Dtree View</span>
                </div>
              </b-card>
            </b-col>

            <b-col xl="2" md="2" sm="4" class="menu-cardination">
              <b-card>
                <div class="video-container">
                  <b-img
                    :src="require('@/assets/images/slider/01.jpg')"
                    :width="75"
                    class="width-size"
                  />
                  <span class="video_title">video</span>
                </div>
              </b-card>
            </b-col>

            <b-col xl="2" md="2" sm="4" class="menu-cardination">
              <b-card>
                <div class="video-container">
                  <b-img
                    :src="require('@/assets/images/slider/01.jpg')"
                    :width="75"
                    class="width-size"
                  />
                  <span class="video_title">video</span>
                </div>
              </b-card>
            </b-col>

            <b-col xl="2" md="2" sm="4" class="menu-cardination">
              <b-card>
                <div class="video-container">
                  <b-img
                    :src="require('@/assets/images/slider/01.jpg')"
                    :width="75"
                    class="width-size"
                  />
                  <span class="video_title">video</span>
                </div>
              </b-card>
            </b-col>

            <b-col xl="2" md="2" sm="4" class="menu-cardination">
              <b-card>
                <div class="video-container">
                  <b-img
                    :src="require('@/assets/images/slider/01.jpg')"
                    :width="75"
                    class="width-size"
                  />
                  <span class="video_title">video</span>
                </div>
              </b-card>
            </b-col>

            <b-col xl="2" md="2" sm="4" class="menu-cardination">
              <b-card>
                <div class="video-container">
                  <b-img
                    :src="require('@/assets/images/slider/01.jpg')"
                    :width="75"
                    class="width-size"
                  />
                  <span class="video_title">video</span>
                </div>
              </b-card>
            </b-col>
          </div>
        </b-card>
      </b-col>
    </b-row>
  </section>
</template>

<script>
import { BRow, BCol, BCard, BImg } from "bootstrap-vue";
export default {
  components: {
    BRow,
    BCol,
    BCard,
    BImg,
  },
  data() {
    return {
      image1: require("@/assets/images/slider/01.jpg"),
      image2: require("@/assets/images/pages/world-mastercard-card.jpg"),
      currentCardBackground: Math.floor(Math.random() * 25 + 1), // just for fun :D
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
      isInputFocused: false,
    };
  },
  mounted() {
    this.cardNumberTemp = this.otherCardMask;
    //  document.getElementById("cardNumber").focus();
  },
  computed: {
    getCardType() {
      let number = this.cardNumber;
      let re = new RegExp("^4");
      if (number.match(re) != null) return "visa";

      re = new RegExp("^(34|37)");
      if (number.match(re) != null) return "amex";

      re = new RegExp("^5[1-5]");
      if (number.match(re) != null) return "mastercard";

      re = new RegExp("^6011");
      if (number.match(re) != null) return "discover";

      re = new RegExp("^9792");
      if (number.match(re) != null) return "troy";

      return "visa"; // default type
    },
    generateCardNumberMask() {
      return this.getCardType === "amex" ? this.amexCardMask : this.otherCardMask;
    },
    minCardMonth() {
      if (this.cardYear === this.minCardYear) return new Date().getMonth() + 1;
      return 1;
    },
  },
  watch: {
    cardYear() {
      if (this.cardMonth < this.minCardMonth) {
        this.cardMonth = "";
      }
    },
  },
  methods: {
    flipCard(status) {
      this.isCardFlipped = status;
    },
    focusInput(e) {
      this.isInputFocused = true;
      let targetRef = e.target.dataset.ref;
      let target = this.$refs[targetRef];
      this.focusElementStyle = {
        width: `${target.offsetWidth}px`,
        height: `${target.offsetHeight}px`,
        transform: `translateX(${target.offsetLeft}px) translateY(${target.offsetTop}px)`,
      };
    },
    blurInput() {
      let vm = this;
      setTimeout(() => {
        if (!vm.isInputFocused) {
          vm.focusElementStyle = null;
        }
      }, 300);
      vm.isInputFocused = false;
    },
  },
};
</script>
<style>
.category-slider {
  margin-top: 10px;
}
div#carousel-interval___BV_inner_ {
  height: 106px;
}
.grid-container {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}

.flex_col {
  flex: 25%;
}

@media screen and (min-width: 768px) {
  .flex_col {
    flex: 50%;
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

.set-card-width {
  width: 99%;
}

.menu-list.col-sm-12.col-lg-12 {
  margin-top: 10px;
}

/**22/05/2021**/

.menu-list.menu-customized {
  float: left;
  width: 100%;
  margin-top: 40px !important;
}

.menu-list.menu-customized h2.content-header-title.pr-1.mb-10 {
  border: none;
  margin-bottom: 20px;
}

.dark-layout .menu-list.menu-customized h2.content-header-title {
  color: #fff;
}

.menu-list.menu-customized .video-container {
  text-align: center;
  position: relative;
}

.menu-list.menu-customized .video-container img {
  width: 100%;min-height:80px;
}

.menu-list.menu-customized .video-container span.video_title {
  margin-top: 10px;
  text-transform: capitalize;
}

.dark-layout .menu-list.menu-customized .video-container span.video_title {
  color: #fff;
}

.menu-list.menu-customized .card-body {
  padding: 0;
  border-radius: 0.4em;
}

.menu-list.menu-customized .card {
  overflow: hidden;
}

.menu-list.menu-customized .video-container span.video_title {
  position: absolute;
  z-index: 1;
  bottom: 0;
  left: 0;
  display: block;
  width: 100%;
  margin: 0 !important;
  padding: 6px 12px;
  text-align: left;
  background: linear-gradient(180deg, transparent, black);
}

.credit-menus .card-body {
    padding: 15px 10px;
}

.credit-menus {
    margin-top: 25px;
}

.credit-menus .menu-list.menu-customized {
    margin: 0 !important;
}

.credit-menus .menu-cardination {
    float: left;
    width: 14.667%;
    flex: none;
    margin: 5px 1%;
    padding: 0;
    max-width: 100%;
}

.card h4.card-title {margin:0 1% 15px !important;}

.credit-menus .menu-cardination .card {
    margin: 0;
}

@media only screen and (max-width: 767px) {
  .menu-list.menu-customized .col-sm-6 {
    max-width: 50%;
    padding: 0 0.5rem;
  }

  .menu-list.menu-customized .col-sm-6 .card {
    margin: 0.5rem 0px;
  }

  .menu-list.menu-customized h2.content-header-title.pr-1.mb-10 {
    margin-bottom: 10px !important;
  }

  .credit-menus .menu-cardination { width:31.33% }

  .credit-menus {margin-top:15px;}

}
</style>
