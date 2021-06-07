<template>
  <b-row class="match-height">
    <b-col
      md="6"
      lg="4"
    >
      <b-card
        :img-src="require('@/assets/images/slider/04.jpg')"
        img-alt="Card image cap"
        img-top
        no-body
      >
        <div class="card-details">
        <b-card-text class="make-bold">
         Adam Sandler (23)
        </b-card-text>
        <p class="card-paragraph">Male</p>
        <p class="card-paragraph" >
         <feather-icon
            icon="HeartIcon"
            size="16"
            class="mr-0 mr-sm-50"
          />
           Sandra Buluck
          </p>
          <p class="card-paragraph">Role:Actor</p>

       <p class="card-paragraph">
         <feather-icon
            icon="UsersIcon"
            size="16"
            class="mr-0 mr-sm-50"
          />
           Sandra Buluck
          </p>
            <p class="card-paragraph">
         <feather-icon
            icon="MailIcon"
            size="16"
            class="mr-0 mr-sm-50"
          />
           care@gmail.com
          </p>

              <p class="card-paragraph">
         <feather-icon
            icon="PhoneIcon"
            size="16"
            class="mr-0 mr-sm-50"
          />
          84949494949
          </p>

             <p class="card-paragraph">
           Boston
          </p>


        <b-button class="edit"
          v-ripple.400="'rgba(113, 102, 240, 0.15)'"
          variant="outline-primary"

          @click="$router.push({name:'apps-menu-edit'})"

        >
          Edit Profile
        </b-button>

         <b-button class="member-view"
          v-ripple.400="'rgba(113, 102, 240, 0.15)'"
          variant="outline-primary"
          
          @click="$router.push({name:'apps-menu-edit'})"
        >
         View Member
        </b-button>
        </div>
      </b-card>
    </b-col>
    
  </b-row>
</template>

<script>
import {
  BCard, BCardText, BButton, BRow, BCol, BImg, BCardBody, BCardTitle, BCardSubTitle, BLink,
} from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'

export default {
  components: {
    BCard,
    BCardText,
    BButton,
    BCardBody,
    BCardTitle,
    BCardSubTitle,
    BRow,
    BCol,
    BLink,
    BImg,
  },
  directives: {
    Ripple,
  },
}
</script>

<style>
.card-details {
    text-align: center;
    margin-top: 3px;
}
.make-bold{
    font-weight: bold;
    color: black;
    font-size: small;
    margin-top: 0;
    margin-bottom: 0rem
}

.card-paragraph{

    margin-top: 0;
    margin-bottom: 0rem
}
</style>
