<template>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <v-col cols="12">
          <v-card color="#385F73" dark>
            <v-card-title class="headline">
              Lorem ipsum dolor, sit amet consectetur adipisicing
              elit. Nemo dolore nostrum voluptatum ad, praesentium
              magnam asperiores nam dolor quisquam consectetur
              suscipit ratione corrupti minima nihil assumenda
              ipsum ut quia at.
            </v-card-title>
            <!-- 
            <v-card-subtitle>
              Lorem ipsum dolor, sit amet consectetur adipisicing
              elit. Nemo dolore nostrum voluptatum ad, praesentium
              magnam asperiores nam dolor quisquam consectetur
              suscipit ratione corrupti minima nihil assumenda
              ipsum ut quia at.
            </v-card-subtitle>-->

            <v-card-actions>
              <router-link class="mx-2" fab dark small color="primary" to="/products/create">
                <v-btn text small>Create new products</v-btn>
              </router-link>
              <router-link to="/product/recipes" class="mx-2" fab dark small color="primary">
                <v-btn text small>Products Recipes Create</v-btn>
              </router-link>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-col cols="12">
          <v-row justify="center">
            <v-col cols="12" sm="10" md="8" lg="6">
              <form @submit.prevent="postProductRecipes()">
                <v-card-text>
                  <v-text-field
                    ref="name"
                    v-model="formProduceRecipes.product_id"
                    placeholder="Nama Barang"
                    required
                  ></v-text-field>
                </v-card-text>
                <v-card-text>
                  <v-text-field
                    ref="name"
                    v-model="formProduceRecipes.item_id"
                    placeholder="Nama Item Barang"
                    required
                  ></v-text-field>
                </v-card-text>

                <v-divider class="mt-12"></v-divider>
                <v-card-actions>
                  <v-btn text>Cancel</v-btn>
                  <v-spacer></v-spacer>
                  <v-btn
                    color="primary"
                    type="submit"
                    text
                    @submit.prevent="postTransaction()"
                  >Submit</v-btn>
                </v-card-actions>
              </form>
            </v-col>
            <v-col cols="12" sm="10" md="8" lg="6">
              <v-card ref="form">
                <v-data-table
                  :headers="headers"
                  :items="productrecipes"
                  sort-by="calories"
                  class="elevation-1"
                  data-app
                >
                  <template v-slot:top></template>
                  <template v-slot:item.actions="{ item }">
                    <!-- <v-icon small class="mr-2">mdi-pencil</v-icon> -->
                    <v-icon small @click="handleDelete(item.id)">mdi-delete</v-icon>
                  </template>
                  <template v-slot:no-data>
                    <p>Data Tidak ada</p>
                  </template>
                </v-data-table>
              </v-card>
            </v-col>
          </v-row>
        </v-col>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      headers: [
        { text: "Product Name", value: "product.name" },
        { text: "Name", value: "item.name" },
        { text: "total price", value: "item.stock" },
        { text: "total amount", value: "product.description" },
        { text: "Actions", value: "actions", sortable: false }
      ],

      productrecipes: [],
      editedIndex: -1,
      formProduceRecipes: {
        product_id: "",
        item_id: ""
      }
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
      });
    },
    postProductRecipes() {
      const urls = "http://127.0.0.1:8000/api/product/recipes/create";
      const data = {
        product_id: this.formProduceRecipes.product_id,
        item_id: this.formProduceRecipes.item_id
      };
      axios.post(urls, data).then(result => {
        this.getProductRecipes();
        this.formProduceRecipes = {
          product_id: "",
          item_id: ""
        };
      });
    },
    handleDelete(id) {
      const urls = "http://127.0.0.1:8000/api/product/recipes/delete/";
      axios.delete(urls + id).then(result => {
        const index = this.productrecipes.indexOf(id);
        this.productrecipes.splice(index, 1);
        this.getProductRecipes();
      });
    }
  }
};
</script>
