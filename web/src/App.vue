<template>
  <v-app id="inspire" theme="dark">
    <Navigation/>
    <AppBar/>
    <MainContent :source='source'/>
  </v-app>
</template>

<script>
import Navigation from './components/navigation/Navigation'
import AppBar from './components/appBar/AppBar'
import MainContent from './components/mainContent/MainContent'

export default {
  name: 'App',

  props: {
    source: String
  },

  components: {
    Navigation,
    AppBar,
    MainContent
  },

  data: () => ({
    dialog: false
  })
}
</script>
