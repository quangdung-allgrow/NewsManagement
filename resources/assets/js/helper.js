
Vue.mixin({
  methods: {
    capitalizeFirstLetter: function(str) {
    	return str.charAt(0).toUpperCase() + str.slice(1);
    }
  }
})