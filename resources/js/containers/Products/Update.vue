<template>
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="putProductsId()">
                        <div class="form-group">
                            <label for="name">Products Update Name </label>
                            <!-- <input
                                type="text"
                                id="name"
                                class="form-control"
                                v-model="formProductUpdate.name"
                            /> -->
                            <v-text-field
                                filled
                                v-model="formProductUpdate.name"
                            ></v-text-field>
                        </div>
                        <div class="form-group">
                            <!-- <label for="price">Products Update Price</label>
                            <input
                                type="text"
                                id="price"
                                class="form-control"
                                v-model="formProductUpdate.price"
                            /> -->
                            <v-text-field
                                filled
                                v-model="formProductUpdate.price"
                            ></v-text-field>
                        </div>
                        <div class="form-group">
                            <!-- <label for="descripton"
                                >Products Update Description</label
                            >
                            <textarea
                                type="text"
                                id="description"
                                class="form-control"
                                v-model="formProductUpdate.description"
                            ></textarea> -->
                            <v-textarea
                                filled
                                name="input-7-4"
                                v-model="formProductUpdate.description"
                            ></v-textarea>
                        </div>
                        <div class="form-group">
                            <button
                                class="btn btn-sm btn-info"
                                style="color: white; width: 100%"
                            >
                                Update
                            </button>
                        </div>
                        <div class="form-group">
                            <router-link
                                class="btn btn-sm btn-primary"
                                style="color: white; width: 100%"
                                to="/products"
                            >
                                back
                            </router-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            formProductUpdate: {
                name: "",
                price: "",
                description: ""
            }
        };
    },
    created() {
        this.getProductsId();
    },
    methods: {
        getProductsId() {
            const url = "http://127.0.0.1:8000/api/products/edit/";
            axios.get(url + this.$route.params.id).then(result => {
                this.formProductUpdate.name = result.data.name;
                this.formProductUpdate.price = result.data.price;
                this.formProductUpdate.description = result.data.description;
            });
        },

        putProductsId() {
            const data = {
                name: this.formProductUpdate.name,
                price: this.formProductUpdate.price,
                description: this.formProductUpdate.description
            };
            const url = "http://127.0.0.1:8000/api/products/update/";
            axios.put(url + this.$route.params.id, data).then(result => {
                this.$router.push({ path: "/products" });
            });
        }
    }
};
</script>
