<template>
  <v-container>
    <v-row>
      <v-col cols="12">
        <v-row>
          <v-col cols="6" sm="4">
            <v-card color="#385F73" dark>
              <v-card-title class="headline">Unlimited music now</v-card-title>

              <v-card-subtitle>Listen to your favorite artists and albums whenever and wherever, online and offline.</v-card-subtitle>

              <v-card-actions>
                <v-btn text>Listen Now</v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
          <v-col cols="6" sm="4">
            <v-card color="#385F73" dark>
              <v-card-title class="headline">Unlimited music now</v-card-title>

              <v-card-subtitle>Listen to your favorite artists and albums whenever and wherever, online and offline.</v-card-subtitle>

              <v-card-actions>
                <v-btn text>Listen Now</v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
          <v-col cols="6" sm="4">
            <v-card color="#385F73" dark>
              <v-card-title class="headline">Unlimited music now</v-card-title>

              <v-card-subtitle>Listen to your favorite artists and albums whenever and wherever, online and offline.</v-card-subtitle>

              <v-card-actions>
                <v-btn text>Listen Now</v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
        <v-col cols="12">
          <v-data-table
            :headers="headers"
            :items="report"
            sort-by="calories"
            class="elevation-1"
            data-app
          ></v-data-table>
        </v-col>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      report: [],
      data: [],
      headers: [
        { text: "Product Name", value: "product_recipes.product.name" },
        { text: "Item Name", value: "product_recipes.item.name" },
        { text: "Item Unit", value: "product_recipes.item.unit" },
        { text: "Item Stock", value: "product_recipes.item.stock" },
        {
          text: "Product Description",
          value: "product_recipes.product.description"
        },
        {
          text: "Inventory in Stock",
          value: "stock_in"
        },
        {
          text: "Inventory in Stock",
          value: ""
        }
      ],
      editedIndex: -1
    };
  },

  computed: {
    repotdata: function() {
      return this.report.filter(function(items) {
        return items.stock_in;
      });
    }
  },

  mounted() {
    this.getReport();
  },

  methods: {
    getReport() {
      const urls = "http://127.0.0.1:8000/api/report/inventory";
      axios.get(urls).then(result => {
        this.report = result.data;
      });
    }
  }
};
</script>