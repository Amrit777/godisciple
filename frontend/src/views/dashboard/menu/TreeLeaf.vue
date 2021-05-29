
<template>
<div class="row">
       <div class="cell"><img :src="rowData.avatar" width='50' height='50'  /></div>
  <div class="cell">{{ rowData.fullName}}</div>
    <div class="cell">{{ rowData.startDate}}</div>
    <div class="cell">{{ rowData.salary}}</div>

       <div class="cell">{{ rowData.email}}</div>

</div>
</template>

<script>
  import TreeTable from 'vue-tree-table-component'

  export default {
    name: 'DefaultTableTree',
    components: {TreeTable},
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
      },
    data: function(){
      return {
        tableData: [
          {name: 'Ziuta', surname: 'Kozak', children: [
              {name: 'Czerwony Kapturek', surname: 'Kozak'}
            ]},
          {name: 'Koziolek', surname: 'Matolek', children: [
              { name: 'Timon', surname: 'Matolek', children: [ {name: 'Timon Junior', surname: 'Matolek'} ]}
            ]},
          {name: 'Pumba', surname: 'unknown'}
        ],
        columns: [{label: 'Name', id: 'name'}, {label: 'Surname', id: 'surname'}]
      }
    }
  }
</script>
