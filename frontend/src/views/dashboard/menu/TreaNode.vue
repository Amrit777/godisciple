<template>

  <div class="row">
      
       <div
                class="cell"
                @click="toggle"
                :style="{ 'flex-grow': getWidth('open_button') }"
        >
            <div
                    v-if="!isOpen"
                    class="closed"
            >
            </div>
            <div
                    v-if="isOpen"
                    class="open"
            >
            </div>
        </div>
  
   <div class="cell"><img :src="rowData.avatar" width='50' height='50'  /></div>
   <div class="cell">{{ rowData.fullName}}</div>
    <div class="cell">{{ rowData.startDate}}</div>
    <div class="cell">{{ rowData.salary}}</div>
      <div class="cell">{{ rowData.email}}</div>

  </div>

    
</template>



<script>

export default {
    name: 'DefaultTableTree',
      props: {
        rowData: {
            type: Object,
            default: () => {
              return {}
            }
          },
          defaultOrder: {
            type: Array,
            default: () => {
              return []
            }
          },
          isKeyEditable:{
            type: Function,
            default: () => {}
          },
          keysToCalculate:{
            type: Array,
            default: () => {
              return []
            }
          },
          onOpen: {
            type: Function,
            default: () => {}
          },
          onToggle: {
            type: Function,
            default: () => {}
          },
          deleteNode: {
            type: Function,
            default: () => {}
          },
          addNode: {
            type: Function,
            default: () => {}
          },
          columns: {
            type: Array,
            default: () => { return [] }
          }
      },

     data: function () {
            return {
                isOpen: false
            }
      },

       methods: {
            calculateValuesFromChildren(){
                this.keysToCalculate.forEach(key => {
                    this.rowData[key] =  this.rowData.children.reduce((acc, child) => acc + child[key], 0)
                })
            },
            addNodeAndOpen() {
                this.addNode(this.rowData.children)
                this.open()
            },
            open() {
                this.isOpen = true
                this.onOpen()
            },
            toggle() {
              this.isOpen = !this.isOpen
              this.onToggle()
            },
            getWidth(columnId){
              return '0';
            }
        }
    
  }

</script>

<style>

 input {
        border: none;
        width: 100%;
        margin: 0;
        padding: 0;
    }
    .open-button {
        float: left;
        display: inline;
        margin-right: 10px;
    }
    .closed::before{
        content: "▸";
    }
    .open::before{
        content: "▾";
    }
    .action{
        display: inline-block;
        margin: 0.125rem;
    }
    .red{
        color: red;
    }
    .green{
        color: green;
    }
    </style>
