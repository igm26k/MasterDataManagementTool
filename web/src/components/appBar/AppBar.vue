<template>
  <v-app-bar
    :clipped-left="$vuetify.breakpoint.lgAndUp"
    app
    color="blue darken-3"
    dark
  >
    <v-app-bar-nav-icon @click.stop="toggleDrawer"/>
    <v-toolbar-title
      style="width: 300px"
      class="ml-0 pl-4"
    >
      <span class="hidden-sm-and-down">Master Data Management Tool</span>
    </v-toolbar-title>
    <v-text-field
      flat
      solo-inverted
      hide-details
      prepend-inner-icon="mdi-magnify"
      label="Поиск"
      class="hidden-sm-and-down"
    />
    <v-spacer/>
    <v-btn
      icon
      large
    >
      <v-avatar
        size="32px"
        item
      >
        <v-img
          src="/img/logo.png"
          alt="Master Data Management Tool"
        />
      </v-avatar>
    </v-btn>
  </v-app-bar>
</template>

<script>
export default {
  name: 'AppBar',
  methods: {
    toggleDrawer () {
      this.$store.dispatch('drawer/toggleDrawer', true)
    }
  }
}
</script>

<style scoped>

</style>
