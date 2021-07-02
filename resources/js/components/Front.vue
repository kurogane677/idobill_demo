<template>
  <div class="container-fluid">
    <div class="row mt-2 d-flex justify-content-center">
      <div class="col-12">
        <div class="card shadow card-filter">
          <div
            class="card-header card-header-filter bg-dark text-white flex-between"
          >
            <div class="col">Pordu</div>
            <div class="col text-right">
              <div :class="{ loading: loading }">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </div>
            </div>
          </div>

          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Produk</th>
                  <th>Harga Produk</th>
                </tr>
              </thead>
              <tbody>
                <div v-for="product in products" :key="product.prod_id">
                  <tr>
                    <td>{{ product.prod_id }}</td>
                    <td>{{ product.prod_desc }}</td>
                    <td>{{ product.prod_price }}</td>
                  </tr>
                </div>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      products: [],
      loading: true,
    };
  },

  mounted() {
    this.loadProducts();
  },

  methods: {
    loadProducts: function () {
      // Load API Products
      axios
        .get("/api/products")
        .then((response) => {
          this.products = response.data.data;
          this.loading = false;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>