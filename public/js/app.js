if ($('#invoice').length > 0){
var app = new Vue({
  el: '#invoice',
  data: {
    isProcessing: false,
    form: {},
    errors: {}
  },
  created: function () {
    Vue.set(this.$data, 'form', _form);
  },
  methods: {
    addLine: function() {
      this.form.products.push({name: '', price: 0, qty: 1});
    },
    remove: function(product) {
      this.form.products.$remove(product);
    },
    create: function() {
      this.isProcessing = true;
      this.$http.post('/invoices', this.form)
        .then(function(response) {
          if(response.data.created) {
            window.location = '/invoices/' + response.data.id;
          } else {
            this.isProcessing = false;
          }
        })
        .catch(function(response) {
          this.isProcessing = false;
          Vue.set(this.$data, 'errors', response.data);
        })
    },

      vcreate: function() {
      this.isProcessing = true;
      this.$http.post('/vinvoices', this.form)
        .then(function(response) {
          if(response.data.created) {
            // window.location = '/vinvoices/' + response.data.id;
             Vue.set(this.$data, 'errors', response.data.id);
          } else {
            this.isProcessing = false;
          }
        })
        .catch(function(response) {
          this.isProcessing = false;
          Vue.set(this.$data, 'errors', response.data);
        })
    },


    update: function() {
      this.isProcessing = true;
      this.$http.put('/invoices/' + this.form.id, this.form)
        .then(function(response) {
          if(response.data.updated) {
            window.location = '/invoices/' + response.data.id;
          } else {
            this.isProcessing = false;
          }
        })
        .catch(function(response) {
          this.isProcessing = false;
          Vue.set(this.$data, 'errors', response.data);
        })
    }
  },
  computed: {
    subTotal: function() {
      return this.form.products.reduce(function(carry, product) {
        return carry + (parseFloat(product.qty) * parseFloat(product.price));
      }, 0);
    },
    grandTotal: function() {
      // return this.subTotal - parseFloat(this.form.discount);
      return this.subTotal - parseFloat(this.form.discount) - parseFloat(this.form.advance);
    }
  }
})

}

if ($('#vinvoice').length > 0){

var app = new Vue({
  el: '#vinvoice',
  data: {
    isProcessing: false,
    form: {},
    errors: {}
  },
  created: function () {
    Vue.set(this.$data, 'form', _form);
  },
  methods: {
    addLine: function() {
      this.form.items.push({name: '', price: 0, qty: 1});
    },
    remove: function(item) {
      this.form.items.$remove(item);
    },
    create: function() {
      this.isProcessing = true;
      this.$http.post('/vinvoices', this.form)
        .then(function(response) {
          if(response.data.created) {
            window.location = '/vinvoices/' + response.data.id;
            // window.location = '/vinvoices/' + 1;
          } else {
            this.isProcessing = false;
          }
        })
        .catch(function(response) {
          this.isProcessing = false;
          Vue.set(this.$data, 'errors', response.data);
        })
    },
    update: function() {
      this.isProcessing = true;
      this.$http.put('/vinvoices/' + this.form.id, this.form)
        .then(function(response) {
          if(response.data.updated) {
            window.location = '/vinvoices/' + response.data.id;
          } else {
            this.isProcessing = false;
          }
        })
        .catch(function(response) {
          this.isProcessing = false;
          Vue.set(this.$data, 'errors', response.data);
        })
    }
  },
  computed: {
    subTotal: function() {
      return this.form.items.reduce(function(carry, item) {
        return carry + (parseFloat(item.qty) * parseFloat(item.price));
      }, 0);
    },
    grandTotal: function() {
      // return this.subTotal - parseFloat(this.form.discount);
      return this.subTotal - parseFloat(this.form.discount) - parseFloat(this.form.advance);
    }
  }
})
}
Vue.config.devtools = true;