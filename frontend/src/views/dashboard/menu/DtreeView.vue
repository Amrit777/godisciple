<template>
  <section id="dashboard-menu" class="visibility-card">
    <b-row>
      <!-- Search -->
      <div class="search-bar-card">
        <b-form-input class="d-inline-block mr-1" placeholder="Search Role" />
        <div
          class="button-wrapper"
          @click="$router.push({ name: 'apps-invite-request' })"
        >
          <b-button variant="primary" class="invite-btn">
            <span class="text-nowrap">Search</span>
          </b-button>
        </div>
      </div>

      <b-col md="12">
        <component :is="'div'" class="tab-section">
          <b-tabs pills>
            <!-- Tab: Account -->
            <b-tab active>
              <template #title>
                <span class="tab-title-custom">Card View</span>
              </template>
              <dtree-list />
            </b-tab>

            <!-- Tab: Information -->
            <b-tab class="tree-view">
              <template #title>
                <span class="tab-title-custom">Tree View</span>
              </template>
              <table-tree />
            </b-tab>
          </b-tabs>
        </component>
      </b-col>
    </b-row>
  </section>
</template>

<script>
import {
  BCard,
  BRow,
  BCol,
  BFormInput,
  BButton,
  BTable,
  BMedia,
  BAvatar,
  BLink,
  BBadge,
  BDropdown,
  BDropdownItem,
  BPagination,
  BTab,
  BTabs,
} from "bootstrap-vue";

import { ref, onUnmounted } from "@vue/composition-api";
import router from "@/router";
import store from "@/store";
import DtreeList from "./DtreeList.vue";
import TableTree from "./TableTree.vue";

export default {
  components: {
    BCard,
    BRow,
    BCol,
    BFormInput,
    BButton,
    BTable,
    BMedia,
    BAvatar,
    BLink,
    BBadge,
    BDropdown,
    BDropdownItem,
    BPagination,
    BTab,
    BTabs,
    DtreeList,
    TableTree,
  },
  data() {
    return {
      data: {
        image1: require("@/assets/images/slider/01.jpg"),
        image2: require("@/assets/images/pages/world-mastercard-card.jpg"),
        userData: false,
      },
    };
  },

  created() {},
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

.tab-section {
  margin-top: 16px;
}

.nav-pills li.nav-item {
  width: 50%;
}

.nav-pills .nav-link.active {
  border-color: #7367f0;
  -webkit-box-shadow: 0 4px 18px -4px rgb(115 103 240 / 65%);
  box-shadow: 0 4px 18px -4px rgb(115 103 240 / 65%);
  padding: 11px;
}
.tab-title-custom {
  font-size: 10px;
}

.row {
   
    border: none;
}
</style>
