<template>
  <v-data-table
    :headers="headers"
    :items="rows"
    :sort-by="sortBy"
    class="elevation-1"
    loading-text="Загрузка... Пожалуйста, подождите"
  >
    <template v-slot:top>
      <v-toolbar flat color="white">
        <v-toolbar-title>{{ dictionaryRoute }}</v-toolbar-title>
        <v-divider
          class="mx-4"
          inset
          vertical
        />
        <v-spacer/>
        <Modal
          :fields="fields"
          :dictionaryRoute="dictionaryRoute"
          formTitle="Создать новую запись"
          buttonTitle="Создать"
        />
      </v-toolbar>
    </template>
    <template v-slot:item.action="{ item }">
      <v-icon
        small
        class="mr-2"
        @click="editItem(item)"
      >
        edit
      </v-icon>
      <v-icon
        small
        @click="deleteItem(item)"
      >
        delete
      </v-icon>
    </template>
    <template v-slot:no-data>
      <v-btn color="primary" @click="getTableData">Reset</v-btn>
    </template>
  </v-data-table>
</template>

<script>
import Axios from '@/axios'
import Modal from '@/components/modal/Modal'

export default {
  name: 'SimpleDictionary',
  components: {
    Modal
  },
  data: () => ({
    dialog: false,
    dictionaryRoute: '',
    headers: [],
    fields: [],
    rows: [],
    sortBy: null,
    editedIndex: -1,
    editedItem: {}
  }),

  beforeMount () {
    this.dictionaryRoute = this.$route.params.name
    this.getTableData()
  },

  beforeRouteUpdate (to, from, next) {
    this.dictionaryRoute = to.params.name
    this.getTableData()
    next()
  },

  computed: {
    formTitle () {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    }
  },

  watch: {
    dialog (val) {
      val || this.close()
    }
  },

  methods: {
    getTableData () {
      const body = {
        dictionaryRoute: this.dictionaryRoute
      }
      const options = {
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        }
      }
      Axios.post('/dictionary', body, options)
        .then(res => {
          this.headers = res.data.headers
          this.fields = res.data.fields
        })
        .catch(error => {
          console.log(error)
        })
    },

    editItem (item) {
      this.editedIndex = this.rows.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },

    deleteItem (item) {
      const index = this.rows.indexOf(item)
      confirm('Are you sure you want to delete this item?') && this.rows.splice(index, 1)
    }
  }
}
</script>

<style scoped>

</style>
