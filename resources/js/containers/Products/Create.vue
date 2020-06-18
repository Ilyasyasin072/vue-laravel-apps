<template>
  <div class="container">
    <v-col cols="12">
      <v-card color="#385F73" dark>
        <v-card-title class="headline">Total New Products</v-card-title>
        <v-card-subtitle>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo dolore nostrum voluptatum ad, praesentium magnam asperiores nam dolor quisquam consectetur suscipit ratione corrupti minima nihil assumenda ipsum ut quia at.</v-card-subtitle>
      </v-card>
    </v-col>
    <v-col cols="12">
      <form @submit.prevent="postProducts()">
        <div class="card">
          <div class="card-body">
            <!-- <div class="form-group">
                        <v-text-field
                            label="Regular"
                            placeholder="Placeholder"
                        ></v-text-field>
                        <v-text-field
                            label="Solo"
                            placeholder="Placeholder"
                            solo
                        ></v-text-field>
                        <v-text-field label="Regular"></v-text-field>
            </div>-->
            <div class="form-group">
              <label for="products_name">Product Name</label>
              <!-- <input
                            type="text"
                            class="form-control"
                            id="products_name"
                            placeholder="Product Name"
                            v-model="formProducts.name"
              />-->
              <v-text-field label="Products" filled v-model="formProducts.name"></v-text-field>
            </div>
            <div class="form-group">
              <!-- <label for="price">Price Product</label>
                        <input
                            type="text"
                            placeholder="Price"
                            class="form-control"
                            id="price"
                            v-model="formProducts.price"
              />-->
              <v-text-field label="Price" filled v-model="formProducts.price"></v-text-field>
            </div>
            <div class="form-group">
              <!-- <label for="description">Description Product</label> -->
              <!-- <textarea
                            type="text"
                            class="form-control"
                            placeholder="Description Product"
                            id="description"
                            v-model="formProducts.description"
              ></textarea>-->
              <v-textarea
                filled
                name="input-7-4"
                label="Filled textarea"
                v-model="formProducts.description"
              ></v-textarea>
            </div>
            <div class="form-group">
              <button
                type="submit"
                class="btn btn-sm btn-success"
                style="color:white; width:100%;"
              >Save</button>
            </div>
            <div class="form-group">
              <router-link
                class="btn btn-sm btn-info"
                style="color:white; width:100%;"
                to="/products"
              >Back</router-link>
            </div>
          </div>
        </div>
      </form>
    </v-col>
  </div>
</template>

<script>
export default {
  data: () => ({
    items: ["Foo", "Bar", "Fizz", "Buzz"],
    formProducts: {
      name: "",
      price: "",
      description: ""
    }
  }),
  methods: {
    postProducts() {
      const data = {
        name: this.formProducts.name,
        price: this.formProducts.price,
        description: this.formProducts.description
      };
      axios
        .post("http://127.0.0.1:8000/api/products/store", data)
        .then(result => {
          this.$router.push({ path: "/products" });
        });
    }
  }
};
</script>
