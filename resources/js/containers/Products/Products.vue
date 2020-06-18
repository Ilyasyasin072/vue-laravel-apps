<template>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <v-col cols="12">
          <v-card color="#385F73" dark>
            <v-card-title class="headline">Total New Products</v-card-title>

            <v-card-subtitle>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo dolore nostrum voluptatum ad, praesentium magnam asperiores nam dolor quisquam consectetur suscipit ratione corrupti minima nihil assumenda ipsum ut quia at.</v-card-subtitle>

            <v-card-actions>
              <router-link class="mx-2" fab dark small color="primary" to="/products/create">
                <v-btn text small>Create new products</v-btn>
              </router-link>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-col cols="12">
          <div class="card">
            <div class="card-body">
              <v-data-table
                :headers="headers"
                :items="products"
                sort-by="calories"
                class="elevation-1"
                data-app
              >
                <template v-slot:top></template>
                <template v-slot:item.actions="{ item }">
                  <v-icon small class="mr-2" @click="editItem(item.id)">mdi-pencil</v-icon>
                  <v-icon small @click="handleDelete(item.id)">mdi-delete</v-icon>
                </template>
                <template v-slot:no-data>
                  <p>Data Tidak ada</p>
                </template>
              </v-data-table>
            </div>
          </div>
        </v-col>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: [],
      headers: [
        { text: "Product Name", value: "name" },
        { text: "Price", value: "price" },
        { text: "Desciption", value: "description" },
        { text: "date", value: "created_at" },
        { text: "date", value: "updated_at" },
        { text: "Actions", value: "actions", sortable: false }
      ],
      editedIndex: -1,
      formProductUpdate: {
        name: "",
        price: "",
        description: ""
      }
    };
  },

  created() {
    this.getProducts();
  },

  methods: {
    getProducts() {
      const url = "http://127.0.0.1:8000/api/products";
      axios.get(url).then(result => {
        this.products = result.data;
      });
    },
    handleDelete(id) {
      const url = "http://127.0.0.1:8000/api/products/delete/";
      axios.delete(url + id).then(result => {
        this.getProducts();
      });
    },
    editItem(item) {
      this.$router.push({ path: "/products/" + item });
      const url = "http://127.0.0.1:8000/api/products/edit/";
      axios.get(url + item).then(result => {
        this.formProductUpdate.name = result.data.name;
        this.formProductUpdate.price = result.data.price;
        this.formProductUpdate.description = result.data.description;
      });
    }
  }
};
</script>
