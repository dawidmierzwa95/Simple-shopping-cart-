<template>
	<div>
		<div class="row">
			<div class="col-lg-7">
				<div class="cart">
					<img class="cart__image" v-if="item.photo" :src="'/' + item.photo.disk + '' + item.photo.path"/>
				</div>
			</div>
			<div class="col-lg-4 offset-lg-1">
				<div class="cart">
					<div>
						<h3 class="cart__title">{{item.name}}</h3>
					</div>
					<div>
						<h3 class="cart__price">{{item.price}} PLN</h3>
					</div>
					<div class="input input--group">
						<button class="button button--buy button--icon">
							Dodaj do koszyka
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'ProductPage',
        data() {
            return {
				item: {}
            }
        },
        components: {},
        methods: {
            getProduct() {
                axios.get('/v1/products/' + this.$route.params.slug)
                    .then((response) =>
                    {
                        this.item = response.data.data;
                    })
            }
        },
        mounted()
        {
			this.getProduct();
        }
    }
</script>