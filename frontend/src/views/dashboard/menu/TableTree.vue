<template>
  <tree-table
          class="table"
          :table-data="tableData" 
          >

 <template #headerTemplate="headerProps">
                <table-header v-bind="headerProps" />
            </template>

            <template #nodeTemplate="nodeProps">

           <trea-node 
            v-bind="nodeProps"
           
            />

             

            
            </template>

            <template #leafTemplate="leafProps">

              <tree-leaf v-bind="leafProps"  />
              
              
            </template>
  </tree-table>
</template>

<script>
  import TreeTable from 'vue-tree-table-component'
  import TreeLeaf from './TreeLeaf'
  import TreaNode from './TreaNode'
  import TableHeader from './TableHeader'
  
 
  export default {
    
    name: 'DefaultTableTree',
    components: {TreeTable,TreeLeaf,TreaNode,TableHeader},
    data: function(){


       const tableData= [
    {
      id: 1,
      avatar: require('@/assets/images/avatars/10-small.png'),
      fullName: "Korrie O'Crevy",
      email: 'kocrevy0@thetimes.co.uk',
      startDate: 'Male',
      salary: '$23896.35',
      status: 'Professional',
      children:[
        {
         id: 9,
         avatar: require('@/assets/images/avatars/2-small.png'),
      fullName: 'Allyson Moakler',
      email: 'amoakler8@shareasale.com',
      startDate: 'Male',
      salary: '$11677.32',
      status: 'Applied',
      children:[
        {
      id: 5,
      avatar: require('@/assets/images/avatars/4-small.png'),
      fullName: 'Harmonia Nisius',
      email: 'hnisius4@gnu.org',
      startDate: 'FeMale',
      salary: '$10909.52',
      status: 'Professional',
    },
    {
      id: 6,
      avatar: require('@/assets/images/avatars/5-small.png'),
      fullName: 'Genevra Honeywood',
      email: 'ghoneywood5@narod.ru',
      startDate: 'FeMale',
      salary: '$17803.8',
      status: 'Current',
     }
   ]
    },
   

      ]
    },
    
    
   
  ]



      return {
        tableData:tableData
      }
    }
  }
</script>

<style scoped>
  .table{
    width: 60%;
    margin: auto;
  }
  .setname{
    color:aqua;
  }
</style>