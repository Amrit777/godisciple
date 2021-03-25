<template>
   <b-row>
    <b-col cols="12">
      <!-- Register v1 -->
      <b-card class="mb-0">
       <b-link class="brand-logo">
       <img src="https://png.pngtree.com/element_our/20200610/ourmid/pngtree-character-default-avatar-image_2237203.jpg" alt="" width="150" height="150">
      </b-link>

  
      
       

        <!-- form -->
        <validation-observer ref="registerForm">
          <b-form
            class="auth-register-form mt-2"
            @submit.prevent="validationForm"
          >

<b-row>
  

     <b-col cols="4">
            <!-- username -->
            <b-form-group
              label="First Name"
              label-for="firstname"
            >
              <validation-provider
                #default="{ errors }"
                name="Firstname"
                rules="required"
              >
                <b-form-input
                  id="firstname"
                  v-model="username"
                  :state="errors.length > 0 ? false:null"
                  name="register-username"
                  placeholder="johndoe"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

    </b-col>

      <b-col cols="4">
            <!-- username -->
            <b-form-group
              label="Last Name"
              label-for="lastname"
            >
              <validation-provider
                #default="{ errors }"
                name="Lastname"
                rules="required"
              >
                <b-form-input
                  id="lastname"
                  v-model="lastname"
                  :state="errors.length > 0 ? false:null"
                  name="register-lastname"
                  placeholder="Last Name"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

    </b-col>

   <b-col cols="4">
            <!-- username -->
            <b-form-group
              label="Nick Name"
              label-for="nickname"
            >
              <validation-provider
                #default="{ errors }"
                name="Nick Name"
                rules="required"
              >
                <b-form-input
                  id="nickname"
                  v-model="nickname"
                  :state="errors.length > 0 ? false:null"
                  name="register-lastname"
                  placeholder="Nick Name"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

    </b-col>

    
   <b-col cols="4">
            <!-- username -->
            <b-form-group
              label="Birth Date"
              label-for="birthdate"
            >
              <validation-provider
                #default="{ errors }"
                name="Birth Date"
                rules="required"
              >
              
                 <b-form-datepicker
                   id="example-datepicker"
                    v-model="birthdate"
                    :state="errors.length > 0 ? false:null"

                    class="mb-1"
                  />
                
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

    </b-col>


   <b-col cols="4">
            <!-- username -->
            <b-form-group
              label="Birth Place"
              label-for="birthplace"
            >
              <validation-provider
                #default="{ errors }"
                name="Birth Place"
                rules="required"
              >
            <b-form-select
              v-model="birthplace"
              :options="options"
              :state="errors.length > 0 ? false:null"
            />
                
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

    </b-col>
    
   <b-col cols="4">
            <!-- username -->
            <b-form-group
              label="Baptism Date"
              label-for="batptism"
            >
              <validation-provider
                #default="{ errors }"
                name="Baptism Date"
                rules="required"
              >
              
                 <b-form-datepicker
                   id="batptism"
                    v-model="batptism"
                    :state="errors.length > 0 ? false:null"

                    class="mb-1"
                  />
                
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

    </b-col>

    <b-col cols="6">
            <!-- username -->
            <b-form-group
              label="Martial Status"
              label-for="martial_status"
            >
              <validation-provider
                #default="{ errors }"
                name="Martial Status"
                rules="required"
              >
            <b-form-select
              v-model="martial_status"
              :options="gender_options"
              :state="errors.length > 0 ? false:null"
            />
                
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

    </b-col>
    
    <b-col cols="6">
            <!-- username -->
            <b-form-group
              label="Church Role"
              label-for="churchRole"
            >
              <validation-provider
                #default="{ errors }"
                name="Martial Status"
                rules="required"
              >
            <b-form-select
              v-model="churchRole"
              :options="options"
              :state="errors.length > 0 ? false:null"
            />
                
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

    </b-col>


    <b-col cols="12">
            <!-- username -->
            <b-form-group
              label="Mobile Phone  (Phone Mask) example +62 821 000000000"
              label-for="mobile"
            >
              <validation-provider
                #default="{ errors }"
                name="Mobile Phone"
                rules="required"
              >
                <b-form-input
                  id="mobile"
                  v-model="mobile"
                  :state="errors.length > 0 ? false:null"
                  name="register-mobile"
                  placeholder="(Phone Mask) example +62 821 000000000"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

    </b-col>
    
    

    <b-col cols="6">

      <!-- email -->
            <b-form-group
              label="Email"
              label-for="email"
            >
              <validation-provider
                #default="{ errors }"
                name="Email"
                rules="required|email"
              >
                <b-form-input
                  id="email"
                  v-model="regEmail"
                  :state="errors.length > 0 ? false:null"
                  name="register-email"
                  placeholder="john@example.com"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>


    </b-col>

    <b-col cols="6">
       <!-- password -->
            <b-form-group
              label="Password"
              label-for="password"
            >
              <validation-provider
                #default="{ errors }"
                name="Password"
                rules="required"
              >
                <b-input-group
                  class="input-group-merge"
                  :class="errors.length > 0 ? 'is-invalid':null"
                >
                  <b-form-input
                    id="password"
                    v-model="password"
                    :type="passwordFieldType"
                    :state="errors.length > 0 ? false:null"
                    class="form-control-merge"
                    name="register-password"
                    placeholder="Enter Your Password"
                  />
                  <b-input-group-append is-text>
                    <feather-icon
                      :icon="passwordToggleIcon"
                      class="cursor-pointer"
                      @click="togglePasswordVisibility"
                    />
                  </b-input-group-append>
                </b-input-group>
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
      </b-col>

       <b-col cols="12">
        <b-form-group
              label="Address"
              label-for="address"
            >
         <validation-provider
                #default="{ errors }"
                name="Address"
                rules="required"
              >
        <b-form-textarea
          id="textarea-auto-height"
          placeholder="Address"
          name="address"
          rows="3"
          max-rows="8"
          class="mb-1 mb-xl-0"
        />

          <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
              </b-form-group>
      </b-col>

      
  <b-col cols="6">
            <!-- username -->
            <b-form-group
              label="City"
              label-for="city"
            >
              <validation-provider
                #default="{ errors }"
                name="City"
                rules="city"
              >
            <b-form-select
              v-model="city"
              :options="options"
              :state="errors.length > 0 ? false:null"
            />
                
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

    </b-col>

    <b-col cols="6">
            <!-- username -->
            <b-form-group
              label="Country"
              label-for="country"
            >
              <validation-provider
                #default="{ errors }"
                name="Country"
                rules="country"
              >
            <b-form-select
              v-model="country"
              :options="options"
              :state="errors.length > 0 ? false:null"
            />
                
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

    </b-col>

    

    <b-col cols="6">
            <!-- username -->
            <b-form-group
              label="Ministry"
              label-for="ministry"
            >
              <validation-provider
                #default="{ errors }"
                name="Ministry"
                rules="ministry"
              >
            <b-form-select
              v-model="ministry"
              :options="options"
              :state="errors.length > 0 ? false:null"
            />
                
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

    </b-col>


     <b-col cols="6">
            <!-- username -->
            <b-form-group
              label="Sunday Services"
              label-for="sunday_services"
            >
              <validation-provider
                #default="{ errors }"
                name="Sunday Services"
                rules="sunday_services"
              >
            <b-form-select
              v-model="sunday_services"
              :options="options"
              :state="errors.length > 0 ? false:null"
            />
                
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

    </b-col>
 <b-col cols="6">

   <b-button
              variant="danger"
              block
             :to="{name:'auth-login-v1'}"
            >
             Cancel
            </b-button>

   </b-col>
  
  <b-col cols="6">
    <!-- submit button -->
            <b-button
              variant="primary"
              block
              type="submit"
            >
              Sign up
            </b-button>
     </b-col>

</b-row>


            
           

            

           
          </b-form>
        </validation-observer>

        <b-card-text class="text-center mt-2">
          <span>Already have an account? </span>
          <b-link :to="{name:'auth-login-v1'}">
            <span>Sign in instead</span>
          </b-link>
        </b-card-text>

        <div class="divider my-2">
          <div class="divider-text">
            or
          </div>
        </div>

        <!-- social buttons -->
        <div class="auth-footer-btn d-flex justify-content-center">
          <b-button
            variant="facebook"
            href="javascript:void(0)"
          >
            <feather-icon icon="FacebookIcon" />
          </b-button>
          <b-button
            variant="twitter"
            href="javascript:void(0)"
          >
            <feather-icon icon="TwitterIcon" />
          </b-button>
          <b-button
            variant="google"
            href="javascript:void(0)"
          >
            <feather-icon icon="MailIcon" />
          </b-button>
          <b-button
            variant="github"
            href="javascript:void(0)"
          >
            <feather-icon icon="GithubIcon" />
          </b-button>
        </div>
      </b-card>
    <!-- /Register v1 -->
    </b-col>
  </b-row>

</template>

<script>
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import {
  BCard,
  BLink, 
  BCardTitle,
  BCardText, 
  BForm,
  BButton, 
  BFormInput, 
  BFormGroup, 
  BInputGroup,
  BInputGroupAppend,
  BFormCheckbox,
  BRow,
  BFormFile,
  BCol,
  BFormDatepicker,
  BFormSelect,
  BFormTextarea
} from 'bootstrap-vue'
import VuexyLogo from '@core/layouts/components/Logo.vue'
import { required, email } from '@validations'
import { togglePasswordVisibility } from '@core/mixins/ui/forms'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import { FormWizard } from 'vue-form-wizard'




export default {
  components: {
    BRow,
    BCol,
    VuexyLogo,
    BFormTextarea,
    // BSV
    BFormDatepicker,
    BCard,
    BLink,
    BCardTitle,
    BCardText,
    BForm,
    BButton,
    BFormInput,
    BFormGroup,
    BInputGroup,
    BInputGroupAppend,
    BFormFile,
    BFormSelect,
    BFormCheckbox,
    // validations
    ValidationProvider,
    ValidationObserver,
  },
  mixins: [togglePasswordVisibility],
  data() {
    return {
      regEmail: '',
      username: '',
      firstname: '',
      lastname: '',
      nickname: '',
      mobile: '',
      birthdate: '',
      birthplace: '',
      batptism: '',
      martial_status: '',
      churchRole: '',
      sunday_services: '',
      ministry: '',
      address : '',
      city : '',
      country : '',
      password: '',
      status: '',
      file: null,
      // validation rules
      required,
      email,
      options: [
        { value: "", text: 'Please select an option' },
        { value: 'a', text: 'This is First option' },
        { value: 'b', text: 'Simple Option' },
        { value: { C: '3PO' }, text: 'This is an option with object value' },
        { value: 'd', text: 'This one is disabled', disabled: true },
      ],
      gender_options: [
        { value: "", text: 'Select Gender' },
        { value: 'Male', text: 'Male' },
        { value: 'Female', text: 'Female' }
        
      ],

      mime_type: '',
      cropedImage: '',
      autoCrop: false,
      selectedFile: '',
      image: '',
      dialog: false,
      files: '',
    }
  },
  computed: {
    passwordToggleIcon() {
      return this.passwordFieldType === 'password' ? 'EyeIcon' : 'EyeOffIcon'
    },
  },
  methods: {
    validationForm() {
      this.$refs.registerForm.validate().then(success => {
        if (success) {
          this.$toast({
            component: ToastificationContent,
            props: {
              title: 'Form Submitted',
              icon: 'EditIcon',
              variant: 'success',
            },
          })
        }
      })
    },

     saveImage() {
      const userId = this.$route.params.user_id
      this.cropedImage = this.$refs.cropper.getCroppedCanvas().toDataURL()
      this.$refs.cropper.getCroppedCanvas().toBlob((blob) => {
        const formData = new FormData()
        formData.append('profile_photo', blob, 'name.jpeg')
        // axios
        //   .post('/api/user/' + userId + '/profile-photo', formData)
        //   .then((response) => {
        //   })
        //   .catch(function (error) {
        //     console.log(error)
        //   })
      }, this.mime_type)
    },
     onFileSelect(e) {
      const file = e.target.files[0]
      this.mime_type = file.type
      console.log(this.mime_type)
      if (typeof FileReader === 'function') {
        this.dialog = true
        const reader = new FileReader()
        reader.onload = (event) => {
          this.selectedFile = event.target.result
          this.$refs.cropper.replace(this.selectedFile)
        }
        reader.readAsDataURL(file)
      } else {
        alert('Sorry, FileReader API not supported')
      }
    },
  },
}
</script>

<style lang="scss">
@import '@core/scss/vue/pages/page-auth.scss';
</style>
