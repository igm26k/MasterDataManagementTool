<template>
  <v-content>
    <v-container
      class="fill-height"
      fluid
    >
      <router-view />
    </v-container>
  </v-content>
</template>

<script>
export default {
  name: 'Content',
  props: ['source']
}
</script>

<style scoped>

</style>
