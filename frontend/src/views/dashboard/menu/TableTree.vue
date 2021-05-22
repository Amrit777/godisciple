<template>
  <b-card-code title="SSR">

    <!-- search input -->
    <div class="custom-search d-flex justify-content-end">
      <b-form-group>
        <div class="d-flex align-items-center">
          <label class="mr-1">Search</label>
          <b-form-input
            v-model="searchTerm"
            placeholder="Search"
            type="text"
            class="d-inline-block"
            @input="handleSearch"
          />
        </div>
      </b-form-group>
    </div>

    <!-- table -->
    <vue-good-table
     
    :columns="columns"
    :rows="rows"
    :group-options="{
  	  enabled: true,
      collapsable: true
    }"
    >
      
    </vue-good-table>

    
  </b-card-code>
</template>

<script>
import BCardCode from '@core/components/b-card-code/BCardCode.vue'
import {
  BAvatar, BBadge, BPagination, BFormGroup, BFormInput, BFormSelect, BDropdownItem, BDropdown,
} from 'bootstrap-vue'
import { VueGoodTable } from 'vue-good-table'
import 'prismjs'
import 'prismjs/themes/prism-tomorrow.css'
import Prism from 'vue-prism-component'
import store from '@/store/index'
import { codeSSR } from './code'

export default {
  components: {
    BCardCode,
    VueGoodTable,
    BAvatar,
    BBadge,
    BPagination,
    BFormGroup,
    BFormInput,
    BFormSelect,
    Prism,
    BDropdownItem,
    BDropdown,
  },
  data() {
    return {
      log: [],
      pageLength: 3,
      dir: false,
      pages: ['3', '5', '10'],
      codeSSR,
      columns: [
        {
          label: 'Name',
          field: 'name',
        },
        {
          label: 'Age',
          field: 'age',
          type: 'number',
        },
        {
          label: 'Percent',
          field: 'score',
          type: 'percentage',
        },
      ],
      rows: [
        { id: 0, name: 'Senior Devs', score: 0.15296, children: [
          { id: 1, name: 'John',  age: 20, score: 0.03845 },
          { id: 2, name: 'Jane',  age: 24, score: 0.02948 },
          { id: 3, name: 'Susan', age: 16, score: 0.08503 }
        ]},
        { id: 4, name: 'Junior Devs', score: 0.12069, children: [
          { id: 5, name: 'Chris', age: 55, score: 0.02946 },
          { id: 6, name: 'Dan',   age: 40, score: 0.09123 }
        ]}
      ],
      searchTerm: '',
      status: [{
        1: 'Current', 2: 'Professional', 3: 'Rejected', 4: 'Resigned', 5: 'Applied',
      },
      {
        1: 'light-primary', 2: 'light-success', 3: 'light-danger', 4: 'light-warning', 5: 'light-info',
      }],
    }
  },
  computed: {
    statusVariant() {
      const statusColor = {
        /* eslint-disable key-spacing */
        Current      : 'light-primary',
        Professional : 'light-success',
        Rejected     : 'light-danger',
        Resigned     : 'light-warning',
        Applied      : 'light-info',
        /* eslint-enable key-spacing */
      }

      return status => statusColor[status]
    },
    direction() {
      if (store.state.appConfig.isRTL) {
        // eslint-disable-next-line vue/no-side-effects-in-computed-properties
        this.dir = true
        return this.dir
      }
      // eslint-disable-next-line vue/no-side-effects-in-computed-properties
      this.dir = false
      return this.dir
    },
  },
  created() {
    // this.$http.get('/good-table/table_ssr')
    //   .then(res => { this.rows = [] })
  },
  methods: {
    handleSearch(searching) {
      this.log.push(`The user searched for: ${searching}`)
    },
    handleChangePage(page) {
      this.log.push(`The user changed the page to: ${page}`)
    },
    handlePageChange(active) {
      this.log.push(`the user change page:  ${active}`)
    },
    onSortChange(params) {
      this.log.push(`the user ordered:  ${params[0].type}`)
    },
  },
}
</script>
<style lang="scss" >
@import '@core/scss/vue/libs/vue-good-table.scss';
</style>