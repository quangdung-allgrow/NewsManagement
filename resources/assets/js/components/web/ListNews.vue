<template>
	<div>
		<div class="row">
	        <div :class="'col-xs-6 col-lg-'+12/col" v-for="(news, index) in list">
	            <h3><a :href="'/news/'+news.title_slug">{{ news.title }}</a></h3>
	            <p>{{ truncate(news.content, 200) }}</p>
	            <p><a class="btn btn-default" href="" role="button">View details &raquo;</a></p>
	        </div> 
	    </div>
		<paginate
		  :page-count="pageCount"
		  :click-handler="fetchList"
		  :margin-pages="3"
		  :prev-text="'«'"
		  :next-text="'»'"
		  :container-class="'pagination'">
		</paginate>
		{{ capitalizeFirstLetter('lower case') }}
	</div>
</template>

<script type="text/javascript">
	export default {
		props: ['page', 'col', 'citem'],

		data: function() {
			return {
				list: [],
				pageCount: 0
			};
		},

		created: function() {
            this.fetchList(this.page);
        },

        computed: {

        },

        methods: {
        	fetchList(page) {
                axios.get('api/news?citem='+this.citem+'&page='+page)
                    .then((res) => {
                    	this.pageCount = res.data.last_page;
                        this.list = res.data.data;
                    });
            },

            truncate(str, length) {
            	return _.truncate(str, {
				  'length': length,
				  'separator': ' '
				});
            },

            round(number) {
            	return _.ceil(number);
            }
        }
	}
</script>