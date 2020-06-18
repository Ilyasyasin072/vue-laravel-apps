<template>
  <div class="col-md-12">
    <div class="row">
      <v-col cols="12" width="100%" height="100%">
        <v-card>
          <v-tabs v-model="tab" background-color="#385F73" color="#FFFFFF">
            <v-tab v-for="item in products" :key="item.tab" color="#FFFFFF">{{ item.name }}</v-tab>
          </v-tabs>

          <v-tabs-items v-model="tab">
            <v-tab-item v-for="item in products" :key="item.id">
              <v-card flat>
                <v-card-text>{{ item.description }}</v-card-text>
              </v-card>
            </v-tab-item>
          </v-tabs-items>
        </v-card>
      </v-col>
      <v-col cols="6" sm="4" dark v-for="item in products" :key="item.key">
        <v-card color="white">
          <v-card-title class="headline">{{ item.name }}</v-card-title>

          <v-card-subtitle>{{ item.description }}</v-card-subtitle>

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
      drawer: true,
      items: [
        { title: " Home", icon: "mdi-home-city" },
        { title: " My Account", icon: "mdi-account" },
        { title: " Users", icon: "mdi-account-group-outline" }
      ],
      products: [],
      mini: true,
      tab: null,
      items: [
        { tab: "One", content: "Tab 1 Content" },
        { tab: "Two", content: "Tab 2 Content" },
        { tab: "Three", content: "Tab 3 Content" },
        { tab: "Four", content: "Tab 4 Content" },
        { tab: "Five", content: "Tab 5 Content" },
        { tab: "Six", content: "Tab 6 Content" },
        { tab: "Seven", content: "Tab 7 Content" },
        { tab: "Eight", content: "Tab 8 Content" },
        { tab: "Nine", content: "Tab 9 Content" },
        { tab: "Ten", content: "Tab 10 Content" }
      ]
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
    }
  }
};
</script>