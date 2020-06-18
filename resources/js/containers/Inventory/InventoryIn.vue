<template>
  <v-container>
    <v-col cols="12">
      <v-card color="#385F73" dark>
        <v-card-title class="headline">Input Form Item In</v-card-title>

        <v-card-subtitle>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo dolore nostrum voluptatum ad, praesentium magnam asperiores nam dolor quisquam consectetur suscipit ratione corrupti minima nihil assumenda ipsum ut quia at.</v-card-subtitle>
      </v-card>
    </v-col>
    <v-col cols="12">
      <v-card>
        <form @submit.prevent="posInventoryIn()">
          <v-card-text>
            <v-text-field
              ref="name"
              label="Customers Name"
              v-model="formInventoryIn.product_recipes_id"
              placeholder="Customers Name"
              required
            ></v-text-field>
          </v-card-text>
          <v-card-text>
            <v-text-field
              ref="name"
              label="Total Price"
              v-model="formInventoryIn.stock_in"
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
            :items="inventoryin"
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
      formInventoryIn: {
        product_recipes_id: "",
        stock_in: ""
      },
      inventoryin: [],
      headers: [
        { text: "Product Name", value: "productrecipes.product.name" },
        { text: "Desciption", value: "productrecipes.product.description" },
        { text: "Items", value: "productrecipes.item.name" },
        { text: "Stock", value: "productrecipes.item.stock" },
        { text: "New Stock", value: "stock_in" },
        { text: "Actions", value: "actions", sortable: false }
      ],
      editedIndex: -1
    };
  },
  created() {
    this.getInventoryIn();
  },
  methods: {
    getInventoryIn() {
      const urls = "http://127.0.0.1:8000/api/inventory/in";
      axios({
        methods: "GET",
        url: urls
      }).then(result => {
        this.inventoryin = result.data;
      });
    },
    posInventoryIn() {
      const data = {
        product_recipes_id: this.formInventoryIn.product_recipes_id,
        stock_in: this.formInventoryIn.stock_in
      };

      const urls = "http://127.0.0.1:8000/api/inventory/in/create";
      axios.post(urls, data).then(result => {
        this.getInventoryIn();
        this.formInventoryIn = {
          product_recipes_id: "",
          stock_in: ""
        };
      });
    },
    handleDelete(id) {
      const urls = "http://127.0.0.1:8000/api/inventory/in/delete/";
      axios.delete(urls + id).then(result => {
        const index = this.inventoryin.indexOf(id);
        this.inventoryin.splice(index, 1);
        this.getInventoryIn();
      });
    }
  }
};
</script>