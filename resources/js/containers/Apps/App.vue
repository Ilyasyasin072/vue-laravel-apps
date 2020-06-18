<template>
  <v-card color="grey lighten-4" flat height="700px" tile>
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
      <!-- <router-link to="/product/recipes" class="mx-2" fab dark small color="primary">
        <v-btn text small>Products Recipes</v-btn>
      </router-link>-->
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
      <!-- <router-link to="/login" class="mx-2" fab dark small color="primary">
        <v-btn text small>Login</v-btn>
      </router-link>-->
      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn>
    </v-toolbar>
    <router-view></router-view>
  </v-card>
</template>

<script>
export default {
  data: () => ({
    drawer: false
  })
};
</script>
