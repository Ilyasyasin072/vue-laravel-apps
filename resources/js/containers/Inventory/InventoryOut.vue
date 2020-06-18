<template>
  <v-container>
    <v-col cols="12">
      <v-card color="#385F73" dark>
        <v-card-title class="headline">Input Form Item Out</v-card-title>

        <v-card-subtitle>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo dolore nostrum voluptatum ad, praesentium magnam asperiores nam dolor quisquam consectetur suscipit ratione corrupti minima nihil assumenda ipsum ut quia at.</v-card-subtitle>
      </v-card>
    </v-col>
    <v-col cols="12">
      <v-card>
        <form @submit.prevent="posinventoryOut()">
          <v-card-text>
            <v-text-field
              ref="name"
              label="Customers Name"
              v-model="formInventoryOut.product_recipes_id"
              placeholder="Customers Name"
              required
            ></v-text-field>
          </v-card-text>
          <v-card-text>
            <v-text-field
              ref="name"
              label="Total Price"
              v-model="formInventoryOut.stock_out"
              placeholder="Total Price"
              required
            ></v-text-field>
          </v-card-text>
          <!-- 
          <v-divider class="mt-12"></v-divider>-->
          <v-card-actions>
            <v-btn text>Cancel</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="primary" type="submit" text>Submit</v-btn>
          </v-card-actions>
        </form>
      </v-card>
    </v-col>
    <v-col cols="12">
      <div class="card">
        <div class="card-body">
          <v-data-table
            :headers="headers"
            :items="inventoryOut"
            sort-by="calories"
            class="elevation-1"
            data-app
          >
            <template v-slot:top></template>
            <template v-slot:item.actions="{ item }">
              <v-icon small class="mr-2">mdi-pencil</v-icon>
              <v-icon small @click="handleDelete(item.id)">mdi-delete</v-icon>
            </template>
            <template v-slot:no-data>
              <p>Data Tidak ada</p>
            </template>
          </v-data-table>
        </div>
      </div>
    </v-col>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      formInventoryOut: {
        product_recipes_id: "",
        stock_out: ""
      },
      inventoryOut: [],
      headers: [
        { text: "Product Name", value: "product_recipes.product.name" },
        { text: "Desciption", value: "product_recipes.product.description" },
        { text: "Items", value: "product_recipes.item.name" },
        { text: "Stock", value: "product_recipes.item.stock" },
        { text: "New Stock", value: "stock_out" },
        { text: "Actions", value: "actions", sortable: false }
      ],
      editedIndex: -1
    };
  },
  created() {
    this.getInventoryOut();
  },
  methods: {
    getInventoryOut() {
      const urls = "http://127.0.0.1:8000/api/inventory/out";
      axios({
        methods: "GET",
        url: urls
      }).then(result => {
        this.inventoryOut = result.data;
        // console.log(result.data);
      });
    },
    posinventoryOut() {
      const data = {
        product_recipes_id: this.formInventoryOut.product_recipes_id,
        stock_out: this.formInventoryOut.stock_out
      };

      const urls = "http://127.0.0.1:8000/api/inventory/out/create";
      axios.post(urls, data).then(result => {
        this.getInventoryOut();
        this.formInventoryOut = {
          product_recipes_id: "",
          stock_in: ""
        };
      });
    },
    handleDelete(id) {
      const urls = "http://127.0.0.1:8000/api/inventory/out/delete/";
      axios.delete(urls + id).then(result => {
        const index = this.inventoryOut.indexOf(id);
        this.inventoryOut.splice(index, 1);
        this.getInventoryOut();
      });
    }
  }
};
</script>