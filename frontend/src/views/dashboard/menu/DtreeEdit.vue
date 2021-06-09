<template>
  <div>
      <b-card>
   <b-form>
      <b-row class="edit-form">

           <b-col
          cols="12"
          md="12"
        >
<img src="http://placehold.it/200x200"/>

           </b-col>

        <!-- Field: Username -->
        <b-col
          cols="12"
          md="12"
        >
          <b-form-group
            label="FirstName"
            label-for="firstname"
          >
            <b-form-input
              id="firstname"
              v-model="userData.firstname"
            />
          </b-form-group>
        </b-col>

        <!-- Field: Full Name -->
        <b-col
          cols="12"
          md="12"
        >
          <b-form-group
            label="Lastname"
            label-for="lastname"
          >
            <b-form-input
              id="full-name"
              v-model="userData.fullName"
            />
          </b-form-group>
        </b-col>

        
        <!-- Field: Full Name -->
        <b-col
          cols="12"
          md="12"
        >
          <b-form-group
            label="Nick Name"
            label-for="nickname"
          >
            <b-form-input
              id="full-name"
              v-model="userData.nickname"
            />
          </b-form-group>
        </b-col>

        <!-- Field: Email -->
        <b-col
          cols="12"
          md="12"
        >
          <b-form-group
            label="Email"
            label-for="email"
          >
            <b-form-input
              id="email"
              v-model="userData.email"
              type="email"
            />
          </b-form-group>
        </b-col>

<!-- Field: Full Name -->
        <b-col
          cols="12"
          md="12"
        >
          <b-form-group
            label="WhatsAppNo"
            label-for="contact"
          >
            <b-form-input
              id="contact"
              v-model="userData.contact"
            />
          </b-form-group>
        </b-col>
     
        <!-- Field: Role -->
        <b-col
          cols="12"
          md="12"
        >
          <b-form-group
            label="Church Role"
            label-for="user-role"
          >
            <v-select
              v-model="userData.role"
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              :options="roleOptions"
              :reduce="val => val.value"
              :clearable="false"
              input-id="user-role"
            />
          </b-form-group>
        </b-col>

     

      </b-row>
    </b-form>
      

   
    <!-- Action Buttons -->
    <b-button
      variant="primary"
      class="mb-1 mb-sm-0 mr-0 mr-sm-1"
      :block="$store.getters['app/currentBreakPoint'] === 'xs'"
    >
      Save Changes
    </b-button>
    <b-button
      variant="outline-secondary"
      type="reset"
      :block="$store.getters['app/currentBreakPoint'] === 'xs'"
    >
      Delete
    </b-button>
    </b-card>
  </div>
</template>
<script>
import {
  BButton, BMedia, BAvatar, BRow, BCol, BFormGroup, BFormInput, BForm, BTable, BCard, BCardHeader, BCardTitle, BFormCheckbox,
} from 'bootstrap-vue'
import vSelect from 'vue-select'

export default {
  components: {
    BButton,
    BMedia,
    BAvatar,
    BRow,
    BCol,
    BFormGroup,
    BFormInput,
    BForm,
    BTable,
    BCard,
    BCardHeader,
    BCardTitle,
    BFormCheckbox,
    vSelect,
  },
  data() {
    return {
      userData:{

       firstname:"",
       fullName:"",
       nickname:"",
       email:"",
       contact:"",
       role:"" 


      },
     roleOptions :[
      { label: 'Admin', value: 'admin' },
      { label: 'Author', value: 'author' },
      { label: 'Editor', value: 'editor' },
      { label: 'Maintainer', value: 'maintainer' },
      { label: 'Subscriber', value: 'subscriber' },
    ]
      
    }
  },
  created() {
  },
  
}
</script>