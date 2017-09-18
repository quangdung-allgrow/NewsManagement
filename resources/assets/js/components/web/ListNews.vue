<template>
	<div>

		<div class="row" v-for="(x, index0) in _.range(_round_up(citem/col))">
	        <div :class="'col-xs-6 col-lg-'+12/col" v-for="(news, index1) in _.range(climit)">
	        	<div v-if="_.some(list, 'title')">
		            <h3><a :href="'/news/'+list[index1 + (index0 * col)].title_slug">{{ list[index1 + (index0 * col)].title }}</a></h3>
		            <p>{{ _truncate(list[index1 + (index0 * col)].content, 200) }}</p>
		            <p><a class="btn btn-default" href="" role="button">View details &raquo;</a></p>
	            </div>
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
	</div>
</template>

<script type="text/javascript">
	export default {
		props: ['page', 'col', 'citem'],

		data: function() {
			return {
				list: [],
				pageCount: 0,
				show: false,
				climit: this.col
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
            }
        }
	}
</script>