<template>
  <!-- <v-card color="grey lighten-4" flat height="700px" tile>
    <v-toolbar dense>
      <v-app-bar-nav-icon></v-app-bar-nav-icon>

      <v-toolbar-title>Title</v-toolbar-title>

      <v-spacer></v-spacer>

      <router-link to="/" class="mx-2" fab dark small color="primary">
        <v-btn text small>Home</v-btn>
      </router-link>
      <router-link to="/products" class="mx-2" fab dark small color="primary">
        <v-btn text small>Products</v-btn>
      </router-link>
      <router-link to="/product/recipes/create" class="mx-2" fab dark small color="primary">
        <v-btn text small>Products Recipes Create</v-btn>
      </router-link>
      <router-link to="/items" class="mx-2" fab dark small color="primary">
        <v-btn text small>Items</v-btn>
      </router-link>
      <router-link to="/transaction" class="mx-2" fab dark small color="primary">
        <v-btn text small>Transaction</v-btn>
      </router-link>
      <router-link to="/inventory/in" class="mx-2" fab dark small color="primary">
        <v-btn text small>Inventory In</v-btn>
      </router-link>
      <router-link to="/inventory/out" class="mx-2" fab dark small color="primary">
        <v-btn text small>Inventory Out</v-btn>
      </router-link>
      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn>
    </v-toolbar>
    <router-view></router-view>
  </v-card>-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <router-link :to="{name: 'home'}" class="navbar-brand">Laravel + JWT + Vue JS</router-link>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto" v-if="$auth.check(1)">
        <li class="nav-item" v-for="(route, key) in routes.user" v-bind:key="route.path">
          <router-link :to="{ name : route.path }" :key="key" class="nav-link">{{route.name}}</router-link>
        </li>
      </ul>
      <ul class="navbar-nav mr-auto" v-if="$auth.check(2)">
        <li class="nav-item" v-for="(route, key) in routes.user" v-bind:key="route.path">
          <router-link :to="{ name : route.path }" :key="key" class="nav-link">{{route.name}}</router-link>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto" v-if="!$auth.check()">
        <li class="nav-item" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
          <router-link :to="{ name : route.path }" :key="key" class="nav-link">{{route.name}}</router-link>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto" v-if="$auth.check()">
        <li class="nav-item">
          <a class="nav-link" href="#" @click.prevent="$auth.logout()">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      routes: {
        unlogged: [{ name: "Login", path: "login" }]
      },
      user: [
        { name: "/", path: "dashboard" },
        { name: "/items", path: "items" }
      ]
    };
  }
};
</script>
