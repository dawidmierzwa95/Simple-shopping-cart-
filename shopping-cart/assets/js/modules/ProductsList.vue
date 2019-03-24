<template>
	<div>
		<div class="row">
			<div class="col-lg-3" v-for="item in items">
				<div class="element element--product">
					<div class="row">
						<div class="col-lg-12">
							<div v-if="item.photo" class="element__img"
							     :style="{
							     'background-image': 'url(' + item.photo.disk + '' + item.photo.path + ')'
							}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div>
								<div class="element__price">
									<label>{{item.price}} PLN</label>
								</div>
								<h5 class="element__title">
									<router-link :to="{name: 'ProductPage', params: {slug: item.slug}}">
										{{item.name}}
									</router-link>
								</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'ProductsList',
        data() {
            return {
				items: []
            }
        },
        components: {},
        methods: {
			getProducts() {
                axios.get('/v1/products')
                    .then((response) =>
                    {
                        this.items = response.data.data;
                    })
			}
        },
        mounted()
        {
            this.getProducts();
        }
    }
</script>