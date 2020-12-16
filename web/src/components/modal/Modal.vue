<template>
  <v-dialog v-model="dialog" max-width="500px">
    <template v-slot:activator="{ on }">
      <v-btn color="primary" dark class="mb-2" v-on="on">{{ buttonTitle }}</v-btn>
    </template>
    <v-card>
      <v-card-title>
        <span class="headline">{{ formTitle }}</span>
      </v-card-title>
      <v-card-text>
        <v-container>
          <template v-for="field in fields">
            <v-row :key="field.name">
              <v-col v-if="field.type === 'num'" cols="12">
                <v-text-field
                  v-model="editedItem[field.name]"
                  :label="field.label"
                  type="number"
                />
              </v-col>
              <v-col v-if="field.type === 'text'" cols="12">
                <v-text-field
                  v-model="editedItem[field.name]"
                  :label="field.label"
                />
              </v-col>
              <v-col v-else-if="field.type === 'select'" cols="12">
                <v-select
                  v-model="editedItem[field.name]"
                  :items="field.items"
                  :label="field.label"
                />
              </v-col>
              <v-col v-else-if="field.type === 'date'" cols="12">
                <v-date-picker
                  v-model="editedItem[field.name]"
                  :reactive="true"
                  :show-current="true"
                  :label="field.label"
                />
              </v-col>
              <v-col v-else-if="field.type === 'checkbox'" cols="12">
                <v-checkbox
                  v-model="editedItem[field.name]"
                  :label="field.label"
                />
              </v-col>
              <v-col v-else-if="field.type === 'boolean'" cols="12">
                <v-switch
                  v-model="editedItem[field.name]"
                  :label="field.label"
                />
              </v-col>
            </v-row>
          </template>
        </v-container>
      </v-card-text>
      <v-card-actions>
        <v-spacer/>
        <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
        <v-btn color="blue darken-1" text @click="save">Save</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
import Axios from '@/axios'

export default {
  name: 'modal',
  props: {
    fields: Array,
    formTitle: String,
    buttonTitle: String,
    dictionaryRoute: String
  },
  data: () => ({
    dialog: false,
    editedIndex: -1,
    editedItem: {}
  }),
  methods: {
    defaultItem () {
      const item = {}

      for (let field in this.fields) {
        item[field.name] = ''
      }

      this.editedItem = item

      return item
    },
    close () {
      this.dialog = false

      setTimeout(() => {
        this.defaultItem()
        this.editedIndex = -1
      }, 300)
    },
    save () {
      if (this.editedIndex > -1) {
        // Новая запись
        console.log(this.editedItem)
      } else {
        // Редактирование записи
        console.log(this.editedItem)
      }

      const body = {
        dictionaryRoute: this.dictionaryRoute,
        item: this.editedItem
      }
      const options = {
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        }
      }
      Axios.post('/dictionary-save', body, options)
        .then(res => {
          // this.close()
        })
        .catch(error => {
          console.log(error)
        })
    }
  }
}
</script>

<style scoped>

</style>
