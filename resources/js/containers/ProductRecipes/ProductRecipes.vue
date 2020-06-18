<template>
  <div class="col-md-12">
    <div class="row">
      <v-col cols="6" sm="4" dark v-for="item in productrecipes" :key="item.key">
        <v-card color="white">
          <v-card-title class="headline" style="font-size:30px;">{{ item.product.name }}</v-card-title>

          <v-card-subtitle>{{ item.product.description }}</v-card-subtitle>

          <v-card-actions>
            <v-btn text>Listen Now</v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      productrecipes: []
    };
  },
  created() {
    this.getProductRecipes();
  },
  methods: {
    getProductRecipes() {
      const urls = "http://127.0.0.1:8000/api/product/recipes";
      axios({
        method: "get",
        url: urls
      }).then(result => {
        this.productrecipes = result.data;
        console.log(result.data);
        // console.log(this.transactions);
      });
    }
  }
};
</script>