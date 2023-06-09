<script setup lang="ts">
import { RouterView } from 'vue-router'
</script>

<template>
  <v-layout ref="app">
    <v-app-bar color="green-darken-2" name="app-bar" class="justify-center">
      <div class="d-flex justify-center align-center w-100">
        <v-btn color="white">Example Course</v-btn>
      </div>
    </v-app-bar>
    <v-navigation-drawer color="green-lighten-1" permanent name="drawer">
      <div class="d-flex justify-center align-center h-100"></div>
    </v-navigation-drawer>
    <v-main>
      <router-view></router-view>
    </v-main>
  </v-layout>
</template>
