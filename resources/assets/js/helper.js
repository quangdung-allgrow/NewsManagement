// helper module

export default {
    methods: {
        _truncate(str, length) {
        	return _.truncate(str, {
			  'length': length,
			  'separator': ' '
			});
        },

        _round_up(number) {
        	return _.ceil(number);
        }
    }
}
